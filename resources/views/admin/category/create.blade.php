@extends('layouts.master')

@section('title', '- Add Category')
@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">Add/Edit Category</h4>
            </div>
            <div class="card-body">
                @if (isset($category))
                    <form action="{{ route('edit-category', $category->id) }}" method="POST" enctype="multipart/form-data">
                        @method('PUT')
                    @else
                        <form action="{{ url('admin/add-category ') }}" method="POST" enctype="multipart/form-data">
                @endif
                <x-validation-errors :errors='$errors' />
                @csrf
                <div class="mb-3">
                    <label for="name">Category Name :</label>
                    <input type="text" name="name" id="name"
                        value="{{ isset($category->name) ? $category->name : old('name') }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="slug">Slug :</label>
                    <input type="text" name="slug" id="slug"
                        value="{{ isset($category->slug) ? $category->slug : old('slug') }}" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="description">Description :</label>
                    <textarea name="description" id="description" rows="5" class="form-control">
                        {{ isset($category->description) ? $category->description : old('description') }}
                    </textarea>
                </div>
                <div class="mb-3">
                    <label for="image">Image :</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <h6>SEO Tags</h6>
                <div class="mb-3">
                    <label>Meta Title :</label>
                    <input type="text" name="meta_title"
                        value="{{ isset($category->meta_title) ? $category->meta_title : old('meta_title') }}"
                        class="form-control">
                </div>
                <div class="mb-3">
                    <label>Meta Description :</label>
                    <textarea rows="3" name="meta_description"class="form-control">
                        {{ isset($category->meta_description) ? $category->meta_description : old('meta_description') }}
                    </textarea>
                </div>
                <div class="mb-3">
                    <label>Meta Keyword :</label>
                    <input type="text" name="meta_keyword"
                        value="{{ isset($category->meta_keyword) ? $category->meta_keyword : old('meta_keyword') }}"
                        class="form-control">
                </div>
                <h6>Status Mode</h6>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="">Navbar Status</label>
                        <input type="checkbox" value="1" name="navbar_status">
                        {{-- {{ isset($category->navbar_status) == '1' ? 'checked' : '' }}> --}}
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="">Status</label>
                        <input type="checkbox" value="1" name="status">
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Save Category</button>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>

@endsection
