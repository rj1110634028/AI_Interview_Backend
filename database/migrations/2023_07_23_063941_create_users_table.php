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
            $table->char("sex", 1);
            $table->string("email", 100)->unique();
            $table->string("password", 100);
            $table->string("address", 100);
            $table->date("birthday");
            $table->string("highest_education", 5);
            $table->string("employment_status", 5);
            $table->string("seniority",10);
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
