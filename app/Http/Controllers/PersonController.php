<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;

class PersonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $people=Person::all();
        return view('person.index', compact('people'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('person.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'nic'      => 'required|string|max:12|unique:people,nic', // unique nic
            'dob'      => 'required|date',
            'gender'   => 'required|in:male,female,other',
            'religion' => 'nullable|string|max:100',
            'address'  => 'required|string|max:500',
            'phone'    => 'required|string|max:15',
            'email'    => 'required|email|max:255',
        ]);

        try {
            Person::create([
                'name'     => $request->name,
                'nic'      => $request->nic,
                'dob'      => $request->dob,
                'gender'   => $request->gender,
                'religion' => $request->religion,
                'address'  => $request->address,
                'phone'    => $request->phone,
                'email'    => $request->email,
            ]);

            Alert::success('Success', 'Record created successfully.');
            return redirect()->route('person.index');
        } catch (\Exception $e) {
            Alert::error('Error', 'Something went wrong! ' . $e->getMessage());
            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Person $person, $id)
    {
        $person=person::findOrfail($id);
        $age = Carbon::parse($person->dob)->age;
        return view('person.view', compact('person', 'age'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Person $person, $id)
    {
        $person=person::findOrfail($id);
        return view('person.edit', compact('person'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'nic' => 'required|string|max:20|unique:people,nic,' . $id,
            'dob' => 'required|date',
            'gender' => 'required|in:male,female',
            'religion' => 'nullable|string|max:100',
            'address' => 'required|string',
            'phone' => 'required|string|max:15',
            'email' => 'required|email|max:255',
        ]);

        try {
            $person = Person::findOrFail($id);

            $person->update([
                'name' => $request->name,
                'nic' => $request->nic,
                'dob' => $request->dob,
                'gender' => $request->gender,
                'religion' => $request->religion,
                'address' => $request->address,
                'phone' => $request->phone,
                'email' => $request->email,
            ]);

            Alert::success('Updated!', 'Person details updated successfully.');
            return redirect()->route('person.index');
        } catch (\Exception $e) {
            Alert::error('Error', 'Something went wrong: ' . $e->getMessage());
            return back()->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        try {
        $person = Person::findOrFail($id);
        $person->delete();

        Alert::success('Deleted!', 'Person has been deleted successfully.');
        return redirect()->route('person.index');
    } catch (\Exception $e) {
        Alert::error('Error', 'Failed to delete person: ' . $e->getMessage());
        return redirect()->route('person.index');
    }
    }

    public function search(Request $request)
    {
        $query = Person::query();

        if ($request->filled('name')) {
            $query->where('name', 'like', '%' . $request->name . '%');
        }

        if ($request->filled('nic')) {
            $query->where('nic', 'like', '%' . $request->nic . '%');
        }

        if ($request->filled('dob')) {
            $query->whereDate('dob', $request->dob);
        }

        $people = $query->get();

        return view('person.partials.people-table', compact('people'))->render();
    }

}
