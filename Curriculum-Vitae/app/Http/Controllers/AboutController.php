<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\About;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $about = About::where('user_id', $user->id)->get()->first();

        if($about){
            return redirect()->route('about.edit', $about->about_id);
        }
            
        // return view('guest/profile/about/create-about', compact('user'));
        return redirect()->route('about.create');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $user = Auth::user();

        return view('guest/profile/about/create-about', compact('user'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'age' => 'numeric|integer',
        ]);

        if ($validator->fails()) {
            return redirect()->route('about.create')->with('failure', 'Age must be an integer.');
        }

        $user = Auth::user();
        $about = new About();
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
        $about->user_id = $user->id;

        $image = $request->file('image');

        if($image) {
            $extension = $image->getClientOriginalExtension();

            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            if(in_array($extension, $allowedExtensions)) {
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
            else {
                return redirect()->route('about.create')->with('failure', 'The uploaded file must be in the correct image format (jpg, jpeg, png, gif).');
            }
            
        }

        $about->save();

        $new_about = About::where('user_id', $user->id)->get()->first();

        return redirect()->route('about.edit', $new_about->about_id)->with('success', 'About has been updated successfully.');
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
        $about = About::findOrFail($id);

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
            $extension = $image->getClientOriginalExtension();

            $allowedExtensions = ['jpg', 'jpeg', 'png', 'gif'];
            if(in_array($extension, $allowedExtensions)) {
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
            else {
                return redirect()->route('about.edit', $id)->with('failure', 'The uploaded file must be in the correct image format (jpg, jpeg, png, gif).');
            }
            
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
