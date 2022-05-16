<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pets;

class PetsController extends Controller
{
    public function index()
    {
        $pets = Pets::latest()->paginate(5);
  
        return view('pets.index',compact('pets'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }
   
     
    public function create()
    {
        return view('pets.create');
    }
  
   
    public function store(Request $request)
    {
        $request->validate([
            'name_of_pet' => 'required',
            'animal_type' => 'required',
            'owner' => 'required',
            'address_of_owner' => 'required',
        ]);
  
        Pets::create($request->all());
   
        return redirect()->route('pets.index')
                        ->with('success','Record successfully created.');
    }
   
   
    public function show(Pets $pet)
    {
        return view('pets.show',compact('pet'));
    }
   
    
    public function edit(Pets $pet)
    {
        return view('pets.edit',compact('pet'));
    }
  
   
    public function update(Request $request, Pets $pet)
    {
        $request->validate([
            'name_of_pet' => 'required',
            'animal_type' => 'required',
            'owner' => 'required',
            'address_of_owner' => 'required',
        ]);
  
        $pet->update($request->all());
  
        return redirect()->route('pets.index')
                        ->with('success','Record succesfully updated');
    }
  
  
    public function destroy(Pets $pet)
    {
        $pet->delete();
  
        return redirect()->route('pets.index')
                        ->with('success','Record succesfully deleted');
    }
}
