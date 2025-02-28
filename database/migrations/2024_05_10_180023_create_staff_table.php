<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->id();// General user id and Primary Key
            $table->string('name', 50);
            $table->string('phone', 12)->nullable();
            $table->string('address', 255)->nullable();
            $table->date('birthday')->nullable(); //->comment('Birthdate');
            $table->enum('acc_status', ['Active', 'Inactive'])->default('Active'); //->comment('Active status of account');
            $table->dateTime('register_date'); //->comment('Account register date');
            $table->enum('role', ['customer', 'admin','staff'])->default('staff');
            $table->string('email', 30)->unique(); //->comment('User email');
            $table->string('password', 255); //->comment('User password');
            $table->date('start_date')->comment('Start date');
            $table->date('end_date')->nullable();//->comment('End date');
            $table->string('department', 25)->nullable(); //->comment('Staff department');
            $table->string('picture')->nullable();
            //$table->timestamps('email_verified')->nullable;
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('staff');
    }
};
