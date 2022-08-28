@extends('layouts.master')

@section('title','- Category')
@section('content')
<div class="container-fluid px-4">
    <div class="card mt-4">
        <div class="card-header">
            <h4 class="">Add Category</h4>
        </div>
        <div class="card-body">
            <form action="{{ url('admin/add-category ') }}" method="post" enctype="multipart/form-data">
                <x-validation-errors :errors='$errors'/>
                @csrf
                <div class="mb-3">
                <label for="name">Category Name :</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
                <div class="mb-3">
                <label for="slug">Slug :</label>
                    <input type="text" name="slug" id="slug" class="form-control">
                </div>
                <div class="mb-3">
                <label for="description">Description :</label>
                    <textarea name="description" id="description" rows="5" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                <label for="image">Image :</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <h6>SEO Tags</h6>
                <div class="mb-3">
                    <label>Meta Title :</label>
                    <input type="text" name="meta_title" class="form-control">
                </div>
                <div class="mb-3">
                    <label>Meta Description :</label>
                    <textarea rows="3" name="meta_description" class="form-control"></textarea>
                </div>
                <div class="mb-3">
                    <label>Meta Keyword :</label>
                    <input type="text" name="meta_keyword" class="form-control">
                </div>
                <h6>Status Mode</h6>
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <label for="">Navbar Status</label>
                        <input type="checkbox" value="1" name="navbar_status">
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