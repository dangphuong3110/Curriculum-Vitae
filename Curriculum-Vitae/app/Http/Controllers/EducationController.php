<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Education;

class EducationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $courses = Education::where('user_id', $user->id)->latest()->paginate(2);
        return view('guest.profile.education.index', compact('user', 'courses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();

        return view('guest.profile.education.create-course', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $course = new Education();

        $course->major = $request->input('major');
        $course->degree = $request->input('degree');
        $course->school = $request->input('school');
        $course->description = $request->input('description');
        $course->start_date = $request->input('start-date');
        $course->end_date = $request->input('end-date');
        $course->user_id = $user->id;

        $course->save();

        return redirect()->route('education.index')->with('success', 'Course has been added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('error.error');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();
        $course = Education::findOrFail($id);

        return view('guest.profile.education.edit-course', compact('user', 'course'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $course = Education::findOrFail($id);

        $course->major = $request->input('major');
        $course->degree = $request->input('degree');
        $course->school = $request->input('school');
        $course->description = $request->input('description');
        $course->start_date = $request->input('start-date');
        $course->end_date = $request->input('end-date');

        $course->save();

        return redirect()->route('education.edit', $id)->with('success', 'Course has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $course = Education::findOrFail($id);
        $course->delete();

        return redirect()->route('education.index')->with('success', 'Course deleted successfully.');
    }
}
