<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
    {
        
        $customers = Customer::all();
        return view('customers.index', compact('customers'));
    }

    // ______________________________________________________________________________________________________
    public function create()
    {
        return view('customers.create');  
    }

    //____________________________________________________________________________________________________
    public function store(Request $request)
    {
        
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'governorate' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'service' => 'required|string|max:255',
            'paid_amount' => 'required|numeric|min:0',
            'remaining_amount' => 'nullable|numeric|min:0',
        ]);


        Customer::create($validatedData);

        
        return redirect()->route('customers.index');
    }
//____________________________________________________________________________________________________
    public function show($id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return redirect()->route('customers.index')->with('error', 'Customer not found');
        }

        return view('customers.show', compact('customer'));
    }

//____________________________________________________________________________________________________

    public function edit($id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return redirect()->route('customers.index')->with('error', 'Customer not found');
        }

        return view('customers.edit', compact('customer'));  // عرض صفحة التعديل
    }


//____________________________________________________________________________________________________
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'governorate' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'service' => 'required|string|max:255',
            'paid_amount' => 'required|numeric|min:0',
            'remaining_amount' => 'nullable|numeric|min:0',
        ]);

        $customer = Customer::find($id);

        if (!$customer) {
            return redirect()->route('customers.index')->with('error', 'Customer not found');
        }

        $customer->update($validatedData);

        return redirect()->route('customers.index');
    }
//_________________________________________________________________________________________________________________________
    public function destroy($id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return redirect()->route('customers.index')->with('error', 'Customer not found');
        }

        $customer->delete();

        return redirect()->route('customers.index');
    }
    //_________________________________________________________________________________________________________________________
}
