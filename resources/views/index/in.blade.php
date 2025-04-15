@extends('layout.tmp')

@section('conntent')
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

<div class="container py-4" dir="rtl">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">
            <i class="bi bi-calendar-x text-danger"></i>
            الاشتراكات المنتهية
        </h2>
        <a href="{{ route('in') }}" class="btn btn-outline-secondary">
            <i class="bi bi-arrow-left"></i> العودة للرئيسية
        </a>
    </div>

    @if(isset($debugDates) && $debugDates->count() > 0)
    <div class="alert alert-info mb-4">
        <h5>بيانات التصحيح:</h5>
        <pre>{{ print_r($debugDates->toArray(), true) }}</pre>
    </div>
    @endif

    <!-- Dashboard Cards Row -->
    <div class="row g-4 mb-4">
        <!-- بطاقة عدد الموظفين -->
        <div class="col-md-3">
            <div class="card dashboard-card bg-primary bg-opacity-10 border-start border-primary border-5">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="icon-box bg-primary bg-opacity-25">
                            <i class="bi bi-people-fill fs-2 text-primary"></i>
                        </div>
                        <div class="text-end">
                            <h5 class="card-title text-muted mb-1">إجمالي الموظفين</h5>
                            <h2 class="mb-0 fw-bold">{{ $allEmployees ?? 0 }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- بطاقة عدد المحافظات -->
        <div class="col-md-3">
            <div class="card dashboard-card bg-success bg-opacity-10 border-start border-success border-5">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="icon-box bg-success bg-opacity-25">
                            <i class="bi bi-map fs-2 text-success"></i>
                        </div>
                        <div class="text-end">
                            <h5 class="card-title text-muted mb-1">عدد المحافظات</h5>
                            <h2 class="mb-0 fw-bold">{{ $allGovernorates ?? 0 }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- بطاقة عدد الأقسام (المهن) -->
        <div class="col-md-3">
            <div class="card dashboard-card bg-warning bg-opacity-10 border-start border-warning border-5">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="icon-box bg-warning bg-opacity-25">
                            <i class="bi bi-briefcase fs-2 text-warning"></i>
                        </div>
                        <div class="text-end">
                            <h5 class="card-title text-muted mb-1">عدد الأقسام</h5>
                            <h2 class="mb-0 fw-bold">{{ $allCategories ?? 0 }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- بطاقة الاشتراكات النشطة -->
        <div class="col-md-3">
            <div class="card dashboard-card bg-purple bg-opacity-10 border-start border-purple border-5">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="icon-box bg-purple bg-opacity-25">
                            <i class="bi bi-calendar-check fs-2 text-purple"></i>
                        </div>
                        <div class="text-end">
                            <h5 class="card-title text-muted mb-1">الاشتراكات النشطة</h5>
                            <h2 class="mb-0 fw-bold">{{ $activeEmployeesCount ?? 0 }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- بطاقة الاشتراكات التي ستنتهي قريباً -->
        <div class="col-md-3">
            <div class="card dashboard-card bg-info bg-opacity-10 border-start border-info border-5">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="icon-box bg-info bg-opacity-25">
                            <i class="bi bi-calendar-week fs-2 text-info"></i>
                        </div>
                        <div class="text-end">
                            <h5 class="card-title text-muted mb-1">الاشتراكات المنتهية خلال أسبوع</h5>
                            <h2 class="mb-0 fw-bold">{{ $expiringInOneWeek ?? 0 }}</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Expired Subscriptions Table -->
    <div class="card shadow-sm">
        <div class="card-header bg-danger text-white">
            <i class="bi bi-exclamation-triangle"></i>
            عدد الموظفين المنتهية اشتراكاتهم: {{ $expiredEmployees->count() ?? 0 }}
        </div>
        
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="table-light">
                        <tr>
                            <th width="5%">#</th>
                            <th width="25%">اسم الموظف</th>
                            <th width="20%">تاريخ الانتهاء</th>
                            <th width="15%">الأيام المنقضية</th>
                            <th width="20%">آخر اشتراك</th>
                            <th width="15%">إجراءات</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($expiredEmployees ?? [] as $employee)
                        @php
                            $latestDate = $employee->dates()->first();
                            $daysExpired = Carbon\Carbon::parse($latestDate->endDate)->diffInDays(Carbon\Carbon::now());
                        @endphp
                        <tr>
                            {{-- <td>{{ $loop->iteration }}</td>
                            <td>{{ $employee->}}</td> --}}
                            <td>{{ $latestDate->endDate }}</td>
                            <td class="text-danger fw-bold">{{ $daysExpired }} يوم</td>
                            {{-- <td>{{ $latestDate->amount }} ريال</td> --}}
                            {{-- <td>
                                <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="bi bi-eye"></i> عرض
                                </a>
                            </td> --}}
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">لا توجد اشتراكات منتهية</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<style>
    .dashboard-card {
        border-radius: 10px;
        transition: transform 0.3s ease;
        height: 100%;
    }
    
    .dashboard-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    
    .icon-box {
        width: 50px;
        height: 50px;
        border-radius: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    
    .bg-purple {
        background-color: #6f42c1 !important;
    }
    
    .text-purple {
        color: #6f42c1 !important;
    }
    
    .border-purple {
        border-color: #6f42c1 !important;
    }
</style>
@endsection