<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerRequest;
use App\Models\Customer;
use Illuminate\Http\Response;

class CustomerController extends Controller
{
    public function index()
    {
        return $this->response(Customer::all(), Response::HTTP_OK);
    }

    public function store(CustomerRequest $request)
    {
        $customer = Customer::query()->create($request->validated());

        return $this->response($customer, Response::HTTP_CREATED,
            trans('messages.customer.created')
        );
    }

    public function update($id, CustomerRequest $request)
    {
        $customer = Customer::findOrFail($id);
        $customer->update($request->validated());

        return $this->response($customer, Response::HTTP_OK,
            trans('messages.customer.updated')
        );
    }

    public function show($id)
    {
        return $this->response(Customer::findOrFail($id), Response::HTTP_OK);
    }

    public function destroy($id)
    {
        Customer::findOrFail($id)->delete();

        return $this->response([], Response::HTTP_OK,
            trans('messages.customer.deleted')
        );

    }
}
