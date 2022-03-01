<?php

namespace App\Http\Controllers\Restaurants;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

use Illuminate\Http\Request;
use App\User;

class HomeController extends Controller
{
    public function edit_profile() {
        $user = Auth::user();
        return view('restaurants.public', compact('user'));
    }

    public function update_profile(Request $request) {
        // $request->old_password = Hash::make($request->old_password);
        $request->validate($this->validateRules(), $this->validateMessages());
        $data = $request->all();

        // $user = Auth::where('id', Auth::user()->id);
        $user = User::find(Auth::user()->id);

        if(array_key_exists('thumb', $data)) {
            if ($user->thumb) {
                Storage::delete($user->thumb);
            }
            $data['thumb'] = Storage::put('users_thumbs', $data['thumb']);
        }

        $data['password'] = Hash::make($data['password']);
        dump($data['password']);
        dump($data);
        $user->update($data);
    }

    protected function validateRules() {
        return [
            'thumb' => 'image|mimes:jpg,png|size:2000',
            'address' => 'max:255|min:5|nullable',
            'password' => 'string|min:8|max:255|nullable',
            'old_password' => 'string|min:8|max:255|required|password',
        ];
    }

    protected function validateMessages() {
        return [
            'image' => 'Il file inviato non è un\'immagine',
            'mimes' => 'Il file inviato non è del formato corretto',
            'size' => 'Il file inviato è troppo grande',
            'max' => 'Massimo :max caratteri',
            'min' => 'Minimo :min caratteri',
            'password' => 'La password inserita non è corretta',
        ];
    }
}
