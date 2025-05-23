<?php

namespace App\Http\Controllers;

use App\Models\Gender;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class GenderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genders=Gender::all();
        return view('gender.index', compact('genders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:20|unique:genders,name',
        ]);

        try {
            Gender::create([
                'name'     => $request->name,
            ]);

            Alert::success('Success', 'Record created successfully.');
            return redirect()->back();
        } catch (\Exception $e) {
            Alert::error('Error', 'Something went wrong! ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Gender $gender)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gender $gender)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        try {

        $gender = Gender::findOrFail($id);
        $gender->update(['name' => $request->name]);

        Alert::success('Success', 'Record created successfully.');
        return redirect()->back()->with('success', 'Religion updated successfully.');
        }catch (\Exception $e) {
            Alert::error('Error', 'Something went wrong! ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
        $gender = Gender::findOrFail($id);
        $gender->delete();

        Alert::success('Success', 'Record created successfully.');
        return redirect()->back()->with('success', 'Religion deleted successfully.');
        }catch (\Exception $e) {
            Alert::error('Error', 'Something went wrong! ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }
}
