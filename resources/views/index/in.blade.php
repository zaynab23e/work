@extends('layout.tmp')
@section('content')

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

<div class="container mt-5" style="margin-left: 300px;" dir="rtl">
    <div class="row g-4">
        <!-- بطاقة عدد الموظفين -->
        <div class="col-md-6">
            <div class="card dashboard-card bg-primary bg-opacity-10 border-start border-primary border-5">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="icon-box bg-primary bg-opacity-25">
                            <i class="bi bi-people-fill fs-2 text-primary"></i>
                        </div>
                        <div class="text-end">
                            <h5 class="card-title text-muted mb-1">إجمالي الموظفين</h5>
                            <h2 class="mb-0 fw-bold">{{ $allEmployees }}</h2>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="badge bg-primary">+5% عن الشهر الماضي</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- بطاقة عدد الأقسام -->
        <div class="col-md-6">
            <div class="card dashboard-card bg-success bg-opacity-10 border-start border-success border-5">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="icon-box bg-success bg-opacity-25">
                            <i class="bi bi-briefcase-fill fs-2 text-success"></i>
                        </div>
                        <div class="text-end">
                            <h5 class="card-title text-muted mb-1">عدد الأقسام (المهن)</h5>
                            <h2 class="mb-0 fw-bold">{{ $allCategories }}</h2>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="badge bg-success">ثابت منذ آخر تحديث</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- بطاقة عدد المحافظات -->
        <div class="col-md-6">
            <div class="card dashboard-card bg-warning bg-opacity-10 border-start border-warning border-5">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="icon-box bg-warning bg-opacity-25">
                            <i class="bi bi-geo-alt-fill fs-2 text-warning"></i>
                        </div>
                        <div class="text-end">
                            <h5 class="card-title text-muted mb-1">عدد المحافظات</h5>
                            <h2 class="mb-0 fw-bold">{{ $allGovernorates }}</h2>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="badge bg-warning text-dark">26 محافظة رئيسية</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- بطاقة الاشتراكات المنتهية -->
        <div class="col-md-6">
            <div class="card dashboard-card bg-danger bg-opacity-10 border-start border-danger border-5">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="icon-box bg-danger bg-opacity-25">
                            <i class="bi bi-calendar-x-fill fs-2 text-danger"></i>
                        </div>
                        <div class="text-end">
                            <h5 class="card-title text-muted mb-1">الاشتراكات المنتهية</h5>
                            <h2 class="mb-0 fw-bold">{{ $expiredEmployeesCount }}</h2>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('employees.expired') }}" class="btn btn-sm btn-outline-danger">عرض التفاصيل</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- بطاقة الاشتراكات التي ستنتهي قريباً -->
        <div class="col-md-6">
            <div class="card dashboard-card bg-info bg-opacity-10 border-start border-info border-5">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="icon-box bg-info bg-opacity-25">
                            <i class="bi bi-calendar-week fs-2 text-info"></i>
                        </div>
                        <div class="text-end">
                            <h5 class="card-title text-muted mb-1">الاشتراكات المنتهية خلال أسبوع</h5>
                            <h2 class="mb-0 fw-bold">{{ $expiringInOneWeek }}</h2>
                        </div>
                    </div>
                    <div class="mt-3">
                        <a href="{{ route('employees.expiring') }}" class="btn btn-sm btn-outline-info">تجديد الاشتراكات</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- بطاقة الاشتراكات النشطة -->
        <div class="col-md-6">
            <div class="card dashboard-card bg-purple bg-opacity-10 border-start border-purple border-5">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="icon-box bg-purple bg-opacity-25">
                            <i class="bi bi-calendar-check fs-2 text-purple"></i>
                        </div>
                        <div class="text-end">
                            <h5 class="card-title text-muted mb-1">الاشتراكات النشطة</h5>
                            <h2 class="mb-0 fw-bold">{{ $activeEmployeesCount }}</h2>
                        </div>
                    </div>
                    <div class="mt-3">
                        <span class="badge bg-purple">{{ round(($activeEmployeesCount/$allEmployees)*100, 2) }}% من الموظفين</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- بطاقة إحصائية إضافية -->
        <div class="col-12">
            <div class="card dashboard-card bg-dark bg-opacity-10 border-start border-dark border-5">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <h5 class="card-title text-muted mb-3">إحصائيات الاشتراكات</h5>
                            <div class="d-flex justify-content-between mb-2">
                                <span>الاشتراكات النشطة:</span>
                                <strong>{{ $activeEmployeesCount }} ({{ round(($activeEmployeesCount/$allEmployees)*100, 2) }}%)</strong>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>المنتهية خلال أسبوع:</span>
                                <strong>{{ $expiringInOneWeek }} ({{ round(($expiringInOneWeek/$allEmployees)*100, 2) }}%)</strong>
                            </div>
                            <div class="d-flex justify-content-between">
                                <span>الاشتراكات المنتهية:</span>
                                <strong>{{ $expiredEmployeesCount }} ({{ round(($expiredEmployeesCount/$allEmployees)*100, 2) }}%)</strong>
                            </div>
                        </div>
                        <div class="col-md-6 text-center">
                            <div class="chart-container" style="position: relative; height:200px; width:100%">
                                <canvas id="subscriptionChart"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- إضافة Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const ctx = document.getElementById('subscriptionChart').getContext('2d');
        const subscriptionChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['نشطة', 'تنتهي قريباً', 'منتهية'],
                datasets: [{
                    data: [
                        {{ $activeEmployeesCount }},
                        {{ $expiringInOneWeek }},
                        {{ $expiredEmployeesCount }}
                    ],
                    backgroundColor: [
                        '#4bc0c0',
                        '#ffcd56',
                        '#ff6384'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        rtl: true
                    }
                }
            }
        });
    });
</script>

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