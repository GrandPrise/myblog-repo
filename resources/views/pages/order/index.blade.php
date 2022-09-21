@extends('layouts.master')

@section('title', '- order')
@section('content')
    <div class="container-fluid px-4"><br>
        <a href="{{ route('add-order') }}" class="btn btn-primary btn-sm float-end">Ajouter Commande</a>
        <h1 class="mt-4">Liste des Commandes</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">commande</li>
        </ol>
        <x-session-status />
        <table class="table table-striped">
            <thead>
                <tr>
                    <td></td>
                    <td>Nom Client</td>
                    <td>N° Whatsapp</td>
                    <td>Produit</td>
                    <td>Date</td>
                    @if (Auth::user()->name == 'admin')
                        <td>Responsable</td>
                    @endif
                    <td colspan="2" style="text-align: center;">Action</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                    <tr>
                        <td>{{ $order->id }}</td>
                        {{-- <td>{{ (DB::table('categories')->where('id','=',$order->category_id))->get('name')}}</td> --}}
                        <td><strong>{{ $order->client }}</strong></td>
                        <td>{{ $order->whatsapp_number }}</td>
                        <td>{{ $order->item }}</td>
                        <td>{{ $order->created_at }}</td>
                        @if (Auth::user()->name == 'admin')
                            <td>{{ $order->created_by }}</td>
                        @endif

                        <td>
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="" class="btn btn-primary">Details</a>
                                <a href="" class="btn btn-success"> Edit</a>
                            </div>
                        </td>
                        <td>

                            <form action="" method="order">
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
