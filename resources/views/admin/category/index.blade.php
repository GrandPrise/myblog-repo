@extends('layouts.master')

@section('title','- Category')
@section('content')
<div class="container-fluid px-4">
    <x-session-status/>
    <h1 class="mt-4">Category</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Category</li>
    </ol>
    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                  <td>ID</td>
                  {{-- <td>--</td> --}}
                  <td>Name</td>
                  <td>Slug</td>
                  <td>Description</td>
                  <td>Created By</td>
                  <td colspan="2">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
                <tr>
                    <td>{{$category->id}}</td>
                    {{-- <td><img src="/category/{{ $category->image }}" alt="category image" width="100px"></td> --}}
                    <td>{{$category->name}}</td>
                    <td>{{$category->slug}}</td>
                    <td>{{$category->description}}</td>
                    <td>{{auth()->user()->name}}</td>
      
                    <td><a href="" class="btn btn-info">Details</a></td>
                    <td><a href="" class="btn btn-primary">Edit</a></td>
                    <td>
                        <form action="" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection