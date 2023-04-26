<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('investasis', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("phone");
            $table->unsignedBigInteger("tani_id");
            $table->integer("fund");
            $table->unsignedBigInteger("user_id");
            $table->boolean("confirmed")->nullable();

            $table->timestamps();
            $table->foreign("tani_id")->references("id")->on("tanis");
            $table->foreign("user_id")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('investasis');
    }
};
