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
        return $this->response(Customer::query()->create($request->validated()), 200,
            trans('messages.user_created')
        );

    }

    public function update()
    {

    }

    public function show($id)
    {
        return $this->response(Customer::query()->findOrFail($id), Response::HTTP_OK);
    }
}
