<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string("role_name");
            $table->timestamps();
        });

        DB::table("roles")->insert([
           "role_name"=>"admin"
        ]);
        DB::table("roles")->insert([
            "role_name"=>"petani"
        ]);
        DB::table("roles")->insert([
            "role_name"=>"investor"
        ]);
        DB::table("roles")->insert([
            "role_name"=>"pakar"
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
