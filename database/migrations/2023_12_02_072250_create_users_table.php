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
        Schema::create('users', function (Blueprint $table) {
            $table->id('users_id');
            $table->string('users_username', 50)->unique();
            $table->string('users_password', 50);
            $table->string('users_fullname', 100);
            $table->string('users_email', 50)->unique();
            $table->char('users_nohp', 13);
            $table->char('users_alamat', 200);
            $table->string('users_profil', 255)->nullable(true);
            $table->enum('users_level', ['Admin', 'Pengguna'])->default('Pengguna');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
