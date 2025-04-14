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
    public function index()
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
        $today = Carbon::today();
        $nextWeek = $today->copy()->addWeek(); // إضافة أسبوع للتاريخ الحالي

        // عدد الحرفيين الذين تنتهي اشتراكاتهم خلال أسبوع
        $expiringInOneWeek = Employee::whereHas('subscription', function ($query) use ($today, $nextWeek) {
            $query->whereBetween('endDate', [$today, $nextWeek]);
        })->count();

        // عدد الحرفيين منتهي الاشتراك
        $expiredEmployeesCount = Employee::whereHas('subscription', function ($query) use ($today) {
            $query->where('endDate', '<', $today);
        })->count();

        // عدد الأيام المتبقية على أقرب اشتراك بينتهي
        $day = Date::where('endDate', '>', $today)->orderBy('endDate')->first();
        $day = $day ? $today->diffInDays(Carbon::parse($day->endDate)) : 0;

        return view('dashboard', compact(
            'allEmployees',
            'allCategories',
            'allGovernorates',
            'latestEndDate',
            'expiringInOneWeek',
            'expiredEmployeesCount',
            'day'
        ));
    }
    public function countAll()
{
    return response()->json([
        'employees' => Employee::count(),
        'categories' => Category::count(),
        'governorates' => Governorate::count(),
    ]);
}
}
