<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Employee;
use App\Models\Governorate;
use App\Models\Date;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function countAll()
    {
        // عدد الموظفين الإجمالي
        $allEmployees = Employee::count();
        
        // عدد الفئات (المهن) الإجمالي
        $allCategories = Category::count();
        
        // عدد المحافظات الإجمالي
        $allGovernorates = Governorate::count();
        
        // الحصول على أحدث تاريخ انتهاء من جدول dates
        $latestEndDate = Date::max('endDate');
        
        // حساب تاريخ اليوم وتاريخ الأسبوع المقبل
        $today = Carbon::today()->format('Y-m-d');
        $nextWeek = Carbon::today()->addWeek()->format('Y-m-d');

        // عدد الحرفيين الذين تنتهي اشتراكاتهم خلال أسبوع (بين اليوم واليوم + 7 أيام)
        $expiringInOneWeek = Employee::whereHas('dates', function ($query) use ($today, $nextWeek) {
            $query->where('endDate', '>=', $today)
                  ->where('endDate', '<=', $nextWeek);
        })->count();

        // عدد الحرفيين منتهي الاشتراك (تاريخ الانتهاء قبل اليوم)
        $expiredEmployeesCount = Employee::whereHas('dates', function ($query) use ($today) {
            $query->where('endDate', '<', $today);
        })->count();

        // عدد الحرفيين الذين اشتراكاتهم سارية (تاريخ الانتهاء بعد اليوم)
        $activeEmployeesCount = Employee::whereHas('dates', function ($query) use ($today) {
            $query->where('endDate', '>=', $today);
        })->count();

        return view('index.in', compact(
            'allEmployees',
            'allCategories',
            'allGovernorates',
            'latestEndDate',
            'expiringInOneWeek',
            'expiredEmployeesCount',
            'activeEmployeesCount'
        ));
    }
}