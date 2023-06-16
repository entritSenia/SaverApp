<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login()
    {
        return inertia('Auth/Login');
    }

    public function store(Request $request)
    {
        $incomingFields = $request->validate([
            'loginusername' => 'required',
            'loginpassword' => 'required',
        ]);

        if (auth()->attempt(['username' => $incomingFields['loginusername'], 'password' => $incomingFields['loginpassword']])) {
            $request->session()->regenerate();
            // event(new OurExampleEvent(['username' => auth()->user()->username, 'action' => 'login']));
            return redirect()->intended();
        } else {
            return redirect('/')->with('error', 'invalid username or password');
            // throw ValidationException::withMessages([
            //     'loginusername' => 'Athentication failed'
            // ]);
        }
        // return redirect()->route('/listing')->with('success', 'Listing was created!');
    }


    // REGISTER

    public function register()
    {
        return inertia('Auth/Register');
    }

    public function registerStore(Request $request)
    {

        $incomingFields = $request->validate([
            'username' => ['required', 'min:3', 'max:20', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'phone' => ['required', 'max:10', Rule::unique('users', 'phone')],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);
        auth()->login($user);
        return redirect()->intended()->with('success', 'Account was created!');

        // User::create(
        //     $request->validate(
        //         [
        //             'username' => ['required', 'min:3', 'max:20', Rule::unique('users', 'username')],
        //             'email' => ['required', 'email', Rule::unique('users', 'email')],
        //             'password' => ['required', 'min:8', 'confirmed'],
        //         ]
        //     )
        // );
    }



    //profile
    public function profile(Request $request)
    {
        return inertia('Auth/Profile', ['user' => $request->user()]);
    }

    public function update(Request $request, User $user)
    {
        // if (Auth::user()->cannot('edit', $listing)) {
        //     abort(403);
        // }

        $user = $request->user(); // Get the authenticated user

        $incomingFields = $request->validate([
            'username' => ['required', 'min:3', 'max:20', Rule::unique('users', 'username')->ignore($user)],
            'email' => ['required', 'email', Rule::unique('users', 'email')->ignore($user)],
            'phone' => ['required', 'max:10', Rule::unique('users', 'phone')->ignore($user)],
            'income' => ['required', 'min:2'],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);

        $incomingFields['username'] = strip_tags($incomingFields['username']);
        $incomingFields['email'] = strip_tags($incomingFields['email']);
        $incomingFields['phone'] = strip_tags($incomingFields['phone']);
        $incomingFields['password'] = strip_tags($incomingFields['password']);

        $user->update($incomingFields);

        return redirect()->route('profile')->with('success', 'profile was updated!');
    }


    public function storeAvatar(Request $request)
    {
        $request->validate([
            'avatar' => 'required|image|max:3000'
        ]);

        $user = auth()->user();

        $filename = $user->username . '-' . uniqid() . '.jpg';

        $imgData = Image::make($request->file('avatar'))->fit(240)->encode('jpg');
        Storage::put('public/avatar/' . $filename, $imgData);

        $oldAvatar = $user->avatar;

        $user->avatar = $filename;
        $user->save();

        if ($oldAvatar != $user->avatar) {
            Storage::delete(str_replace("/storage/", "public/", $oldAvatar));
        }

        return back()->with('success', 'Avatar uploaded successfully');
    }



    //logout
    public function logout(Request $request)
    {
        auth()->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login')->with('success', 'You have been logged out!');
    }
}
