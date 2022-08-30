@extends('layouts.master')

@section('title', '- Category')
@section('content')
    <div class="container-fluid px-4"><br>
        <a href="{{ route('add-category') }}" class="btn btn-primary btn-sm float-end">Add Category</a>
        <h1 class="mt-4">Categories</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Category</li>
        </ol>
        <x-session-status />
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td></td>
                    <td>Name</td>
                    <td>Description</td>
                    <td>Created By</td>
                    <td>Status</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td><img src="{{ asset('uploads/category/' . $category->image) }}" width="50px" height="50px"
                                alt="category image"></td>
                        <td><strong>{{ $category->name }}</strong></td>
                        <td>{{ $category->description }}</td>
                        <td><em>{{ auth()->user()->name }}</em></td>
                        <td>{{ $category->status == '1' ? 'Hidden' : 'Shown' }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('view-category', $category->id) }}" class="btn btn-primary">Details</a>
                                <a href="{{ route('edit-category', $category->id) }}" class="btn btn-success"> Edit</a>
                            </div>
                        </td>
                        <td>
                            <form action="{{ route('delete-category', $category->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">
                                    <i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
