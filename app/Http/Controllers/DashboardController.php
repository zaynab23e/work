<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Employee;
use App\Models\Governorate;
use App\Models\Date;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function countAll()
    {
        // تسجيل التاريخ الحالي للفحص
        $today = Carbon::today()->format('Y-m-d');
        $nextWeek = Carbon::today()->addWeek()->format('Y-m-d');
        
        Log::info("Dashboard Date Check - Today: {$today}, Next Week: {$nextWeek}");

        // الإحصائيات الأساسية
        $allEmployees = Employee::count();
        $allCategories = Category::count();
        $allGovernorates = Governorate::count();
        
        // الاشتراكات المنتهية
        $expiredEmployeesCount = Employee::whereHas('dates', function ($query) use ($today) {
            $query->where('endDate', '<', $today);
        })->count();

        // الاشتراكات التي ستنتهي خلال أسبوع
        $expiringInOneWeek = Employee::whereHas('dates', function ($query) use ($today, $nextWeek) {
            $query->where('endDate', '>=', $today)
                  ->where('endDate', '<=', $nextWeek);
        })->count();

        // الموظفون النشطون
        $activeEmployeesCount = Employee::whereHas('dates', function ($query) use ($today) {
            $query->where('endDate', '>=', $today);
        })->count();

        Log::info("Dashboard Stats - Expired: {$expiredEmployeesCount}, Expiring Soon: {$expiringInOneWeek}");

        return view('index.in', compact(
            'allEmployees',
            'allCategories',
            'allGovernorates',
            'expiringInOneWeek',
            'expiredEmployeesCount',
            'activeEmployeesCount'
        ));
    }

    public function expiredEmployees()
    {
        $today = Carbon::today()->format('Y-m-d');
        
        $expiredEmployees = Employee::with(['dates' => function($query) {
            $query->orderBy('endDate', 'desc');
        }])
        ->whereHas('dates', function($query) use ($today) {
            $query->where('endDate', '<', $today);
        })->get();
    
        // إحصائيات إضافية
        $stats = [
            'allEmployees' => Employee::count(),
            'allGovernorates' => Governorate::count(),
            'allCategories' => Category::count(),
            'activeEmployeesCount' => Employee::whereHas('dates', function($query) use ($today) {
                $query->where('endDate', '>=', $today);
            })->count(),
            'expiringInOneWeek' => Employee::whereHas('dates', function($query) use ($today) {
                $nextWeek = Carbon::today()->addWeek()->format('Y-m-d');
                $query->where('endDate', '>=', $today)
                    ->where('endDate', '<=', $nextWeek);
            })->count()
        ];
    
        return view('employees.expired', array_merge([
            'expiredEmployees' => $expiredEmployees,
            'today' => $today
        ], $stats));
    }
}