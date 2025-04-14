{{-- @extends('layout.tmp')
@section('conntent') --}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css">

<div class="container mt-4">
    <div class="my-3">
        <a href="{{route('index') }}">
            <button class="btn-dark btn">
                <i class="fa-solid fa-angles-left"></i>
            </button>
        </a>
    </div> 
    <form action="{{ route('update', ['id' => $craftsman->id]) }}" method="POST" enctype="multipart/form-data" dir="rtl">
        @csrf  
        @method('PUT') 
        
        <!-- حقل الاسم -->
        <div class="mb-3">
            <label for="name" class="form-label" style="font-size: 25px;">الاسم</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="الاسم" value="{{ $craftsman->name }}">
        </div>

        <!-- الحقول الخاصة بالصور ... -->

        <!-- باقي الحقول ... -->

        <!-- حقل الاشتراك -->
        <div class="mb-3">
            <label for="subscription_date" class="form-label" style="font-size: 25px;">الاشتراك</label>
            <input type="text" class="form-control" id="subscription_date" name="subscription_date"
                placeholder="اختر تاريخ الاشتراك"
                value="{{ $craftsman->subscription_date }}">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">تعديل</button>
        </div>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
<script>
    flatpickr("#subscription_date", {
        dateFormat: "Y-m-d",
        minDate: "today"
    });
</script>
{{-- @endsection --}}
