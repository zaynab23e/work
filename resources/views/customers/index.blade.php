@extends('layout.tmp')
@section('conntent')

    @if(session('success'))
        <p style="color: green; font-weight: bold; text-align: center;">{{ session('success') }}</p>
    @endif

    @if(session('error'))
        <p style="color: red; font-weight: bold; text-align: center;">{{ session('error') }}</p>
    @endif

    <div class="container">
        <h1 class="page-title">Customers List</h1>

        <table class="customers-table">
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
                        <td class="actions">
                            <a href="{{ route('customers.show', $customer->id) }}" class="btn view-btn">View</a> |
                            <a href="{{ route('customers.edit', $customer->id) }}" class="btn edit-btn">Edit</a> |
                            <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn delete-btn">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <a href="{{ route('customers.create') }}" class="btn add-btn">Add New Customer</a>
    </div>

    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fa;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .page-title {
            text-align: center;
            font-size: 2em;
            color: #333;
            margin-bottom: 20px;
        }

        table.customers-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table.customers-table th,
        table.customers-table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table.customers-table th {
            background-color: #007bff;
            color: white;
        }

        table.customers-table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        .actions .btn {
            text-decoration: none;
            padding: 5px 10px;
            margin: 5px;
            border-radius: 5px;
            color: white;
            font-size: 14px;
            transition: all 0.3s;
        }

        .view-btn {
            background-color: #28a745;
        }

        .edit-btn {
            background-color: #ffc107;
        }

        .delete-btn {
            background-color: #dc3545;
            border: none;
            color: white;
            padding: 6px 12px;
            cursor: pointer;
        }

        .actions .btn:hover {
            opacity: 0.8;
        }

        .add-btn {
            display: inline-block;
            background-color: #007bff;
            color: white;
            padding: 12px 20px;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 20px;
            text-align: center;
            transition: all 0.3s;
        }

        .add-btn:hover {
            background-color: #0056b3;
        }
    </style>

@endsection
