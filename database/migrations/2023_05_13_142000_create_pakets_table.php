<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pakets', function (Blueprint $table) {
            $table->id();
            $table->integer("durasi");
            $table->string("nama");
            $table->string("keterangan")->nullable();
            $table->integer("harga");
            $table->timestamps();
        });
        DB::table("pakets")->insert([
            "durasi" => 7,
            "nama" => "7 Hari",
            "harga" => 0
        ]);
        DB::table("pakets")->insert([
            "durasi" => 14,
            "nama" => "14 Hari",
            "keterangan" => "PENAWARAN TERBAIK",
            "harga" => 0
        ]);
        DB::table("pakets")->insert([
            "durasi" => 30,
            "nama" => "30 Hari",
            "harga" => 0
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pakets');
    }
};
