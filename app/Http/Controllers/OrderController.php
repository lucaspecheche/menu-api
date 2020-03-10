<?php

namespace App\Http\Controllers;

use App\Http\Requests\OrderRequest;
use App\Models\Order;
use Illuminate\Http\Response;

class OrderController extends Controller
{
    public function index()
    {
        return $this->response(Order::withCustomer(), Response::HTTP_OK);
    }

    public function store(OrderRequest $request)
    {
        return $this->response(Order::query()->create($request->validated()), Response::HTTP_CREATED,
            trans('messages.order.created')
        );
    }

    public function update($id, OrderRequest $request)
    {
        $order = Order::findOrFail($id);
        $order->update($request->validated());

        return $this->response($order, Response::HTTP_OK,
            trans('messages.order.updated')
        );
    }

    public function destroy($id)
    {
        Order::query()->findOrFail($id)->delete();
        return $this->response([], Response::HTTP_OK, trans('messages.order.deleted'));
    }

    public function show($id)
    {
        $order = Order::query()->findOrFail($id);
        return $this->response($order, Response::HTTP_OK);
    }
}
