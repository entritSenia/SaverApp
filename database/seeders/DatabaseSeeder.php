<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Listing;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        // \App\Models\User::factory(2)->create();

        //user
        DB::table('users')->insert([
            // 'id' => 100,
            'username' => 'tester',
            'email' => 'tester@tester',
            'phone' => '6993965412',
            'income' => 2_000,
            'password' => Hash::make('tester123'),
            'is_admin' => true,
        ]);

        DB::table('users')->insert([
            // 'id' => 100,
            'username' => 'jake',
            'email' => 'jake@jake',
            'phone' => '6995377881',
            'income' => 4_000,
            'password' => Hash::make('password123'),
            'is_admin' => false,
        ]);

        DB::table('users')->insert([
            // 'id' => 100,
            'username' => 'peter',
            'email' => 'peter@peter',
            'phone' => '6923945492',
            'income' => 3_000,
            'password' => Hash::make('peter123'),
        ]);


        //listing
        DB::table('listings')->insert([
            'need' => 'electricity',
            'type' => true,
            'for' => 0,
            'status' => true,
            'price' => 100,
            'by_user_id' => 1
        ]);
        DB::table('listings')->insert([
            'need' => 'water',
            'type' => true,
            'for' => 0,
            'status' => false,
            'price' => 50,
            'by_user_id' => 1
        ]);
        DB::table('listings')->insert([
            'need' => 'rent',
            'type' => true,
            'for' => 0,
            'status' => true,
            'price' => 600,
            'by_user_id' => 1
        ]);
        DB::table('listings')->insert([
            'need' => 'gasoline',
            'type' => true,
            'for' => 1,
            'status' => true,
            'price' => 200,
            'by_user_id' => 1
        ]);
        DB::table('listings')->insert([
            'need' => 'mechanic',
            'type' => true,
            'for' => 1,
            'status' => true,
            'price' => 150,
            'by_user_id' => 1
        ]);

        // Listing::factory(10)->create(['by_user_id' => 1]);

        // Listing::factory(10)->create(['by_user_id' => 2]);
    }
}
