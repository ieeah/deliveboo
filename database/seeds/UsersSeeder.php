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
        // for ($i=0; $i < 10; $i++) { 
        //     $new = new User();

        //     $new->name = 'password' => Hash::make($request->newPassword);
        // }
        $users = config('restaurants');
        foreach ($users as $user) {
            $new = new User();

            $new->name = $user['name'];
            $new->slug = Str::slug($user['name'], '-');
            $new->email = $user['email'];
            $new->password = Hash::make($user['password']);
            $new->address = $user['address'];
            $new->vat_number = $user['vat_number'];
            $new->save();
        }
    }
}
