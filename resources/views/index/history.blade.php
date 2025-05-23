@extends('layout.tmp')

@section('conntent')
<div class="container mt-4" dir="rtl">
    <h2 class="mb-4 text-center">سجل الاشتراكات لـ {{ $craftsman->name }}</h2>

    <!-- الاشتراك الحالي -->
    <h3 class="mt-5 text-center">الاشتراك الحالي:</h3>
    @if($currentSubscription)
        <div class="alert alert-success text-center">
            من {{ \Carbon\Carbon::parse($currentSubscription->startDate)->format('Y-m-d') }}
            إلى {{ \Carbon\Carbon::parse($currentSubscription->endDate)->format('Y-m-d') }}
        </div>
    @else
        <p class="text-muted text-center">لا يوجد اشتراك حالي.</p>
    @endif

    <!-- كل الاشتراكات -->
    <h3 class="mt-5 text-center">كل الاشتراكات:</h3>
    <ul class="list-group">
        @forelse($subscriptions as $sub)
            <li class="list-group-item">
                من {{ \Carbon\Carbon::parse($sub->startDate)->format('Y-m-d') }}
                إلى {{ \Carbon\Carbon::parse($sub->endDate)->format('Y-m-d') }}
            </li>
        @empty
            <p class="text-muted text-center">لا يوجد سجلات اشتراك.</p>
        @endforelse
    </ul>

    <h3 class="mt-5 text-center">سجل التواريخ:</h3>
    <div class="timeline" style="position: relative; padding: 10px; border-left: 3px solid #343a40;">
        @foreach($craftsman->dates as $date)
            <div class="timeline-event" style="position: relative; margin-bottom: 20px;">
                <div class="timeline-marker" style="position: absolute; left: -7px; top: 5px; background-color: #343a40; width: 15px; height: 15px; border-radius: 50%;"></div>
                <div class="timeline-content" style="background-color: #f7f7f7; padding: 15px; border-radius: 8px; border: 1px solid #ddd;">
                    <h5>من: {{ \Carbon\Carbon::parse($date->startDate)->format('Y-m-d') }} إلى: {{ \Carbon\Carbon::parse($date->endDate)->format('Y-m-d') }}</h5>
                    <p>تاريخ البداية: {{ \Carbon\Carbon::parse($date->startDate)->format('Y-m-d') }}</p>
                    <p>تاريخ النهاية: {{ \Carbon\Carbon::parse($date->endDate)->format('Y-m-d') }}</p>
                </div>
            </div>
        @endforeach 
    </div>

    <div class="text-center mt-4">
        <a href="{{ url()->previous() }}" class="btn btn-secondary">رجوع</a>
    </div>
</div>
@endsection