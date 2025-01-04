<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\User;
use App\Models\Employee;
use App\Models\Governorate;
use App\Http\Requests\storecraftsmen;
use App\Http\Requests\updateCraftsmen;
class CategoryController extends Controller
{
    public function index(){
$allCat=Category::all();
return view('category.index',compact('allCat'));

}
//____________________________________________________________________________________________________

public function show(string $id){

    $category = Category::with('employees')->find($id);
    $craftsmen=Employee::find($id);

    return view('category.show', compact('category','craftsmen'));

}
//_______________________________________________________________________________________________________________
public function create(){
    return view('category.create');
}
//________________________________________________________________________________________________________________

public function store(request $request){
    $validatedDta=$request->validate([
    
    'name'=>'required|string',
    ]);
    $category=Category::create([
    'name'=>$validatedDta['name'],
        
    ]);
    
    return redirect( )->route('index_category');
    }
    
    //______________________________________________________________________________________________________

    
public function edit(string $id){
    $category=Category::find($id);
    return view('category.edit',compact('category'));

}
//_________________________________________________________________________________________________________
public function update(request $request , string $id){

    $validatedData=$request->validate([
        'name'=>'required|string',
    ]);

    $category=Category::find($id);
    $category->update($request->all());
    return redirect()-> route('index_category');
}
//___________________________________________________________________________________________________________________
//__________________________________________show category_________________________________________________________________________
//___________________________________________________________________________________________________________________
public function create_cr(string $id)
{
    $Governorates=Governorate::all();
    $Categories=Category::find($id) ;
    return view('category.showw',compact('Governorates','Categories'));
}
//_____________________________________________________________________________________________________

//_______________________________________________________________________________________________________________
public function store_cr(storecraftsmen $request)
{
    $validatedData = $request->validated();
 // تخزين الصور إذا كانت موجودة
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


    $startDate = \Carbon\Carbon::parse($validatedData['startDate']);
    $endDate = $startDate->addMonth(); 
    $validatedData['EndDate'] = $endDate->format('Y-m-d');

    $craftsman = Employee::create($validatedData);

    return redirect()->route('category.show', ['id' => $craftsman->category_id])
    ->with('success', 'تم تحديث البيانات بنجاح!');
}
//_____________________________________________________________________________________________________

//_______________________________________________________________________________________________________________
public function edit_cr(string $id)
{
    $craftsman=Employee::with(['Category','Governorate'])->findOrFail($id);
    $Governorates=Governorate::all();
    $Categories=Category::all();
    return view('category.editt', compact('craftsman','Governorates','Categories'));
}
//_______________________________________________________________________________________________________________
public function update_cr(updateCraftsmen $request, string $id)
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


    $startDate = \Carbon\Carbon::parse($validatedData['startDate']);
    $endDate = $startDate->addMonth();
    $validatedData['EndDate'] = $endDate->format('Y-m-d');

    $craftsman->update($validatedData);

    // Redirect with the required 'id' parameter
    return redirect()->route('category.show', ['id' => $craftsman->category_id])
        ->with('success', 'تم تحديث البيانات بنجاح!');
}


//_______________________________________________________________________________________________________________
public function destroy_cr(string $id)
{
    $craftsman = Employee::findOrFail($id);
    $craftsman->delete();
    return back();//show 
   
    
}
//_______________________________________________________________________________________________________________
}
