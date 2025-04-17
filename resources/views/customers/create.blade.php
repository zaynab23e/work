@extends('layout.tmp')
@section('conntent')
<body>
    <h1>Add Customer</h1>

    <form action="{{ route('customers.store') }}" method="POST">
        @csrf
        <label for="name">Name</label>
        <input type="text" name="name" required><br>

        <label for="city">City</label>
        <input type="text" name="city" required><br>

        <label for="governorate">Governorate</label>
        <input type="text" name="governorate" required><br>

        <label for="phone">Phone</label>
        <input type="text" name="phone" required><br>

        <label for="service">Service</label>
        <input type="text" name="service" required><br>

        <label for="paid_amount">Paid Amount</label>
        <input type="number" name="paid_amount" step="0.01" required><br>

        <label for="remaining_amount">Remaining Amount</label>
        <input type="number" name="remaining_amount" step="0.01"><br>

        <button type="submit">Save</button>
    </form>
    
    <a href="{{ route('customers.index') }}">Back to Customers</a>
</body>
</html>
@endsection
