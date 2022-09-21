@extends('layouts.master')

@section('title', '- order')
@section('content')
    <div class="container-fluid px-4"><br>
        <a href="{{ route('add-order') }}" class="btn btn-primary btn-sm float-end">Add order</a>
        <h1 class="mt-4">orders</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">order</li>
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
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        {{-- <td>{{ (DB::table('categories')->where('id','=',$order->category_id))->get('name')}}</td> --}}
                        <td><strong>{{ $order->commandeur }}</strong></td>
                        <td>{{ $order->whatsapp_number }}</td>
                        <td>{{ $order->item }}</td>
                        <td>{{ $order->created_by }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                {{-- <a href="{{ route('view-order', $order->id) }}" class="btn btn-primary">Details</a> --}}
                                {{-- <a href="{{ route('edit-order', $order->id) }}" class="btn btn-success"> Edit</a> --}}
                            </div>
                        </td>
                        <td>
                            {{-- <form action="{{ route('delete-order', $order->id) }}" method="order">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">
                                    <i class="fa-solid fa-trash-can"></i></button>
                            </form> --}}
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
    </div>
@endsection
