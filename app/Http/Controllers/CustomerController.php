<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        
        $customers = Customer::when($search, function ($query, $search) {
            $query->where('name', 'LIKE', "%{$search}%")
                ->orWhere('city', 'LIKE', "%{$search}%")
                ->orWhere('governorate', 'LIKE', "%{$search}%")
                ->orWhere('phone', 'LIKE', "%{$search}%")
                ->orWhere('service', 'LIKE', "%{$search}%")
                ->orWhereHas('category', function ($q) use ($search) {
                $q->where('name', 'LIKE', "%{$search}%");
                });
        })->get();
        
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

        
        return redirect()->route('customers.index')->with('success', 'Customer added successfully');
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

        return redirect()->route('customers.index')->with('success', 'Customer updated successfully');
    }
//_________________________________________________________________________________________________________________________
    public function destroy($id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return redirect()->route('customers.index')->with('error', 'Customer not found');
        }

        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully');
    }
    //_________________________________________________________________________________________________________________________
}
