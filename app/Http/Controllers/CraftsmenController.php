<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Notifications\DateIsEnd;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Requests\storecraftsmen;
use App\Http\Requests\updateCraftsmen;
use App\Models\Governorate;
use App\Models\Category;
use App\Models\Date;
use App\Models\User;
use Auth;



class CraftsmenController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        
        $craftsmens = Employee::with('category', 'governorate')
            ->when($search, function ($query, $search) {
                $query->where('name', 'LIKE', "%{$search}%")
                    ->orWhereHas('category', function ($q) use ($search) {
                        $q->where('name', 'LIKE', "%{$search}%");
                    });
                })
                ->get();
                return view('work.index', compact('craftsmens'));
            
            
        
    }
//_______________________________________________________________________________________________________________
    public function create()
    {
        $Governorates=Governorate::all();
        $Categories=Category::all();
        $date=Date::all();
        return view('work.create',compact('Governorates','Categories','date'));
    }
//_______________________________________________________________________________________________________________
public function store(storecraftsmen $request)
{
    // Validate the request data
    $validatedData = $request->validated();

    // Handle image uploads
    if ($request->hasFile('image')) {
        $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
        $request->file('image')->move(public_path('images/employees'), $imageName);
        $validatedData['image'] = 'images/employees/' . $imageName;
    }

    if ($request->hasFile('imageA')) {
        $imageAName = time() . '_' . $request->file('imageA')->getClientOriginalName();
        $request->file('imageA')->move(public_path('images/employees'), $imageAName);
        $validatedData['imageA'] = 'images/employees/' . $imageAName;
    }

    if ($request->hasFile('imageB')) {
        $imageBName = time() . '_' . $request->file('imageB')->getClientOriginalName();
        $request->file('imageB')->move(public_path('images/employees'), $imageBName);
        $validatedData['imageB'] = 'images/employees/' . $imageBName;
    }


    // حفظ بيانات الموظف
    $employee = Employee::create($validatedData);

    // حساب تاريخ الانتهاء بناءً على تاريخ الاشتراك
    $startDate = Carbon::parse($validatedData['startDate']);
    $endDate = $startDate->copy()->addMonth();

    // حفظ التاريخ
    $employee->dates()->create([
        'startDate' => $startDate->format('Y-m-d'),
        'endDate' => $endDate->format('Y-m-d'),
    ]);

    return redirect()->route('index'); 
    } 



//_______________________________________________________________________________________________________________
    public function show(string $id)
    {
        $craftsman=Employee::with(['Category:id,name','Governorate:id,name', 'dates'])->findOrFail($id);
        return view('work.show', compact('craftsman'));
        
    }
//_______________________________________________________________________________________________________________
    public function edit(string $id)
    {
        $craftsman=Employee::with(['Category','Governorate','dates'])->findOrFail($id);
        $Governorates=Governorate::all();
        $Categories=Category::all();
        return view('work.edit', compact('craftsman','Governorates','Categories'));
    }
//_______________________________________________________________________________________________________________
public function update(updateCraftsmen $request, string $id)
{
    $validatedData = $request->validated();
    $craftsman = Employee::findOrFail($id);

    if ($request->hasFile('image')) {
        $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
        $path = $request->file('image')->move(public_path('images/employees'), $imageName);
        $validatedData['image'] = 'images/employees/' . $imageName;
    }

    if ($request->hasFile('imageA')) {
        $imageAName = time() . '_A_' . $request->file('imageA')->getClientOriginalName();
        $path = $request->file('imageA')->move(public_path('images/employees'), $imageAName);
        $validatedData['imageA'] = 'images/employees/' . $imageAName;
    }

    if ($request->hasFile('imageB')) {
        $imageBName = time() . '_B_' . $request->file('imageB')->getClientOriginalName();
        $path = $request->file('imageB')->move(public_path('images/employees'), $imageBName);
        $validatedData['imageB'] = 'images/employees/' . $imageBName;
    }
 // تحديث بيانات الموظف (بدون التاريخ)
$craftsman->update($validatedData);

 // تحديث التاريخ إن وجد
if (isset($validatedData['startDate'])) {
    $startDate = Carbon::parse($validatedData['startDate']);
    $endDate = $startDate->copy()->addMonth();

     // تحديث أول تاريخ مرتبط بالموظف
    $date = $craftsman->dates()->first();
    if ($date) {
        $date->update([
            'starDate' => $startDate->format('Y-m-d'),
            'endDate' => $endDate->format('Y-m-d'),
        ]);
    }
}

    return redirect()->route('index');
}

//_______________________________________________________________________________________________________________
    public function destroy(string $id)
    {
        $craftsman = Employee::findOrFail($id);
        $craftsman->delete();
        return redirect()->route('index');
    }
//_______________________________________________________________________________________________________________


public function indexph(string $id){

    $craftsman=Employee::with(['Category:id,name','Governorate:id,name'])->findOrFail($id);
    return view('index.allph', compact('craftsman'));

}

//_______________________________________________________________________________________________________________
public function subscriptionHistory($id)
{
    $craftsman = Employee::findOrFail($id);
    $today = \Carbon\Carbon::today()->format('Y-m-d');

    // جلب كل التواريخ
    $subscriptions = $craftsman->dates ?? [];

    // جلب الاشتراك الحالي (اللي endDate أكبر من أو يساوي اليوم)
    $currentSubscription = $craftsman->dates()
        ->where('endDate', '>=', $today)
        ->orderBy('endDate', 'asc') // عشان تجيب أقرب اشتراك حالي
        ->first();

    return view('index.history', compact('craftsman', 'subscriptions', 'currentSubscription'));
}
//_______________________________________________________________________________________________________________


}
