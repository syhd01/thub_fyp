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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            //$table->customer_id();
            //$table->name()->nullable();
            //$table->increments('customer_id');
            $table->string('username')->unique()->nullable();
            $table->string('name', 50)->nullable();
            $table->string('phone', 12)->nullable();
            $table->string('address', 255)->nullable();
            $table->date('birthday')->nullable();
            $table->enum('acc_status', ['Active', 'Inactive'])->default('Active');
            $table->dateTime('register_date');
            $table->enum('role', ['customer', 'admin','staff'])->default('customer');
            $table->string('email',30)->unique();
            $table->string('password', 255);
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
        Schema::dropIfExists('customers');
    }
};
