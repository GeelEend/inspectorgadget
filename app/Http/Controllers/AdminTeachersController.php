<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;

class AdminTeachersController extends Controller
{
    public function index() {
        $teacher = Teacher::all();

        return view('admin.teachers.index', [
            'teachers' => $teacher,
        ]);
    }
    public function edit(Teacher $teacher) {
        return view('admin.teachers.edit', [
            'teachers' => $teacher
        ]);
    }
    public function update(Teacher $teacher, Request $request)
    {

        $teacher->fullname = $request->input('fullname');
        $teacher->border = $request->input('border');

        if ($request->hasFile('picture')) {
            // als er al een foto is, die verwijderen
            if ($teacher->picture != '' && file_exists(storage_path($teacher->picture))) {
                unlink(storage_path($teacher->picture));
            }
            // opslaan ergens
            $path = $request->file('picture')->store('images/Teacher');
            // als je 'm opgeslagen hebt, toevoegen aan project
            $teacher->picture = $path;
        }

            $teacher->save();


            return redirect()->route('admin.teachers.list');

    }

    public function create() {
        return view('admin.teachers.edit',[
            'teachers' => new Teacher(),
        ]);
    }

    public function store(Request $request) {
        $teacher = new Teacher();
        $teacher->fullname = $request->input('fullname');
        $teacher->picture = $request->input('picture') ?? '';
        $teacher->border = $request->input('border');
        $teacher->save();
        return redirect()->route('admin.teachers.list');
    }

    public function destroy(Teacher $teacher) {
        $teacher->delete();
        return redirect()->route('admin.teachers.list');
    }
}
