<?php
namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class CustomerController extends Controller
{
    
    public function index()
    {
        $customers = Http::get(config('services.finance.host').'/customers');
        $customers = json_decode($customers);
        return view('customers.index', compact('customers'));
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store()
    {
        $data = request()->validate([
            'name' => 'required',
            'address' => 'required',
            'phone_number'=>'required|string|min:10|max:10',
        ]);
       $customer=  Http::post(config('services.finance.host').'/customers', ['data'=>$data]);
        $customer = json_decode($customer);
        return redirect('/customers/'.$customer->id);
    }

        public function show($customer_id)
    {
        $customer = Http::get(config('services.finance.host').'/customers/'.$customer_id);
        $customer = json_decode($customer);
        return view('customers.show', compact('customer'));
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();
        return redirect()->route('customers');
    }

    public function edit(Customer $customer)
    {
        return view('customers.edit', compact('customer'));
    }

    public function update(Customer $customer)
    {
        $data = request()->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone_number'=>'required|min:10|max:10',
        ]);
        $customer->update($data);
        return redirect('/customers/'.$customer->id);
    }
}



