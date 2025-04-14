@extends('layout.tmp')

@section('conntent')
<div class="container mt-4">
    <h2 class="mb-4 text-center">سجل الاشتراكات لـ {{ $craftsman->name }}</h2>

    @if($subscriptions && count($subscriptions))
        <ul class="list-group">
            @foreach($subscriptions as $sub)
                <li class="list-group-item">
                    من {{ \Carbon\Carbon::parse($sub->startDate)->format('Y-m-d') }}
                    إلى {{ \Carbon\Carbon::parse($sub->endDate)->format('Y-m-d') }}
                </li>
            @endforeach
        </ul>
    @else
        <p class="text-muted text-center">لا يوجد سجلات اشتراك.</p>
    @endif

    <div class="text-center mt-4">
        <a href="{{ url()->previous() }}" class="btn btn-secondary">رجوع</a>
    </div>
</div>
@endsection
