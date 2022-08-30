@extends('layouts.master')

@section('title', '- Post')
@section('content')
    <div class="container-fluid px-4"><br>
        <a href="{{ route('add-post') }}" class="btn btn-primary btn-sm float-end">Add Post</a>
        <h1 class="mt-4">Posts</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Post</li>
        </ol>
        <x-session-status />
        <table class="table table-striped">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Category</td>
                    <td>Name</td>
                    <td>Description</td>
                    <td>Status</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{ $post->id }}</td>
                        {{-- <td>{{ (DB::table('categories')->where('id','=',$post->category_id))->get('name')}}</td> --}}
                        <td>{{ $post->category->name }}</td>
                        <td><strong>{{ $post->name }}</strong></td>
                        <td>{{ $post->description }}</td>
                        <td>{{ $post->status == '1' ? 'Hidden' : 'Shown' }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('view-post', $post->id) }}" class="btn btn-primary">Details</a>
                                <a href="{{ route('edit-post', $post->id) }}" class="btn btn-success"> Edit</a>
                            </div>
                        </td>
                        <td>
                            <form action="{{ route('delete-post', $post->id) }}" method="post">
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
