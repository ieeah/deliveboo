<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Type;

class TypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //RESTAURANT TYPE TABLE SEEDER
        $types = config('types');

        foreach($types as $type){
            $new_type = new Type();
            if(array_key_exists('thumb', $type)) {
                $new_type->thumb = $type['thumb'];
            } else $new_type->thumb = 'users_thumbs/food_placeholder';
            $new_type->name = $type['name'];
            $new_type->slug = Str::slug($type['name'],'-');

            $new_type->save();
        }
    }
}
