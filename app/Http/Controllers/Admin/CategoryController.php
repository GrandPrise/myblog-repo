<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Admin\CategoryFormRequest;

class CategoryController extends Controller
{
    public function index(){
        $categories=Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function create(){
        return view('admin.category.create');
    }

    public function store(CategoryFormRequest $request){

        $data=$request->validated();
        $category=new Category();
        $category['name']=$data['name'];
        $category['slug']=$data['slug'];
        $category['description']=$data['description'];

        if($request->hasfile('image')){
            $file=$request->file('image');
            $filename=time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/category/',$filename);
            $category['image']=$filename;
        }

        $category['meta_title']=$data['meta_title'];
        $category['meta_description']=$data['meta_description'];
        $category['meta_keyword']=$data['meta_keyword'];

       $category['navbar_status']=$request->has('navbar_status');
       $category['status']=$request->has('status');
        $category['created_by']=Auth::user()->id;

        $category->save();

      return redirect('admin/category')->with('success','Category added successfully');
    }
}
