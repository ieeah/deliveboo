<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Type;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    
    /**
 * Show the application registration form.
 *
 * @return \Illuminate\Http\Response
 */
    public function showRegistrationForm()
   {
    $types = Type::all();
    return view('auth.register', compact('types'));
   }

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::DASH ;

    /**
     * Create a new controller instance.
     *
     * @return void
     */


    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data) {
        return Validator::make(
            $data,
            [
                'name' => ['required', 'string', 'min:2', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:8', 'max:25', 'confirmed'],
                'address' => ['required', 'max:255', 'min:5'],
                'vat_number' => ['required', 'string', 'size:11']
            ], [
                'required' => 'Il campo non può essere vuoto',
                'min' => 'Il campo non può avere meno di :min caratteri',
                'max' => 'Il campo non può avere più di :max caratteri',
                'email.unique' => 'Esiste già un utente registrato con questa mail',
                'vat_number.size' => 'La partita Iva deve avere esattamente 11 caratteri',
                'email.email' => 'Non è stata inserita una mail valida'
            ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'slug' => $this->createSlug($data['name']),
            'address' => $data['address'],
            'vat_number' => $data['vat_number'],
        ]);
        $user->types()->attach($data['types']);

        return $user;
    }

    protected function createSlug($name) {

        $new_slug = Str::slug($name, '-');
        $old_slug = $new_slug;
        $count = 1;

        while (User::where('slug', $new_slug)->first()) {
            $new_slug = $old_slug . '-' . $count;
            $count++;
        }

        return $new_slug;
    }
}
