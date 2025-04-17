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

    // عرض النموذج لإضافة عميل جديد
    public function create()
    {
        return view('customers.create');  // عرض صفحة create.blade.php
    }

    // تخزين العميل في قاعدة البيانات
    public function store(Request $request)
    {
        // التحقق من صحة البيانات
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'governorate' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'service' => 'required|string|max:255',
            'paid_amount' => 'required|numeric|min:0',
            'remaining_amount' => 'nullable|numeric|min:0',
        ]);

        // إنشاء العميل في قاعدة البيانات
        Customer::create($validatedData);

        // بعد الإضافة، العودة إلى صفحة العملاء مع رسالة نجاح
        return redirect()->route('customers.index')->with('success', 'Customer added successfully');
    }

    public function show($id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return redirect()->route('customers.index')->with('error', 'Customer not found');
        }

        return view('customers.show', compact('customer'));
    }



    public function edit($id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return redirect()->route('customers.index')->with('error', 'Customer not found');
        }

        return view('customers.edit', compact('customer'));  // عرض صفحة التعديل
    }



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

    public function destroy($id)
    {
        $customer = Customer::find($id);

        if (!$customer) {
            return redirect()->route('customers.index')->with('error', 'Customer not found');
        }

        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Customer deleted successfully');
    }
}
