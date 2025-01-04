@extends('layout.tmp')
@section('title,index')

@section('conntent')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container mt-4">
    <div class="container mt-4 text-end">
        <form action="{{ route('store_cr') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 w-100">
                <label for="name" class="form-label W-100 text-end fs-3 fw-bold">الاسم</label>
                <input type="text" class="form-control text-end" id="name" name="name" placeholder="الاسم" required>
            </div>
    
            <div class="mb-3">
                <label for="phone" class="form-label fs-3 fw-bold">رقم الهاتف</label>
                <input type="text" class="form-control text-end" id="phone" name="phone" placeholder="أدخل رقم الهاتف" required>
            </div>
    
                <div class="mb-3">
                <label for="governorates_id" class="form-label fs-3 fw-bold">المحافظة</label>

                <select class="form-select text-end" id="governorates_id" name="governorates_id" required>
                    <option value="" selected>اختر المحافظة</option>
                    @foreach ($Governorates as $Governorate)
                        <option value="{{ $Governorate->id }}">{{ $Governorate->name }}</option>
                    @endforeach
                </select>
            </div>
            

            {{-- <div class="mb-3">
                <label for="governorates_id" class="form-label" style="font-size: 25px;">المحافظة</label>

                <input list="governorates_list" name="governorates_id" id="governorates_id" class="form-control" 
                    value="{{ $craftsman->Governorate->name ?? '' }}" placeholder="ابحث عن محافظة">
                
                <datalist id="governorates_list">
                    @foreach ($Governorates as $Governorate)
                        <option value="{{ $Governorate->name }}">
                    @endforeach
                </datalist>
            </div>
            --}}



            <div class="mb-3">
                <label for="city" class="form-label fs-3 fw-bold">المدينة</label>
                <input type="text" class="form-control text-end" id="city" name="city" placeholder="أدخل المدينة" required>
            </div>
    
            <div class="mb-3">
                <label for="category_id" class="form-label fs-3 fw-bold">الفئة</label>
                <select class="form-select text-end " id="category_id" name="category_id" required>
                    <option value="" selected>اختر الفئة</option>
                        <option value="{{ $Categories->id }}">{{ $Categories->name }}</option>
                </select>
            </div>
    
            <div class="mb-3">
                <label for="NationalNumber" class="form-label fs-3 fw-bold">الرقم القومي</label>
                <input type="text" class="form-control text-end " id="NationalNumber" name="NationalNumber" placeholder="أدخل الرقم القومي" required>
            </div>
    
            <div class="mb-3">
                <label for="startDate" class="form-label fs-3 fw-bold">تاريخ البدء</label>
                <input type="date" class="form-control text-end " id="startDate" name="startDate" required>
            </div>
    
            <div class="mb-3">
                <label for="image" class="form-label" style="font-size: 25px;">صوره </label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="imageA" class="form-label" style="font-size: 20px;"><strong>صوره البطاقه</strong> </label>
                <input type="file" class="form-control" id="imageA" name="imageA" accept="image/*">
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>



            <div class="mb-3">
                <label for="imageB" class="form-label" style="font-size: 20px;"><strong>صوره السجل التجاري (إن وجد)</strong> </label>
                <input type="file" class="form-control" id="imageB" name="imageB" accept="image/*">
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
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