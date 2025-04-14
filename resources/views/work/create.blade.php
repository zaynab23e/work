
    @extends('layout.tmp')
    @section('title,index')
    
    @section('conntent')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
    
    <div class="container mt-4" dir="rtl">
        <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
            @csrf
    
            <div class="mb-3">
                <label for="name" class="form-label" style="font-size: 25px;">الاسم</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="الاسم" required>
            </div>
    
            <div class="mb-3">
                <label for="phone" class="form-label" style="font-size: 25px;">رقم الهاتف</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="أدخل رقم الهاتف" required>
            </div>
    
            <div class="mb-3">
                <label for="governorates_id" class="form-label" style="font-size: 25px;">المحافظة</label>
                <select class="form-select" id="governorates_id" name="governorates_id" required>
                    <option value="" selected>اختر المحافظة</option>
                    @foreach ($Governorates as $Governorate)
                        <option value="{{ $Governorate->id }}">{{ $Governorate->name }}</option>
                    @endforeach
                </select>
            </div>
    
            <div class="mb-3">
                <label for="city" class="form-label" style="font-size: 25px;">المدينة</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="أدخل المدينة" required>
            </div>
    
            <div class="mb-3">
                <label for="category_id" class="form-label" style="font-size: 25px;">الفئة</label>
                <select class="form-select" id="category_id" name="category_id" required>
                    <option value="" selected>اختر الفئة</option>
                    @foreach ($Categories as $Category)
                        <option value="{{ $Category->id }}">{{ $Category->name }}</option>
                    @endforeach
                </select>
            </div>
    
            <div class="mb-3">
                <label for="NationalNumber" class="form-label" style="font-size: 25px;">الرقم القومي</label>
                <input type="text" class="form-control" id="NationalNumber" name="NationalNumber" placeholder="أدخل الرقم القومي" required>
            </div>
    
            <div class="mb-3">
                <label for="image" class="form-label" style="font-size: 25px;">صوره</label>
                <input type="file" class="form-control" id="image" name="image" accept="image/*">
                @error('image')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="mb-3">
                <label for="imageA" class="form-label" style="font-size: 20px;"><strong>صوره البطاقه</strong></label>
                <input type="file" class="form-control" id="imageA" name="imageA" accept="image/*">
                @error('imageA')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
    
            <div class="mb-3">
                <label for="imageB" class="form-label" style="font-size: 20px;"><strong>صوره السجل التجاري (إن وجد)</strong></label>
                <input type="file" class="form-control" id="imageB" name="imageB" accept="image/*">
                @error('imageB')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
    
            <!-- حقل الاشتراك -->
            <div class="mb-3">
                <label for="startDate" class="form-label" style="font-size: 25px;">الاشتراك</label>
                <input type="text" class="form-control" id="startDate" name="startDate" placeholder="اختر تاريخ الاشتراك" required>
            </div>
    
            <div class="text-center">
                <button type="submit" class="btn btn-primary">إرسال</button>
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
    @endsection
    



    {{-- @extends('layout.tmp')
@section('title,index')

@section('conntent')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css" rel="stylesheet">
<div class="container mt-4" dir="rtl">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <div class="container mt-4">
        <form action="{{ route('store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label" style="font-size: 25px;">الاسم</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="الاسم" required>
            </div>
    

    
            <div class="mb-3">
                <label for="phone" class="form-label" style="font-size: 25px;">رقم الهاتف</label>
                <input type="text" class="form-control" id="phone" name="phone" placeholder="أدخل رقم الهاتف" required>
            </div>
    
            <div class="mb-3">
                <label for="governorates_id" class="form-label" style="font-size: 25px;">المحافظة</label>
                <select class="form-select" id="governorates_id" name="governorates_id" required>
                    <option value="" selected>اختر المحافظة</option>
                    @foreach ($Governorates as $Governorate)
                        <option value="{{ $Governorate->id }}">{{ $Governorate->name }}</option>
                    @endforeach
                </select>
            </div>
    
    </div>

            <div class="mb-3">
                <label for="city" class="form-label" style="font-size: 25px;" >المدينة</label>
                <input type="text" class="form-control" id="city" name="city" placeholder="أدخل المدينة" required>
            </div>
    
            <div class="mb-3">
                <label for="category_id" class="form-label" style="font-size: 25px;">الفئة</label>
                <select class="form-select" id="category_id" name="category_id" required>
                    <option value="" selected>اختر الفئة</option>
                    @foreach ($Categories as $Category)
                        <option value="{{ $Category->id }}">{{ $Category->name }}</option>
                    @endforeach
                </select>
            </div>
    
            <div class="mb-3">
                <label for="NationalNumber" class="form-label" style="font-size: 25px;">الرقم القومي</label>
                <input type="text" class="form-control" id="NationalNumber" name="NationalNumber" placeholder="أدخل الرقم القومي" required>
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


 --}}



