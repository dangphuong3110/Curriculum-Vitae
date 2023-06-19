<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\About;
use App\Models\Skill;
use App\Models\Portfolio;
use App\Models\WorkExperience;
use App\Models\Education;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($user_id)
    {
        $user = User::where('id', '=', $user_id)->get()->first();

        if(isset($user)){
            $about = About::where('user_id', '=', $user_id)->get()->first();
            $skills = Skill::where('user_id', '=', $user_id)->get();
            $portfolios = Portfolio::where('user_id', '=', $user_id)->get();
            $workExperiences = WorkExperience::where('user_id', '=', $user_id)->get();
            $courses = Education::where('user_id', '=', $user_id)->get();
    
            return view('guest.index', compact('user', 'about', 'skills', 'portfolios', 'workExperiences', 'courses'));
        }
        else{
            return view('error.error');
        }
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
