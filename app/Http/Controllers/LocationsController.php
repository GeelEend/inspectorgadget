<?php

namespace App\Http\Controllers;

use App\Models\Location;
use App\Models\Teacher;
use Illuminate\Http\Request;

class LocationsController extends Controller
{
    public function index() {
        $teachers = Teacher::all();

        return view('home', [
            'teachers' => $teachers,
        ]);
    }
    public function create() {
        return view('home',[
            'locations' => new Location(),
        ]);
    }

    public function store(Request $request) {
        $location = new Location();
        $location->teacher_id = $request->input('teacher');
        $location->x = $request->input('x');
        $location->y = $request->input('y');
        $location->student_id = auth()->user()->id;
        $location->save();

        return Teacher::with('lastlocation')->find($request->input('teacher'))->toJson();
    }
    public function getLocations() {
        $locations = Teacher::with('lastlocation')->get();
        return $locations->toJson();
    }
}
