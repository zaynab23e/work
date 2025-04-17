@extends('layout.tmp')
@section('conntent')
<body>
    <h1>Customers</h1>

    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    @if(session('error'))
        <p style="color: red;">{{ session('error') }}</p>
    @endif

    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>City</th>
                <th>Governorate</th>
                <th>Phone</th>
                <th>Service</th>
                <th>Paid Amount</th>
                <th>Remaining Amount</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customers as $customer)
                <tr>
                    <td>{{ $customer->name }}</td>
                    <td>{{ $customer->city }}</td>
                    <td>{{ $customer->governorate }}</td>
                    <td>{{ $customer->phone }}</td>
                    <td>{{ $customer->service }}</td>
                    <td>{{ $customer->paid_amount }}</td>
                    <td>{{ $customer->remaining_amount }}</td>
                    <td>
                        <a href="{{ route('customers.show', $customer->id) }}">View</a> |
                        <a href="{{ route('customers.edit', $customer->id) }}">Edit</a> |
                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('customers.create') }}">Add New Customer</a>
</body>
</html>
@endsection
