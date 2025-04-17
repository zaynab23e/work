@extends('layout.tmp')

@section('conntent')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="card shadow rounded">
                <div class="card-header bg-primary text-white">
                    <h4 class="mb-0">Edit Customer</h4>
                </div>

                <div class="card-body">
                    <form action="{{ route('customers.update', $customer->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" value="{{ $customer->name }}" required class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="city" class="form-label">City</label>
                            <input type="text" name="city" id="city" value="{{ $customer->city }}" required class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="governorate" class="form-label">Governorate</label>
                            <input type="text" name="governorate" id="governorate" value="{{ $customer->governorate }}" required class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">Phone</label>
                            <input type="text" name="phone" id="phone" value="{{ $customer->phone }}" required class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="service" class="form-label">Service</label>
                            <input type="text" name="service" id="service" value="{{ $customer->service }}" required class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="paid_amount" class="form-label">Paid Amount</label>
                            <input type="number" name="paid_amount" id="paid_amount" value="{{ $customer->paid_amount }}" step="0.01" required class="form-control">
                        </div>

                        <div class="mb-3">
                            <label for="remaining_amount" class="form-label">Remaining Amount</label>
                            <input type="number" name="remaining_amount" id="remaining_amount" value="{{ $customer->remaining_amount }}" step="0.01" class="form-control">
                        </div>

                        <div class="d-flex justify-content-between mt-4">
                            <a href="{{ route('customers.index') }}" class="btn btn-secondary">← Back</a>
                            <button type="submit" class="btn btn-success">Update</button>
                        </div>
                    </form>
                </div>

            </div>

        </div>
    </div>
</div>
@endsection
