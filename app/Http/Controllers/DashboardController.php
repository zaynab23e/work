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
    public function yourMethod()
    {
        // عدد الموظفين الإجمالي
        $allEmployees = Employee::count();
        
        // عدد الفئات الإجمالي
        $allCategories = Category::withCount('employees')->count();
        
        // عدد المحافظات الإجمالي
        $allGovernorates = Governorate::withCount('craftsmen')->count();
        
        // الحصول على أحدث تاريخ انتهاء من جدول dates
        $latestEndDate = Date::max('endDate');
        
        // حساب تاريخ اليوم وتاريخ الأسبوع المقبل
        $today = Carbon::today();
        $nextWeek = $today->addWeek(); // إضافة أسبوع للتاريخ الحالي
        
        // حساب عدد الأشخاص الذين تنتهي اشتراكاتهم خلال أسبوع
        $expiringInOneWeek = Employee::whereHas('subscription', function ($query) use ($today, $nextWeek) {
            $query->whereBetween('endDate', [$today, $nextWeek]); // اشتراكات تنتهي بين اليوم والأسبوع المقبل
        })->count();
        
        // الحصول على جميع الموظفين (إذا كنت بحاجة لذلك في العرض)
        $all = Employee::all();
        
        // إعادة البيانات إلى العرض
        return view('dashboard', compact('allEmployees', 'allCategories', 'allGovernorates', 'latestEndDate', 'expiringInOneWeek', 'all'));
    }
}
