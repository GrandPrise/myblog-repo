@extends('layouts.master')

@section('title', '- Ajouter Commande')
@section('content')
    <div class="container-fluid px-4">
        <div class="card mt-4">
            <div class="card-header">
                <a href="#" class="btn btn-danger btn-sm float-end">Back</a>
                <h4 class="">Ajouter Commande</h4>
            </div>
            <div class="card-body">
                {{-- @if (isset($order))
                    <form action="{{ route('edit-order', $order->id) }}" method="order" enctype="multipart/form-data">
                        @method('PUT')
                    @else --}}
                <form action="{{ route('add-order') }}" method="POST" enctype="multipart/form-data">
                    {{-- @endif --}}
                    <x-validation-errors :errors='$errors' />
                    @csrf
                    <div class="mb-3">
                        <label for="client">Nom Client :</label>
                        <input type="text" name="client" id="client" placeholder="Nom de Client"
                            value="{{ isset($order->client) ? $order->client : old('client') }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="phone_number">Numéro de Téléphone :</label>
                        <input type="text" name="phone_number" id="phone_number" placeholder="06--------"
                            value="{{ isset($order->phone_number) ? $order->phone_number : old('phone_number') }}"
                            class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="whatsapp_number">Numéro WhatsApp :</label>
                        <input type="text" name="whatsapp_number" id="whatsapp_number" placeholder="06--------"
                            value="{{ isset($order->whatsapp_number) ? $order->whatsapp_number : old('whatsapp_number') }}"
                            class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="ville">Ville :</label>
                        <input type="text" name="city" id="city" placeholder="Ville"
                            value="{{ isset($order->city) ? $order->city : old('city') }}" class="form-control">
                    </div>
                    {{-- <div class="mb-3">
                        <label for="name">Ville :</label>
                        <select name="ville" class="form-control" required>
                            <option value="city">Fes</option>
                            <option value="city">Casa</option>
                            <option value="city">Rabat</option>
                        </select>
                    </div> --}}
                    <div class="mb-3">
                        <label for="name">Adresse :</label>
                        <input type="text" name="address" id="address" placeholder="Adresse"
                            value="{{ isset($order->address) ? $order->address : old('address') }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="name">Produit :</label>
                        <input type="text" name="item" id="item" placeholder="Produit"
                            value="{{ isset($order->item) ? $order->item : old('item') }}" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="name">Quantité :</label>
                        <input type="number" name="quantity" id="quantity" placeholder="Quantite" max="10"
                            min="1" value="{{ isset($order->quantity) ? $order->quantity : old('quantity') }}"
                            class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="name">Prix Total :</label>
                        <input type="number" name="total_price" id="total_price" placeholder="Prix Total" min="0"
                            value="{{ isset($order->total_price) ? $order->total_price : old('total_price') }}"
                            class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="remark">Remarque(s) :</label>
                        <textarea name="remark" id="remark" rows="5" class="form-control">
                        {{ isset($order->remark) ? $order->remark : old('remark') }}
                    </textarea>
                    </div>
                    <div class="col-md-6">
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
