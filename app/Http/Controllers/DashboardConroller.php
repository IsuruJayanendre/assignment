<?php

namespace App\Http\Controllers;
use App\Models\Person;
use Illuminate\Support\Carbon;

use Illuminate\Http\Request;

class DashboardConroller extends Controller
{
    public function dashboard()
    {

        //row count
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

        // Convert month number to name
        $monthLabels = array_map(fn($m) => Carbon::create()->month($m)->format('F'), array_keys($birthMonths));

        return view('dashboard', [
            'ageGroups' => $ageGroups,
            'monthLabels' => $monthLabels,
            'monthCounts' => array_values($birthMonths),
            'totalPeople' => $totalPeople,
        ]);
    }

    // public function dashboard()
    // {
    //     $count = Person::count();
    //     return view('dashboard', compact('count'));
    // }
}
