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
       
        $allEmployees = Employee::count();
        
       
        $allCategories = Category::count();
        
    
        $allGovernorates = Governorate::count();
        
        $latestEndDate = Date::max('endDate');
        

        $today = Carbon::today();
        $nextWeek = $today->copy()->addWeek(); // إضافة أسبوع للتاريخ الحالي

        // عدد الحرفيين الذين تنتهي اشتراكاتهم خلال أسبوع
        // (بين اليوم واليوم + 7 أيام)
        $expiringInOneWeek = Employee::whereHas('dates', function ($query) use ($today, $nextWeek) {
            $query->where('endDate', '>=', $today)
                ->where('endDate', '<=', $nextWeek);
        })->count();

        // عدد الحرفيين منتهي الاشتراك
        // (تاريخ الانتهاء قبل اليوم)
        $expiredEmployeesCount = Employee::whereHas('dates', function ($query) use ($today) {
            $query->where('endDate', '<', $today);
        })->count();

        return view('index.in', compact(
            'allEmployees',
            'allCategories',
            'allGovernorates',
            'latestEndDate',
            'expiringInOneWeek',
            'expiredEmployeesCount'
        ));
    }
}