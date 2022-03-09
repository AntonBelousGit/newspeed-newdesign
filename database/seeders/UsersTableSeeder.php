<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        DB::table('role_user')->truncate();
        $adminRole = Role::where('name', 'admin')->first();
        $userRole = Role::where('name', 'user')->first();
        $admin = User::create([
            'name' => 'admin',
            'email'=> 'admin@admin.com',
            'password' => Hash::make('123'),

        ]);
        $user = User::create([
            'name' => 'guest',
            'email'=> 'guest@user.com',
            'password' => Hash::make('password'),

        ]);
        $user1 = User::create([
            'name' => 'user1',
            'email'=> 'user1@user.com',
            'password' => Hash::make('password'),

        ]);
        $user2 = User::create([
            'name' => 'user2',
            'email'=> 'user2@user.com',
            'password' => Hash::make('password'),

        ]);
        $user3 = User::create([
            'name' => 'user3',
            'email'=> 'user3@user.com',
            'password' => Hash::make('password'),

        ]);
        $user4 = User::create([
            'name' => 'user4',
            'email'=> 'user4@user.com',
            'password' => Hash::make('password'),

        ]);
        $user5 = User::create([
            'name' => 'user5',
            'email'=> 'user5@user.com',
            'password' => Hash::make('password'),

        ]);
        $user6 = User::create([
            'name' => 'user6',
            'email'=> 'user6@user.com',
            'password' => Hash::make('password'),

        ]);
        $user7 = User::create([
            'name' => 'user7',
            'email'=> 'user7@user.com',
            'password' => Hash::make('password'),

        ]);
        $user8 = User::create([
            'name' => 'user8',
            'email'=> 'user8@user.com',
            'password' => Hash::make('password'),

        ]);
        $user9 = User::create([
            'name' => 'user9',
            'email'=> 'user9@user.com',
            'password' => Hash::make('password'),

        ]);
        $user10 = User::create([
            'name' => 'user10',
            'email'=> 'user10@user.com',
            'password' => Hash::make('password'),

        ]);
        $user11 = User::create([
            'name' => 'user11',
            'email'=> 'user11@user.com',
            'password' => Hash::make('password'),

        ]);
        $user12 = User::create([
            'name' => 'user12',
            'email'=> 'user12@user.com',
            'password' => Hash::make('password'),

        ]);
        $user13 = User::create([
            'name' => 'user13',
            'email'=> 'user13@user.com',
            'password' => Hash::make('password'),

        ]);
        $user14 = User::create([
            'name' => 'user14',
            'email'=> 'user14@user.com',
            'password' => Hash::make('password'),

        ]);
        $user15 = User::create([
            'name' => 'user15',
            'email'=> 'user15@user.com',
            'password' => Hash::make('password'),

        ]);
        $user16 = User::create([
            'name' => 'user16',
            'email'=> 'user16@user.com',
            'password' => Hash::make('password'),

        ]);
        $user17 = User::create([
            'name' => 'user17',
            'email'=> 'user17@user.com',
            'password' => Hash::make('password'),

        ]);
        $user18 = User::create([
            'name' => 'user18',
            'email'=> 'user18@user.com',
            'password' => Hash::make('password'),

        ]);
        $user19 = User::create([
            'name' => 'user19',
            'email'=> 'user19@user.com',
            'password' => Hash::make('password'),

        ]);
        $user20 = User::create([
            'name' => 'user20',
            'email'=> 'user20@user.com',
            'password' => Hash::make('password'),

        ]);
        $user21 = User::create([
            'name' => 'user21',
            'email'=> 'user21@user.com',
            'password' => Hash::make('password'),

        ]);
        $user22 = User::create([
            'name' => 'user22',
            'email'=> 'user22@user.com',
            'password' => Hash::make('password'),

        ]);
        $user23 = User::create([
            'name' => 'user23',
            'email'=> 'user23@user.com',
            'password' => Hash::make('password'),

        ]);
        $user24 = User::create([
            'name' => 'user24',
            'email'=> 'user24@user.com',
            'password' => Hash::make('password'),

        ]);
        $user25 = User::create([
            'name' => 'user25',
            'email'=> 'user25@user.com',
            'password' => Hash::make('password'),

        ]);
        $user26 = User::create([
            'name' => 'user26',
            'email'=> 'user26@user.com',
            'password' => Hash::make('password'),

        ]);
        $user27 = User::create([
            'name' => 'user27',
            'email'=> 'user27@user.com',
            'password' => Hash::make('password'),

        ]);
        $user28 = User::create([
            'name' => 'user28',
            'email'=> 'user28@user.com',
            'password' => Hash::make('password'),

        ]);
        $user29 = User::create([
            'name' => 'user29',
            'email'=> 'user29@user.com',
            'password' => Hash::make('password'),

        ]);
        $user30 = User::create([
            'name' => 'user30',
            'email'=> 'user30@user.com',
            'password' => Hash::make('password'),

        ]);
        $admin->roles()->attach($adminRole);
        $user->roles()->attach($userRole);
        $user1->roles()->attach($userRole);
        $user2->roles()->attach($userRole);
        $user3->roles()->attach($userRole);
        $user4->roles()->attach($userRole);
        $user5->roles()->attach($userRole);
        $user6->roles()->attach($userRole);
        $user7->roles()->attach($userRole);
        $user8->roles()->attach($userRole);
        $user9->roles()->attach($userRole);
        $user10->roles()->attach($userRole);
        $user11->roles()->attach($userRole);
        $user12->roles()->attach($userRole);
        $user13->roles()->attach($userRole);
        $user14->roles()->attach($userRole);
        $user15->roles()->attach($userRole);
        $user16->roles()->attach($userRole);
        $user17->roles()->attach($userRole);
        $user18->roles()->attach($userRole);
        $user19->roles()->attach($userRole);
        $user20->roles()->attach($userRole);
        $user21->roles()->attach($userRole);
        $user22->roles()->attach($userRole);
        $user23->roles()->attach($userRole);
        $user24->roles()->attach($userRole);
        $user25->roles()->attach($userRole);
        $user26->roles()->attach($userRole);
        $user27->roles()->attach($userRole);
        $user28->roles()->attach($userRole);
        $user29->roles()->attach($userRole);
        $user30->roles()->attach($userRole);
    }
}
