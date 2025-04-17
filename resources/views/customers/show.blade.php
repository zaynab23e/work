@extends('layout.tmp')
@section('conntent')

<div class="container">
    <h2>Customer Details</h2>

    <p><strong>Name:</strong> {{ $customer->name }}</p>
    <p><strong>City:</strong> {{ $customer->city }}</p>
    <p><strong>Governorate:</strong> {{ $customer->governorate }}</p>
    <p><strong>Phone:</strong> {{ $customer->phone }}</p>
    <p><strong>Service:</strong> {{ $customer->service }}</p>
    <p><strong>Paid Amount:</strong> {{ $customer->paid_amount }}</p>
    <p><strong>Remaining Amount:</strong> {{ $customer->remaining_amount ?? '0' }}</p>

    <a href="{{ route('customers.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
