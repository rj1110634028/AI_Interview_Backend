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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string("name", 20);
            $table->char("sex", 1)->nullable();
            $table->string("email", 100)->unique();
            $table->string("password", 100);
            $table->string("address", 100)->nullable();
            $table->date("birthday")->nullable();
            $table->string("highest_education", 5)->nullable();
            $table->string("employment_status", 5)->nullable();
            $table->string("seniority",10)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
