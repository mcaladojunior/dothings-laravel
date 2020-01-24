<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Thing;
use App\Lists;
use App\Reminder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	User::create([
    		'name' => 'Murilo Cesar',
	        'email' => 'mcaladojunior@gmail.com',
	        'email_verified_at' => now(),
	        'password' => Hash::make('123456789'), // password
	        'remember_token' => Str::random(10),
    	]);

        factory(User::class, 5)->create();

        $users = User::all();

        foreach ($users as $user) {
            $lists = $user->lists()->saveMany(factory(Lists::class, 5)->make());
            foreach ($lists as $list) {
                $things = $list->things()->saveMany(factory(Thing::class, 5)->make([
                        'user_id' => $user->id
                    ])
                );
                foreach ($things as $thing) {
                    factory(Reminder::class, 1)->create([
                        'user_id' => $user->id,
                        'thing_id' => $thing->id
                    ]);
                    factory(Thing::class, rand(0,4))->create([
                        'user_id' => $user->id,
                        'thing_id' => $thing->id
                    ]);
                }
            }
        }
    }
}
