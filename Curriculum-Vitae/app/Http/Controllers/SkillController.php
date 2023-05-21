<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Skill;
use Illuminate\Support\Facades\Validator;

class SkillController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $skills = Skill::where('user_id', $user->id)->latest()->paginate(4);
        return view('guest/profile/skills/index', compact('user', 'skills'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();
        return view('guest/profile/skills/create-skill', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'skill-percent' => 'numeric|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->route('skills.create')->with('failure', 'Skill Level must be an integer.');
        }

        $user = Auth::user();
        $skill = new Skill();
        
        $skill->skill_name = $request->input('skill-name');
        $skill->skill_percent = $request->input('skill-percent');
        $skill->user_id = $user->id;

        $skill->save();

        return redirect()->route('skills.index')->with('success', 'Skill has been added successfully.');
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
        $skill = Skill::findOrFail($id);

        return view('guest/profile/skills/edit-skill', compact('user', 'skill'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), [
            'skill-percent' => 'numeric|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->route('skills.edit', $id)->with('failure', 'Skill Level must be an integer.');
        }

        $skill = Skill::findOrFail($id);

        $skill->skill_name = $request->input('skill-name');
        $skill->skill_percent = $request->input('skill-percent');

        $skill->save();

        return redirect()->route('skills.edit', $id)->with('success', 'Skill has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $skill = Skill::findOrFail($id);
        $skill->delete();

        return redirect()->route('skills.index')->with('success', 'Skill deleted successfully.');
    }
}
