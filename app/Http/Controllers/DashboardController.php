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
        
        // Debug query
        $debugDates = Date::whereDate('endDate', '<', $today)->get();
        \Log::debug('Expired Dates:', $debugDates->toArray());

        $expiredEmployees = Employee::with(['dates' => function($query) {
            $query->orderBy('endDate', 'desc');
        }])
        ->whereHas('dates', function($query) use ($today) {
            $query->whereDate('endDate', '<', $today);
        })->get();

        return view('employees.expired', [
            'expiredEmployees' => $expiredEmployees,
            'today' => $today,
            'debugDates' => $debugDates
        ]);
    }

    public function expiringEmployees()
    {
        $today = Carbon::today()->format('Y-m-d');
        $nextWeek = Carbon::today()->addWeek()->format('Y-m-d');
        
        $expiringEmployees = Employee::with(['dates' => function($query) {
            $query->orderBy('endDate', 'asc');
        }])
        ->whereHas('dates', function($query) use ($today, $nextWeek) {
            $query->whereDate('endDate', '>=', $today)
                ->whereDate('endDate', '<=', $nextWeek);
        })->get();

        return view('employees.expiring', [
            'expiringEmployees' => $expiringEmployees,
            'today' => $today
        ]);
    }
}