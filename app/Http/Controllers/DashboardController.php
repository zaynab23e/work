<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Employee;
use App\Models\Governorate;

use carbon\Carbon; 
class DashboardController extends Controller
{
    public function countAll()
    {
        // Count the total employees
        $allEmployees = Employee::withCount(['category', 'governorate'])->count();
        // Count the total categories
        $allCategories = Category::withCount('employees')->count();
        // Count the total governorates
        $allGovernorates = Governorate::withCount('craftsmen')->count();
        // Get the latest end date of subscription from employees (you can adjust based on your logic)
        $latestEndDate = Employee::max('EndDate'); // This will get the latest end date
        $all=Employee::all();
        $all->now()->greaterThan();
        $expiredEmployeesCount = Employee::whereNotNull('EndDate') // Ensure EndDate is set
        ->where('EndDate', '<', Carbon::now()) // Compare EndDate with current time
        ->count();
        $day=Employee::whereDate('EndDate', Carbon::now()->addDays(3))->count();
        
        // Pass the data to the view
        return view('index.in', compact('allEmployees', 'allCategories', 'allGovernorates' ));
    }
}
