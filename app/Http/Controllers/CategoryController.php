<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\category;
Use Carbon\Carbon;
Use File;

class CategoryController extends Controller
{
    function index()
    {
      $categories = category::get();
      return view('categories.list',['categories'=>$categories]);
    }

    public function create()
    {
      return view('categories.new');
    }

    public function store(Request $req)
    {
      $req->validate([
          'title'  =>'required|unique:categories',
          'image'  =>'required',
      ]);



      $category= new category();
      $category->title= $req->title;

      $imagename = time().'.'.$req->image->getClientOriginalExtension();
                  $req->image->move('allImage',$imagename);
      $category->image = $imagename;

      $category->save();
      return view("categories.list");
    }

    public function edit($id)
    {
      $categories = category::find($id);
      return view('categories.edit',['categories'=>$categories]);

    }

    public function update(Request $req ,$id)
    {
       $categories = category::find($id);
       $categories->title = $req->title;


       if( $req->hasFile('image')){

         unlink('allImage'.'/'.$categories->image);
         $image = $req->file('image');
         $imagename = time().'.'.$image->getClientOriginalExtension();
                    $image->move('allImage',$imagename);
         $categories->image=$imagename;

        // $fileName = $image->getClientOriginalName();
        // $fileExtension = $image->getClientOriginalExtension();
        //                  $req->image->move('allImage',$fileExtension);
    }
       $categories->update();
       return view("categories.list");
    }

    public function delete($id)
    {
      $categories = category::find($id);
      unlink('allImage'.'/'.$categories->image);
      $categories->delete();
      return view("categories.list");
    }
}
