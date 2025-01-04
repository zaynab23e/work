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

        <!-- حقل الصورة الرئيسية -->
        <div class="mb-3">
            <label for="image" class="form-label" style="font-size: 25px;">الصورة الحالية</label>
            @if($craftsman->image)
                <div class="mb-2">
                    <img src="{{ asset($craftsman->image) }}" alt="صورة الحرفي" style="max-width: 200px; max-height: 200px;">
                </div>
            @else
                <p>لا توجد صورة حالياً.</p>
            @endif
            <label for="image" class="form-label" style="font-size: 25px;">تحميل صورة جديدة</label>
            <input type="file" class="form-control" id="image" name="image" accept="image/*">
            @error('image')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- حقل صورة A -->
        <div class="mb-3">
            <label for="imageA" class="form-label" style="font-size: 25px;">صورة البطاقه</label>
            @if($craftsman->imageA)
                <div class="mb-2">
                    <img src="{{ asset($craftsman->imageA) }}" alt="صورة A" style="max-width: 200px; max-height: 200px;">
                </div>
            @else
                <p>لا توجد صورة A حالياً.</p>
            @endif
            <label for="imageA" class="form-label" style="font-size: 25px;"> تحميل صورة </label>
            <input type="file" class="form-control" id="imageA" name="imageA" accept="image/*">
            @error('imageA')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- حقل صورة B -->
        <div class="mb-3">
            <label for="imageB" class="form-label" style="font-size: 25px;">صورة السجل التجاري (إن وجد)</label>
            @if($craftsman->imageB)
                <div class="mb-2">
                    <img src="{{ asset($craftsman->imageB) }}" alt="صورة B" style="max-width: 200px; max-height: 200px;">
                </div>
            @else
                <p>لا توجد صورة B حالياً.</p>
            @endif
            <label for="imageB" class="form-label" style="font-size: 25px;">تحميل صورة </label>
            <input type="file" class="form-control" id="imageB" name="imageB" accept="image/*">
            @error('imageB')
                <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <!-- باقي الحقول -->
        <div class="mb-3">
            <label for="phone" class="form-label" style="font-size: 25px;">رقم الهاتف</label>
            <input type="text" class="form-control" id="phone" name="phone" placeholder="أدخل رقم الهاتف" value="{{ $craftsman->phone }}">
        </div>
        
        <div class="mb-3">
            <label for="governorates_id" class="form-label" style="font-size: 25px;">المحافظة</label>
            <select class="form-select" id="governorates_id" name="governorates_id">
                <option value="{{ $craftsman->Governorate->id ?? '' }}" selected>
                    {{ $craftsman->Governorate ? $craftsman->Governorate->name : 'لا يوجد محافظة' }}
                </option>
                @foreach ($Governorates as $Governorate)
                    <option value="{{ $Governorate->id }}">{{ $Governorate->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="category_id" class="form-label" style="font-size: 25px;">الفئة</label>
            <select class="form-select" id="category_id" name="category_id">
                <option value="{{ $craftsman->Category->id ?? '' }}" selected>
                    {{ $craftsman->Category ? $craftsman->Category->name : 'لا يوجد فئة' }}
                </option>
                @foreach ($Categories as $Category)
                    <option value="{{ $Category->id }}">{{ $Category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="NationalNumber" class="form-label" style="font-size: 25px;">الرقم القومي</label>
            <input type="text" class="form-control" id="NationalNumber" name="NationalNumber" placeholder="أدخل الرقم القومي" value="{{ $craftsman->NationalNumber }}">
        </div>

        {{-- <div class="mb-3">
            <label for="startDate" class="form-label" style="font-size: 25px;">تاريخ البدء</label>
            <input type="date" class="form-control" id="startDate" name="startDate" value="{{ $craftsman->startDate }}">
        </div> --}}

        <div class="mb-3">
            <label for="city" class="form-label" style="font-size: 25px;">المدينة</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="أدخل المدينة" value="{{ $craftsman->city }}">
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary">تعديل</button>
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

{{-- @endsection --}}
