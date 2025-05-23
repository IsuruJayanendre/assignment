<?php

namespace App\Http\Controllers;
use App\Models\Person;
use App\Models\Religion;
use Illuminate\Support\Carbon;

use Illuminate\Http\Request;

class DashboardConroller extends Controller
{
    public function dashboard()
    {
        // Row count
        $totalPeople = Person::count();

        // Age Groups
        $now = Carbon::now();
        $ageGroups = [
            '18–30' => 0,
            '31–50' => 0,
            '51+' => 0
        ];

        $people = Person::all();
        foreach ($people as $person) {
            $age = Carbon::parse($person->dob)->age;
            if ($age >= 18 && $age <= 30) {
                $ageGroups['18–30']++;
            } elseif ($age >= 31 && $age <= 50) {
                $ageGroups['31–50']++;
            } elseif ($age > 50) {
                $ageGroups['51+']++;
            }
        }

        // Birth Month Counts
        $birthMonths = array_fill(1, 12, 0);
        foreach ($people as $person) {
            $month = Carbon::parse($person->dob)->month;
            $birthMonths[$month]++;
        }
        $monthLabels = array_map(fn($m) => Carbon::create()->month($m)->format('F'), array_keys($birthMonths));

        // Religion Counts
        $religions = Religion::all();
        $religionLabels = [];
        $religionCounts = [];

        foreach ($religions as $religion) {
            $religionLabels[] = $religion->name;
            $religionCounts[] = Person::where('religion_id', $religion->id)->count(); // assuming 'religion' is FK
        }

        return view('dashboard', [
            'totalPeople' => $totalPeople,
            'ageGroups' => $ageGroups,
            'monthLabels' => $monthLabels,
            'monthCounts' => array_values($birthMonths),
            'religionLabels' => $religionLabels,
            'religionCounts' => $religionCounts,
        ]);
    }

    // public function dashboard()
    // {
    //     $count = Person::count();
    //     return view('dashboard', compact('count'));
    // }
}
