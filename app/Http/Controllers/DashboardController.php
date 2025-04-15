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
        
        $today = Carbon::today()->format('Y-m-d');
        $nextWeek = Carbon::today()->addWeek()->format('Y-m-d');

        $expiringInOneWeek = Employee::whereHas('dates', function ($query) use ($today, $nextWeek) {
            $query->whereDate('endDate', '>=', $today)
                ->whereDate('endDate', '<=', $nextWeek);
        })->count();

        $expiredEmployeesCount = Employee::whereHas('dates', function ($query) use ($today) {
            $query->whereDate('endDate', '<', $today);
        })->count();

        $activeEmployeesCount = Employee::whereHas('dates', function ($query) use ($today) {
            $query->whereDate('endDate', '>=', $today);
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

    public function expiredEmployees()
    {
        $today = Carbon::today()->format('Y-m-d');
        
        $expiredEmployees = Employee::with(['dates' => function($query) {
            $query->orderBy('endDate', 'desc');
        }])
        ->whereHas('dates', function($query) use ($today) {
            $query->whereDate('endDate', '<', $today);
        })->get();
    
        // إحصائيات إضافية
        $stats = [
            'allEmployees' => Employee::count(),
            'allGovernorates' => Governorate::count(),
            'allCategories' => Category::count(),
            'activeEmployeesCount' => Employee::whereHas('dates', function($query) use ($today) {
                $query->whereDate('endDate', '>=', $today);
            })->count(),
            'expiringInOneWeek' => Employee::whereHas('dates', function($query) use ($today) {
                $nextWeek = Carbon::today()->addWeek()->format('Y-m-d');
                $query->whereDate('endDate', '>=', $today)
                    ->whereDate('endDate', '<=', $nextWeek);
            })->count()
        ];
    
        return view('employees.expired', array_merge([
            'expiredEmployees' => $expiredEmployees,
            'today' => $today
        ], $stats));
    }
    

}