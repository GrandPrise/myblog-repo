<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\Admin\CategoryFormRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.category.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.category.create');
    }

    public function store(CategoryFormRequest $request)
    {
        $data = $request->validated();
        $category = new Category();
        $category['name'] = $data['name'];
        $category['slug'] = $data['slug'];
        $category['description'] = $data['description'];

        if ($request->hasfile('image')) {
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/category/', $filename);
            $category['image'] = $filename;
        }

        $category['meta_title'] = $data['meta_title'];
        $category['meta_description'] = $data['meta_description'];
        $category['meta_keyword'] = $data['meta_keyword'];

        $category['navbar_status'] = $request->has('navbar_status');
        $category['status'] = $request->has('status');
        $category['created_by'] = Auth::user()->id;

        $category->save();

        return redirect(route('categories'))->with('success', 'Category added successfully');
    }

    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.show', compact('category'));
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('admin.category.create', compact('category'));
    }

    public function update(CategoryFormRequest $request, $id)
    {
        $data = $request->validated();
        $category = Category::findOrFail($id);
        $category['name'] = $data['name'];
        $category['slug'] = $data['slug'];
        $category['description'] = $data['description'];

        if ($request->hasfile('image')) {
            $destination = 'uploads/category/' . $category->image;

            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move('uploads/category/', $filename);
            $category['image'] = $filename;
        }

        $category['meta_title'] = $data['meta_title'];
        $category['meta_description'] = $data['meta_description'];
        $category['meta_keyword'] = $data['meta_keyword'];

        $category['navbar_status'] = $request->has('navbar_status');
        $category['status'] = $request->has('status');
        $category['created_by'] = Auth::user()->id;

        $category->update();

        return redirect(route('categories'))->with('success', 'Category updated successfully');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        if ($category) {
            $destination = 'uploads/category/' . $category->image;

            if (File::exists($destination)) {
                File::delete($destination);
            }

            $category->delete();
            return redirect(route('categories'))->with('success', 'Category was deleted successfully');
        } else {
            return redirect(route('categories'))->with('error', 'Category doesn\'t exist!');
        }
    }
}
