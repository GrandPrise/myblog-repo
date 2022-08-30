<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Http\Requests\Admin\PostFormRequest;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        return view('admin.post.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::where('status', '0')->get();
        return view('admin.post.create', compact('categories'));
    }

    public function store(PostFormRequest $request)
    {
        $data = $request->validated();
        $post = new Post();
        $post['category_id'] = $data['category_id'];
        $post['name'] = $data['name'];
        $post['slug'] = $data['slug'];
        $post['description'] = $data['description'];
        $post['yt_frame'] = $data['yt_frame'];
        $post['meta_title'] = $data['meta_title'];
        $post['meta_description'] = $data['meta_description'];
        $post['meta_keyword'] = $data['meta_keyword'];
        $post['status'] = $request->status == true ? '1' : '0';
        $post['created_by'] = Auth::user()->id;
        $post->save();

        return redirect(route('posts'))->with('success', 'Post Added successfully');
    }

    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('admin.post.show', compact('post'));
    }

    public function edit($id)
    {
        $categories = Category::all();
        $post = Post::findOrFail($id);
        return view('admin.post.create', compact('post','categories'));
    }
    public function update(PostFormRequest $request, $id)
    {
        $data = $request->validated();
        $post = Post::findOrFail($id);
        $post['category_id'] = $data['category_id'];
        $post['name'] = $data['name'];
        $post['slug'] = $data['slug'];
        $post['description'] = $data['description'];
        $post['yt_frame'] = $data['yt_frame'];
        $post['meta_title'] = $data['meta_title'];
        $post['meta_description'] = $data['meta_description'];
        $post['meta_keyword'] = $data['meta_keyword'];
        $post['status'] = $request->status == true ? '1' : '0';
        $post['created_by'] = Auth::user()->id;

        $post->update();

        return redirect(route('posts'))->with('success', 'Post Updated successfully');
    }

    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        if ($post) {
            return redirect(route('posts'))->with('success', 'Post Deleted successfully');
        } else {
            return redirect(route('posts'))->with('error', 'Post Not Found!');
        }
    }
}
