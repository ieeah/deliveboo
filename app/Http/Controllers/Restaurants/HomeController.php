<?php

namespace App\Http\Controllers\Restaurants;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProfile;

use App\User;
use App\Type;

class HomeController extends Controller
{
    public function edit() {
        $user = Auth::user();
        $types = Type::all();
        return view('restaurants.public', compact('user', 'types'));
    }

    public function update(Request $request) {
        $request->validate($this->validateRules(), $this->validateMessages());
        $data = $request->all();
        $user = User::find(Auth::user()->id);
        
        if (array_key_exists('thumb', $data)) {
            
            if ($user->thumb) {
                Storage::delete($user->thumb);
            }
            
            $data['thumb'] = Storage::put('users_thumbs', $data['thumb']);
        }

        if (array_key_exists('types', $data)) {
            $user->types()->sync($data['types']);
        } else {
            // il metodo detach senza parametri elimina tutte le relazioni dalla tabella pivot
            $user->types()->detach();
        }

        if(!$data['address']) {
            $data['address'] = $user->address;
            dump($data['address']);
        }

        if (!$data['password']) {
            $data['password'] = $user->password;
        } else {
            $data['password'] = Hash::make($data['password']);
        }

        
        // $data['old_password'] = Hash::make($data['old_password']);
        
        if(Hash::check($data['old_password'], $user->password)) {
            $user->update($data);
            return 'salvato';
        }
        
        dump('password DB', $user->password);
        dump('password inserita', $data['old_password']);
        return 'non salvato';
        // TODO - elaborare old_password, se è uguale a user->password allora salvare, sennò tornare a pagina edit con errori

        // $data = $request->all();
        // $user = User::find(Auth::user()->id);
        // dump($data);
        // dump($user);
        // if(array_key_exists('thumb', $data)) {
        //     if ($user->thumb) {
        //         Storage::delete($user->thumb);
        //     }
        //     $data['thumb'] = Storage::put('users_thumbs', $data['thumb']);
        // } else {
        //     $data['thumb'] = $user->thumb;
        // }

        // if($data['address'] === null) {
        //     $data['address'] = $user->address;
        // }

        // if ($data['password'] === null || $data['password'] === '') {
        //     $data['password'] === $user->password;
        // }

        // dd($data);
        // $user->update($data);
        // return '<a href="/restaurants/profile">edita</a>';
    }

    

    protected function validateRules() {
        return [
            'thumb' => 'image|mimes:jpg,png|max:2000',
            'address' => 'max:255|min:5|nullable',
            'password' => 'string|min:8|max:255|nullable',
            'old_password' => 'string|min:8|max:255',
        ];
    }

    protected function validateMessages() {
        return [
            'image' => 'Il file inviato non è un\'immagine',
            'mimes' => 'Il file inviato non è del formato corretto',
            'size' => 'Il file inviato è troppo grande',
            'thumb.max' => 'La dimensione del file è troppo grande, Massimo 2MB',
            'max' => 'Massimo :max caratteri',
            'min' => 'Minimo :min caratteri',
            // 'old_password.password' => 'La password inserita non è corretta',
        ];
    }
}
