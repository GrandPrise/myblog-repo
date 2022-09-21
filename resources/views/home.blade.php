@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Welcome to Your Dashboard ' . Auth::user()->name) }}</div>
                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <div class="alert alert-danger" role="alert">
                                {{ session('error') }}
                            </div>
                        @endif
                        <a href="{{ route('add-order') }}" class="btn btn-primary">Ajouter Commande</a>
                        <a href="{{ route('orders') }}" class="btn btn-success">Voir Les Commandes</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
