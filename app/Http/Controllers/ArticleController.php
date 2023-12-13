<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;

class ArticleController extends Controller
{
    public function addarticle($category_id)
    {
        return view('addarticle', compact('category_id'));
    }

    public function doaddarticle(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|max:2048',
            'category_id' => 'required',
        ]);
        $data = $request->all();
        $path= 'asset/storage/images/'.$data['image'];
        $fileName = time().$request->file('image')->getClientoriginalName();
        $path=$request->file('image')->storeAs('image',$fileName,'public');
        $datas["image"]='/storage/'.$path;
        $data['image']=$fileName;
        $data['category_id'] = $request->input('category_id');
        Article::create($data);
        // return redirect()->route('addarticle')->with('success',"Article added");
        return redirect()->route('viewcategory', ['category_id' => $data['category_id']])->with('success', "Article added");

    }
    public function viewarticle()
    {
        $data=Article::all();
        return view('viewarticle',compact('data'));
    }
    
    public function articleshow($id)
    {
        $article = Article::findOrFail($id);

        return view('articleshow', compact('article'));
    }
    public function editarticle($id)
    {
        $row=Article::find($id);
        return view('editarticle',compact('row'));
    }
    public function updatearticle(Request $request,$id)
    {
        $request->validate([
            'image'=>'mimes:jpeg,jpg,png,gif|max:2024',
        ]);
        $data=Article::find($id);
        $data->name=$request->input('title');
        $data->price=$request->input('description');

        if($request->hasFile('image'))
        {
            $path= 'asset/storage/images/'.$data->image;
            if(File::exists('$path'))
            {
                File::delete($path);
            } 
            $fileName = time().$request->file('image')->getClientoriginalName();
            $path=$request->file('image')->storeAs('image',$fileName,'public');
            $datas["image"]='/storage/'.$path;
            $data->image=$fileName;
            $data->update();
        }
        
        
        $data->update();
        return redirect()->route('viewarticle')->with('success',"Updated");
    }
    public function deletearticle($id)
    {
        $row=Article::find($id);
        if(!$row)
        {
            return redirect()->route('viewarticle')->with('success',"Something Went Wrong");
        }
        $row->delete();
        return redirect()->route('viewarticle')->with('success',"Deleted");
    }
}
