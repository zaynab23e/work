@extends('layout.tmp')

@section('conntent')
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>
<div class="container">
    <div class="row mt-4 main">
        <div class="col-12">
            <div class="my-3">
                <a href="{{ route('index') }}">
                    <button class="btn-dark btn">
                        <i class="fa-solid fa-angles-left"></i>
                    </button>
                </a>
            </div>
        </div>

        <div class="col-12">
            <div class="d-flex align-items-center mb-4" style="border: 1px solid #9c7865; padding: 10px; background-color: #b0b0c087; border-radius: 10px;">
                <!-- Name and occupation -->
                <div style="flex: 1; text-align: right;">
                    <h2 style="margin: 0; color: #181717;">{{ $craftsman->name }}</h2>
                    <p style="margin: 0; color: #0f0c0c;">المهنة: {{ $craftsman->Category ? $craftsman->Category->name : 'غير موجود' }}</p>
                </div>
        
                <!-- Image -->
                <div style="flex-shrink: 0; margin-left: 20px;">
                    @if($craftsman->image)
                        <img src="{{ asset('images/employees/' . basename($craftsman->image)) }}" alt="Image" style="width: 200px; height: 200px; border-radius: 50%; border: 2px solid #ddd;">
                    @else
                        <p style="color: #8888886e;">لا توجد صورة.</p>
                    @endif
                </div>
            </div>
        </div>

        <!-- Employee Information Table -->
        <div class="col-12">
            <table class="table table-bordered table-hover" style="border-color: #171615;">
                <tbody>
                    <tr style="background-color: #e2e2ee87; color: #333; font-weight: bold; border: 2px solid #4f507a;font-size:large;" dir="rtl">
                        <td>{{ $craftsman->phone }}</td>
                        <td>الرقم</td>
                    </tr>
                    <tr style="background-color: #e2e2ee87; color: #333; font-weight: bold; border: 2px solid #4f507a;font-size:large" dir="rtl">
                        <td>{{ $craftsman->Governorate ? $craftsman->Governorate->name : 'غير موجود' }}</td>
                        <td>المحافظة</td>
                    </tr>
                    <tr style="background-color: #e2e2ee87; color: #333; font-weight: bold; border: 2px solid #4f507a;font-size:large" dir="rtl">
                        <td>{{ $craftsman->city }}</td>
                        <td>المدينة</td>
                    </tr>
                    <tr style="background-color: #e2e2ee87; color: #333; font-weight: bold; border: 2px solid #4f507a;font-size:large" dir="rtl">
                        <td>{{ $craftsman->Category ? $craftsman->Category->name : 'غير موجود' }}</td>
                        <td>المهنة</td>
                    </tr>
                    <tr style="background-color: #e2e2ee87; color: #333; font-weight: bold; border: 2px solid #4f507a;font-size:large" dir="rtl">
                        <td>{{ $craftsman->NationalNumber }}</td>
                        <td>رقم الهوية</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <!-- Timeline of Dates -->
        <div class="col-12 mt-5">
            <h3>سجل التواريخ:</h3>
            <div class="timeline" style="position: relative; padding: 10px; border-left: 3px solid #343a40;">
                @foreach($craftsman->dates as $date)
                    <div class="timeline-event" style="position: relative; margin-bottom: 20px;">
                        <div class="timeline-marker" style="position: absolute; left: -7px; top: 5px; background-color: #343a40; width: 15px; height: 15px; border-radius: 50%;"></div>
                        <div class="timeline-content" style="background-color: #f7f7f7; padding: 15px; border-radius: 8px; border: 1px solid #ddd;">
                            <h5>من: {{ \Carbon\Carbon::parse($date->startDate)->format('Y-m-d') }} إلى: {{ \Carbon\Carbon::parse($date->endDate)->format('Y-m-d') }}</h5>
                            <p>تاريخ البداية: {{ $date->startDate }}</p>
                            <p>تاريخ النهاية: {{ \Carbon\Carbon::parse($date->endDate)->format('Y-m-d') }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

{{-- 
        <div class="col-12 text-center">
            <a href="{{ route('',['id'=>$craftsman->id]) }}" class="btn btn-dark">
            عرض سجل الاشتراك 
            </a> --}}

        <div class="col-12 text-center">
            <a href="{{ route('index.allph',['id'=>$craftsman->id]) }}" class="btn btn-dark">
                عرض الاوراق الشخصيه
            </a>
        </div>
    </div>
</div>

@endsection
