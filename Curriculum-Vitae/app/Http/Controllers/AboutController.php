<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\About;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $user = User::findOrFail($id);
        $about = About::where('user_id', $id)->first();

        return view('guest/profile/about/edit-about', compact('user', 'about'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validator = Validator::make($request->all(), [
            'age' => 'numeric|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->route('about.edit', $id)->with('failure', 'Age must be an integer.');
        }

        $about = About::where('user_id', $id)->first();
        $about->content = $request->input('content');
        $about->profession = $request->input('profession');
        $about->age = $request->input('age');
        $about->phone_number = $request->input('phone-number');
        $about->address = $request->input('address');
        $about->language = $request->input('language');
        $about->fb_link = $request->input('fb-link');
        $about->twitter_link = $request->input('twitter-link');
        $about->google_link = $request->input('google-link');
        $about->ins_link = $request->input('ins-link');

        $image = $request->file('image');

        if($image) {
            if($about->image) {
                $oldImagePath = public_path('images/users_img/' . $about->image);
                if(file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }
            $imageName = 'user' . $about->user_id . '.jpg';
            $image->move(public_path('images/users_img'), $imageName);
            $about->image = $imageName;
        }

        $about->save();

        return redirect()->route('about.edit', $id)->with('success', 'About has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
