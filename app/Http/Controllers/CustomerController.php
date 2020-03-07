<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerFormRequest;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class CustomerController extends Controller
{
    public function index()
    {
        return $this->response(Customer::all(), Response::HTTP_OK);
    }

    public function create(CustomerFormRequest $request)
    {
        dd($request->all());
    }

    public function update()
    {

    }

    public function destroy()
    {

    }
}
