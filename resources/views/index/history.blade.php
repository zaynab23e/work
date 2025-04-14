@extends('layout.tmp')

@section('conntent')
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
@endsection
