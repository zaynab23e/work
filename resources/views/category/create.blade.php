@extends('layout.tmp')
@section('title,index')

@section('conntent')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
<div class="container mt-4">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <div class="container mt-4">
        <form action="{{ route('store_category') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <div class="mb-3">
                    <label for="name" class="form-label" style="font-size: 30px;" >اسم المهنه </label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="الاسم" >
                </div>
    
            <div class="text-center">
                <button type="submit" class="btn btn-primary">إرسال</button>
            </div>

        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>

    flatpickr("#startDate", {
        dateFormat: "Y-m-d", 
        minDate: "today"     
    });
</script>

@endsection