<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use GuzzleHttp\Client;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::all();

        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $method = 'GET';

        $zipcode = $request->input('zipcode');
        $url = 'https://zipcloud.ibsnet.co.jp/api/search?zipcode=' . $zipcode;

        $client = new Client();

        try {
            $response = $client->request($method, $url);
            $body = $response->getBody();
            $customer = json_decode($body, false);
            $results = $customer->results[0];
            $address = $results->address1 . $results->address2 . $results->address3;
        } catch (\Throwable $th) {
            return back();
        }

        
        return view('customers.create')->with(compact('customer', 'address'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = new Customer();

        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->zipcode = $request->zipcode;
        $customer->address = $request->address;
        $customer->telephone = $request->telephone;

        $customer->save();

        return redirect()->route('customers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        $customer = new Customer();

        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->zipcode = $request->zipcode;
        $customer->address = $request->address;
        $customer->telephone = $request->telephone;

        $customer->save();

        return redirect()->route('customers.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        $customer->delete();
        
        return redirect()->route('customers.index');
    }

    public function zipcode(Customer $customer)
    {
        return view('customers.zipcode');
    }
}
