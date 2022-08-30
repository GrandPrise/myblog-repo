@extends('layouts.master')

@section('title', '- View Category')
@section('content')
    <div class="container-fluid px-4">
        <x-validation-errors :errors='$errors' />
        <x-session-status />

        <div class="card mt-4">
            <div class="card-header">
                <h4 class="">View Category</h4>
            </div>
            <div class="card-body">
                <h3>
                    <img src="{{ asset('uploads/category/' . $category->image) }}" width="50px" height="50px"
                        alt="category image">
                    <em>{{ $category->name }}<em>
                </h3>
                <p>{{ $category->description }}</p>
            </div>
        </div>
    </div>

@endsection
