@extends('layout.tmp')
@section('conntent')
<body>
    <div class="container">
        <h1 class="page-title">Add New Customer</h1>

        <form action="{{ route('customers.store') }}" method="POST" class="customer-form">
            @csrf

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name" id="name" required class="form-control">
            </div>

            <div class="form-group">
                <label for="city">City</label>
                <input type="text" name="city" id="city" required class="form-control">
            </div>

            <div class="form-group">
                <label for="governorate">Governorate</label>
                <input type="text" name="governorate" id="governorate" required class="form-control">
            </div>

            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" required class="form-control">
            </div>

            <div class="form-group">
                <label for="service">Service</label>
                <input type="text" name="service" id="service" required class="form-control">
            </div>

            <div class="form-group">
                <label for="paid_amount">Paid Amount</label>
                <input type="number" name="paid_amount" id="paid_amount" step="0.01" required class="form-control">
            </div>

            <div class="form-group">
                <label for="remaining_amount">Remaining Amount</label>
                <input type="number" name="remaining_amount" id="remaining_amount" step="0.01" class="form-control">
            </div>

            <button type="submit" class="submit-btn">Save</button>
        </form>

        <a href="{{ route('customers.index') }}" class="back-link">Back to Customers</a>
    </div>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .page-title {
            text-align: center;
            font-size: 2em;
            color: #333;
            margin-bottom: 30px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            font-size: 1em;
            color: #333;
            display: block;
            margin-bottom: 8px;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            font-size: 1em;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .form-control:focus {
            border-color: #007bff;
            outline: none;
        }

        .submit-btn {
            width: 100%;
            padding: 12px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 4px;
            font-size: 1.2em;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .submit-btn:hover {
            background-color: #0056b3;
        }

        .back-link {
            display: block;
            margin-top: 20px;
            text-align: center;
            font-size: 1em;
            color: #007bff;
            text-decoration: none;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</body>
@endsection
