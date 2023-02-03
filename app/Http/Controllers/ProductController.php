<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddProductRequest;
use DB;
use File;
class ProductController extends Controller
{
    public function index ()
    {
        $products = DB::table('product')->join('category','product.category_id','=','category.id')
        ->select('product.*','category.name AS categoryName')->get();
      
        return view('product.index',compact('products'));
    }

    public function add()
    {
        $category = DB::table('category')->get();
        return view('product.add',compact('category'));
    }

    public function create(AddProductRequest $req)
    {
        // cách 1
        // $req->validate([
        //     'name'=>'required|unique:product',
        //     'price'=>'required|numeric|min:1',
        //     'image'=>'required'
        // ],[
        //     'name.required'=>'Tên sản phẩm không rỗng',
        //     'name.unique'=>$req->name.' đã tồn tại'
        // ]);

        // xử lý upload file 
        if($req->hasFile('image')){
            $file = $req->image;
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('uploads'),$fileName);
        } else{
            $fileName = '';
        }

        $product = DB::table('product')->insert([
            'name'=>$req->name,
            'price'=>$req->price,
            'category_id'=>$req->category_id,
            'image'=>$fileName,

        ]);

         return redirect()->route('product.index');
    }


    public function edit ($id)
    {
        $category = DB::table('category')->get();
        $product = DB::table('product')->find($id);

        return view('product.edit',compact('product','category'));
    }

    public function update(Request $req,$id)
    {
        $product = DB::table('product')->where('id',$id); 
        
        if($req->hasFile('image')){
            $file = $req->image;
            $fileName = $file->getClientOriginalName();
            $file->move(public_path('uploads'),$fileName);

            // xoas di file cu 
            $file_old = 'uploads/'.$product->first()->image;
            File::delete(public_path($file_old));

        } else{

            $fileName = $product->first()->image;
        }

        $product->update(
            [
                'name'=>$req->name,
                'price'=>$req->price,
                'category_id'=>$req->category_id,
                'image'=>$fileName,
            ]
        );
        return redirect()->route('product.index');
    }

    public function delete($id)
    {
        DB::table('product')->where('id',$id)->delete();
        return redirect()->route('product.index');
    }
}
