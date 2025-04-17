@extends('layout.tmp')
@section('conntent')
<div class="container">
    <h1 class="page-title">Edit Customer</h1>

    <form action="{{ route('customers.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ $customer->name }}" required class="form-control">
        </div>

        <div class="form-group">
            <label for="city">City</label>
            <input type="text" name="city" id="city" value="{{ $customer->city }}" required class="form-control">
        </div>

        <div class="form-group">
            <label for="governorate">Governorate</label>
            <input type="text" name="governorate" id="governorate" value="{{ $customer->governorate }}" required class="form-control">
        </div>

        <div class="form-group">
            <label for="phone">Phone</label>
            <input type="text" name="phone" id="phone" value="{{ $customer->phone }}" required class="form-control">
        </div>

        <div class="form-group">
            <label for="service">Service</label>
            <input type="text" name="service" id="service" value="{{ $customer->service }}" required class="form-control">
        </div>

        <div class="form-group">
            <label for="paid_amount">Paid Amount</label>
            <input type="number" name="paid_amount" id="paid_amount" value="{{ $customer->paid_amount }}" step="0.01" required class="form-control">
        </div>

        <div class="form-group">
            <label for="remaining_amount">Remaining Amount</label>
            <input type="number" name="remaining_amount" id="remaining_amount" value="{{ $customer->remaining_amount }}" step="0.01" class="form-control">
        </div>

        <button type="submit" class="submit-btn">Update</button>
    </form>

    <a href="{{ route('customers.index') }}" class="back-link">Back to Customers</a>
</div>
@endsection
