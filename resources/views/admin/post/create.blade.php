@extends('layouts.master')

@section('title', '- Add Post')
@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <a href="{{ route('posts') }}" class="btn btn-danger btn-sm float-end">Back</a>

                <h4 class="">Add/Edit Post</h4>
            </div>
            <div class="card-body">
                @if (isset($post))
                    <form action="{{ route('edit-post', $post->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                    @else
                        <form action="{{ route('add-post') }}" method="POST" enctype="multipart/form-data">
                @endif
                <x-validation-errors :errors='$errors' />
                @csrf
                <div class="mb-3">
                    <label for="name">Category :</label>
                    <select name="category_id" class="form-control" required>
                        <option value="">---Select Category---</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="name">Post Name :</label>
                    <input type="text" name="name" id="name"
                        value="{{ isset($post->name) ? $post->name : old('name') }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="slug">Slug :</label>
                    <input type="text" name="slug" id="slug"
                        value="{{ isset($post->slug) ? $post->slug : old('slug') }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="description">Description :</label>
                    <textarea name="description" id="description" rows="5" class="form-control">
                        {{ isset($post->description) ? $post->description : old('description') }}
                    </textarea>
                </div>
                <div class="mb-3">
                    <label for="image">Youtube Iframe Link :</label>
                    <input type="text" name="yt_frame" class="form-control">
                </div>

                <strong>SEO Tags</strong>
                <div class="mb-3">
                    <label>Meta Title :</label>
                    <input type="text" name="meta_title"
                        value="{{ isset($post->meta_title) ? $post->meta_title : old('meta_title') }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Meta Description :</label>
                    <textarea rows="3" name="meta_description"class="form-control">
                        {{ isset($post->meta_description) ? $post->meta_description : old('meta_description') }}
                    </textarea>
                </div>
                <div class="mb-3">
                    <label>Meta Keyword :</label>
                    <input type="text" name="meta_keyword"
                        value="{{ isset($post->meta_keyword) ? $post->meta_keyword : old('meta_keyword') }}"
                        class="form-control">
                </div>
                <strong>Status Mode</strong>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" value="1" name="status">
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Save Post</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection
