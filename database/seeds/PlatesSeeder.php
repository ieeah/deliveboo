<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\User;
use App\Plate;

class PlatesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $max = Plate::all()->count();
        $plates = config('plates');
        foreach ($plates as $plate) {
            $new = new Plate();

            $new->name = $plate['name'];
            $new->slug = Str::slug($plate['name'], '-');
            if (array_key_exists('description', $plate)) {
                $new->description = $plate['description'];
            }
            if($plate['thumb'] === '') {
                $new->thumb = 'plates_thumbs/food_placeholder.jpg';
            }
            $new->ingredients = $plate['ingredients'];
            $new->price = rand(5, 25);
            $new->visibility = $plate['visibility'];
            $new->user_id = rand(1, 16);
            $new->save();
        }
    }
}
