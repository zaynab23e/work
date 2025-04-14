@extends('layout.tmp')
@section('conntent')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

<div class="container mt-5" style="margin-left: 300px;" dir="rtl">
    <div class="row g-3">
        <!-- First row: Two cards side by side -->
        <div class="col-md-6">
            <div class="card shadow border-0 text-end" style="background-color: #89a1e0; border-left: 5px solid #0d6efd;">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <i class="bi bi-people fs-1 text-primary"></i>
                        </div>
                        <div>
                            <h5 class="card-title mb-1">عدد الموظفين</h5>
                            <h3 class="mb-0">{{ $allEmployees }}</h3>
                            <div style="font-size: 4rem; color: #e9ecef;">
                                👥
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow border-0 text-end" style="background-color: #5e74aca0; border-left: 5px solid #198754;">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <i class="bi bi-briefcase fs-1 text-success"></i>
                        </div>
                        <div>
                            <h5 class="card-title mb-1">عدد الأقسام (المهن)</h5>
                            <h3 class="mb-0">{{ $allCategories }}</h3>
                            <div style="font-size: 4rem; color: #e9ecef;">
                                💼
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Second row: Two cards side by side -->
        <div class="col-md-6">
            <div class="card shadow border-0 text-end" style="background-color: #89a1e089; border-left: 5px solid #ffc107;">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <i class="bi bi-map fs-1 text-warning"></i>
                        </div>
                        <div>
                            <h5 class="card-title mb-1">عدد المحافظات</h5>
                            <h3 class="mb-0">{{ $allGovernorates }}</h3>
                            <div style="font-size: 4rem; color: #e9ecef;">
                                🗺️
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow border-0 text-end" style="background-color: #f7c9c9; border-left: 5px solid #dc3545;">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <i class="bi bi-calendar-x fs-1 text-danger"></i>
                        </div>
                        <div>
                            <h5 class="card-title mb-1">الحرفين منتهي الاشتراك</h5>
                            <h3 class="mb-0">{{ $expiredEmployeesCount }}</h3>
                            <div style="font-size: 4rem; color: #e9ecef;">
                                📅
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- New Card: Number of employees whose subscriptions expire in the next week -->
        <div class="col-md-6">
            <div class="card shadow border-0 text-end" style="background-color: #e2f0cb; border-left: 5px solid #ffc107;">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <i class="bi bi-calendar-week fs-1 text-warning"></i>
                        </div>
                        <div>
                            <h5 class="card-title mb-1">الحرفين الذين تنتهي اشتراكاتهم خلال أسبوع</h5>
                            <h3 class="mb-0">{{ $expiringInOneWeek }}</h3>
                            <div style="font-size: 4rem; color: #e9ecef;">
                                📅
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Third row: One large card -->
        <div class="col-12">
            <div class="card shadow border-0 text-end" style="background-color: #c98e8e; border-left: 5px solid #dc3545;">
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        <div class="me-3">
                            <i class="bi bi-calendar-x fs-1 text-danger"></i>
                        </div>
                        <div>
                            <h5 class="card-title mb-1">متبقي أيام على انتهاء الاشتراك</h5>
                            <h3 class="mb-0">
                                {{ $day }} حرفي
                                <div style="font-size: 4rem; color: #e9ecef;">
                                    📅
                                </div>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

@endsection
