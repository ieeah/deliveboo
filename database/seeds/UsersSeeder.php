<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = config('restaurants');
        
        foreach ($users as $user) {
            $new = new User();

            $new->name = $user['name'];
            $new->slug = Str::slug($user['name'], '-');
            $new->email = $user['email'];
            $new->password = Hash::make($user['password']);
            $new->address = $user['address'];
            $new->vat_number = $user['vat_number'];
            if (array_key_exists('thumb', $user)) {
                $new->thumb = $user['thumb'];
            } else {
                $new->thumb = 'users_thumbs/food_placeholder.jpg';
            }
            $new->save();
        }
    }
}
