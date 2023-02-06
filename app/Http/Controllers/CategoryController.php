<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\Category;
class CategoryController extends Controller
{
    public function index ()
    {
        $categories = Category::all();
        
        return view('category.index',compact('categories'));
    }

    public function add()
    {
        return view('category.add');
    }

    public function create(Request $req)
    {
    
       $category = Category::create($req->all());

       if($category){
            return redirect()->route('category.index')->with('success','Thêm mới thành cồng');
       }
    }

    public function test ()
    {
        return view('upload');
    }


    public function upload(Request $req)
    {
        if($req->hasFile('images')){
            $file = $req->images;
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('uploads'),$fileName);
        }
        
    }
}
