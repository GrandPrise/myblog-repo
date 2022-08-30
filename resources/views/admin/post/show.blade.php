@extends('layouts.master')

@section('title', '- View Post')
@section('content')
    <div class="container-fluid px-4">
        <x-validation-errors :errors='$errors' />
        <x-session-status />

        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">View Post</h4>
            </div>
            <div class="card-body">
                <h2>Category : {{ $post->category->name }}</h2>
                <h3>
                    <em>{{ $post->name }}<em>
                </h3>
                <p>{{ $post->description }}</p>
            </div>
        </div>
    </div>

@endsection
