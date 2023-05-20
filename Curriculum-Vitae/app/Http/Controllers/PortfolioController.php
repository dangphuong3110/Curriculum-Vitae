<?php

namespace App\Http\Controllers;

use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $portfolios = Portfolio::where('user_id', $user->id)->latest()->paginate(2);
        return view('guest/profile/portfolios/index', compact('user', 'portfolios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();

        return view('guest/profile/portfolios/create-project', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = Auth::user();
        $project = new Portfolio();
        $project->project_name = $request->input('project-name');
        $project->project_link = $request->input('project-link');
        $project->project_desc = $request->input('project-desc');
        $project->image = $request->input('image');
        $project->user_id = $user->id;

        $image = $request->file('image');

        $portfolios = Portfolio::where('user_id', $user->id)->get();
        $count_project = count($portfolios);
        if($image) {
            $extension = $image->getClientOriginalExtension();

            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            if(in_array($extension, $allowedExtensions)) {
                $imageName = 'project' . ($count_project + 1) . '-' . $user->id . '.jpg';
                $image->move(public_path('images/projects_img'), $imageName);
                $project->image = $imageName;
            }
            else {
                return redirect()->route('portfolios.create')->with('failure', 'The uploaded file must be in the correct image format (jpg, jpeg, png, gif).');
            }   
        }

        $project->save();

        return redirect()->route('portfolios.index')->with('success', 'Project has been added successfully.');
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
