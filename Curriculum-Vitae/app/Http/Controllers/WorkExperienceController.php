<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\WorkExperience;

class WorkExperienceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $workExperiences = WorkExperience::where('user_id', $user->id)->latest()->paginate(2);
        return view('guest/profile/work-experiences/index', compact('user', 'workExperiences'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();

        return view('guest/profile/work-experiences/create-work-experience', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $workExperience = new WorkExperience();

        $workExperience->company = $request->input('company');
        $workExperience->job_position = $request->input('job-position');
        $workExperience->description = $request->input('description');
        $workExperience->start_date = $request->input('start-date');
        $workExperience->end_date = $request->input('end-date');
        $workExperience->user_id = $user->id;

        $workExperience->save();

        return redirect()->route('work-experiences.index')->with('success', 'Work Experience has been added successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = Auth::user();
        $workExperience = WorkExperience::findOrFail($id);

        return view('guest/profile/work-experiences/edit-work-experience', compact('user', 'workExperience'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $workExperience = WorkExperience::findOrFail($id);

        $workExperience->company = $request->input('company');
        $workExperience->job_position = $request->input('job-position');
        $workExperience->description = $request->input('description');
        $workExperience->start_date = $request->input('start-date');
        $workExperience->end_date = $request->input('end-date');

        $workExperience->save();

        return redirect()->route('work-experiences.edit', $id)->with('success', 'Work Experience has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $workExperience = WorkExperience::findOrFail($id);
        $workExperience->delete();

        return redirect()->route('work-experiences.index')->with('success', 'Work Experience deleted successfully.');
    }
}
