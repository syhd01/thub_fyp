<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Admin::create([
            //'id'=>'1',
            'username'=>'admin',
            'name'=>'Admin',
            'phone'=>'012345678',
            'address' => "Kota Tinggi",
            'email'=>'admin@gmail.com',
            'password'=>Hash::make('12345'),
            'role'=>'admin',
            'acc_status'=>'active'
        ]);

        /*
         $table->id(); 
            $table->string('username')->unique()->nullable();
            $table->string('name',50);
            $table->string('phone', 12)->nullable();
            $table->string('address', 255)->nullable();
            $table->string('email', 30)->unique(); //->comment('User email');
            $table->string('password', 255); //->comment('Password of user account');
            $table->enum('role', ['customer', 'admin','staff'])->default('admin');
            $table->enum('acc_status', ['Active', 'Inactive'])->default('Active'); //->comment('Active status');
            $table->string('picture')->nullable(); //->comment('Profile picture');
            //$table->timestamps('email_verified')->nullable;
            $table->timestamps();
        */
    }
}
