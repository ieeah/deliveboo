<?php

namespace App\Http\Controllers\Restaurants;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Http\Requests\UpdateProfile;
use Carbon\Carbon;
use App\User;
use App\Type;
use App\Order;
use App\Plate;

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
        }

        if (!$data['password']) {
            $data['password'] = $user->password;
        } else {
            $data['password'] = Hash::make($data['password']);
        }

        
        if(Hash::check($data['old_password'], $user->password)) {
            $user->update($data);
            $msg = 'Profilo correttamente modificato';
            return redirect()->route('restaurants.edit_profile')->with('success', $msg);
        }
        $msg = 'Hai inserito una password non corretta';
        return redirect()->route('restaurants.edit_profile')->with('error', $msg);
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

    public function dashboard() {
        $now = Carbon::now();
        $today = $now->toDateString();
        $orders = Order::where('user_id', Auth::user()->id)->get();
        $plates = Plate::where('user_id', Auth::user()->id)->get();
        $user = Auth::user();

        $last_order = Order::where('user_id', $user->id)->orderBy('created_at', 'desc')->first();

        return view('restaurants.dashboard', compact('today', 'orders', 'plates', 'last_order'));
    }
}
