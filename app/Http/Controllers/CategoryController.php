<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function viewcategory()
    {
        $categories = Category::all();
        return view('viewcategory', compact('categories'));
    }
    public function viewArticle($category_id)
    {
        $category = Category::findOrFail($category_id);
        $data = $category->articles;
        return view('viewarticle', compact('category', 'data'));
    }

    public function addcategory()
    {
        return view('addcategory');
    }
    
    public function doaddcategory(Request $request)
    {
        $request->validate([
            'name'=>'required',

        ]);
        Category::create([
            'name'=>$request->name,
        ]);
        return redirect()->route('viewcategory')->with('success',"Registered Successfully");
    }


    public function editcategory($id)
    {
        $row=Category::find($id);
        return view('editcategory',compact('row'));
    }

    public function updatecategory(Request $request,$id)
    {
        $data=Category::find($id);
        $data->name=$request->input('name');
        $data->update();
        return redirect()->route('viewcategory')->with('success',"Updated Successfully");
    }
    public function deletecategory($id)
    {
        $row=Category::find($id);
        if(!$row)
        {
            return redirect()->route('viewcategory')->with('error',"record not found");
        }
        $row->delete();
        return redirect()->route('viewcategory')->with('success',"Deleted Successfully");

    }

}
