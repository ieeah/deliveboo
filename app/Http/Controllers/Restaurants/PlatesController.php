<?php

namespace App\Http\Controllers\Restaurants;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Plate;

class PlatesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $plates = Plate::where('user_id', Auth::User()->id)->orderBy('name')->paginate(5);
        return view('restaurants.plates.index', compact('plates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('restaurants.plates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request) {

        $request->price = intval($request->price);
        $request->validate($this->validateRules(), $this->validateMessages());

        $new_plate = new Plate();
        $data = $request->all();
        $data['slug'] = $this->createSlug($data['name']);

        if(array_key_exists('thumb', $data)) {
            $data['thumb'] = Storage::put('plates_thumbs', $data['thumb']);
        }

        if (!array_key_exists('thumb', $data)) {
            $data['thumb'] = 'plates_thumbs/food_placeholder.jpg';
        }

        $new_plate->user_id = Auth::user()->id;
        $new_plate->fill($data);

        if ($new_plate->visibility) {
            $new_plate->visibility = true;
        }

        $new_plate->save();

        return redirect()->route('restaurants.plates.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug) {
        $plate = Plate::where('slug', $slug)->first();

        if($plate->user_id == Auth::user()->id){
            return view('restaurants.plates.show', compact('plate'));
            dump($plate);
        } else {
            return view('restaurants.plates.denied');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id) {

        $plate = Plate::find($id);

        if(! $plate){
            abort(404);
        }
        
        if($plate->user_id == Auth::user()->id){
            return view('restaurants.plates.edit', compact('plate'));
        } else {
            return view('restaurants.plates.denied');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id) {
        $request->price = intval($request->price);
        $request->validate($this->validateRules(), $this->validateMessages());

        $data = $request->all();
        $data['slug'] = $this->createSlug($data['name']);

        $plate = Plate::find($id);

        if(array_key_exists('thumb', $data)){
            if($plate->thumb){
                Storage::delete($plate->thumb);
            }
            $data['thumb'] = Storage::put('plates_thumbs', $data['thumb']);
        }

        if (!array_key_exists('thumb', $data)) {
            if(!$plate->thumb){
                $data['thumb'] = 'plates_thumbs/food_placeholder.jpg';
            }
        }

        
        
        if(array_key_exists('visibility', $data)) {
            $data['visibility'] = true;
        } else {
            $data['visibility'] = false;
        }
        $plate->update($data);
        

        return redirect()->route('restaurants.plates.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
        $plate = Plate::find($id);
        
        Storage::delete($plate->thumb);
        $plate->delete();
        return redirect()->route('restaurants.plates.index')->with('deleted', $plate->name);
    }

    protected function createSlug($title) {

        $new_slug = Str::slug($title, '-');
        $old_slug = $new_slug;
        $count = 1;

        while (Plate::where('slug', $new_slug)->first()) {
            $new_slug = $old_slug . '-' . $count;
            $count++;
        }

        return $new_slug;
    }

    protected function validateRules() {
        return [
            'name' => 'required|min:2|max:255',
            'description' => 'max:1000',
            'ingredients' => 'required|max:1000',
            'price' => 'required|numeric',
            'thumb' => 'image|mimes:jpg,png|max:2000',
        ];
    }

    protected function validateMessages() {
        return [

            'required' => 'Non lasciare vuoto il campo',
            'min' => 'Minimo :min caratteri',
            'max' => 'Massimo :max caratteri',
            'mimes' => 'il file inserito non ?? del formato corretto',
            'numeric' => 'il valore inserito non ?? un numero',
            'image' => "il file non ?? un' immagine",
            'mimes' => 'il formato non ?? corretto',
            'thumb.max' => 'La dimensione massima per la foto ?? di 2MB',

        ];

    }
}
