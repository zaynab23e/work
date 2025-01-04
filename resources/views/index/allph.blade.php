@extends('layout.tmp')
@section('conntent')

<div class="col-12">
    <div class="my-3">
        <a href="{{route('show-Craftsmen',[$craftsman->id]) }}">
        <button class="btn-dark btn">
            <i class="fa-solid fa-angles-left"></i>
        </button>
        </a>
    </div>
<div class="container mt-4" style="margin-left: 50%">
    <div class="row justify-content-end">
        <div class="col-12 text-right" >
            {{-- صورة 1 --}}
            <div class="mb-4">
                @if($craftsman->image)
                    <img src="{{ asset('images/employees/' . basename($craftsman->image)) }}" alt="Image" class="img-fluid" style="width: 500px; height: 410px; border: 2px solid #ddd;" >
                @else
                    <p style="color: #8888886e;">لا توجد صورة.</p>
                @endif
            </div>

            {{-- صورة 2 --}}
            <div class="mb-4">
                @if($craftsman->imageA)
                    <img src="{{ asset('images/employees/' . basename($craftsman->imageA)) }}" alt="Image A" class="img-fluid" style="width: 500px; height:410px; border: 2px solid #ddd;">
                @else
                    <p style="color: #8888886e;">لا توجد صورة.</p>
                @endif
            </div>

            {{-- صورة 3 --}}
            <div class="mb-4">
                @if($craftsman->imageB)
                    <img src="{{ asset('images/employees/' . basename($craftsman->imageB)) }}" alt="Image B" class="img-fluid" style="width: 500px; height: 410px; border: 2px solid #ddd;">
                @else
                    <p style="color: #8888886e;">لا توجد صورة.</p>
                @endif
            </div>
        </div>
    </div>
</div>

@endsection
