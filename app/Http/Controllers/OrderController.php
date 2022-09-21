<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Http\Requests\OrderFormRequest;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::all();
        return view('pages.order.index', compact('orders'));
    }
    public function create()
    {
        return view('pages.order.create');
    }

    public function store(OrderFormRequest $request)
    {
        $data = $request->validated();
        $order = new Order();
        $order->client = $data['client'];
        $order->phone_number = $data['phone_number'];
        $order->whatsapp_number = $data['whatsapp_number'];
        $order->city = $data['city'];
        $order->address = $data['address'];
        $order->item = $data['item'];
        $order->quantity = $data['quantity'];
        $order->total_price = $data['total_price'];
        $order->remark = $data['remark'];
        $order->created_by = Auth::user()->id;
        $order->save();

        return redirect(route('orders'))->with('success', 'Commande ajouté avec succès');
    }
}
