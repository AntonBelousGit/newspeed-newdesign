<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePageViewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('page_views', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->nullable();
            $table->string('token')->nullable();
            $table->string('cookie')->nullable();
            $table->string('user_ip')->nullable();
            $table->string('browser')->nullable();
            $table->json('new_timestamps')->nullable();
            $table->json('registered_timestamps')->nullable();
            $table->integer('counter')->nullable();
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
        Schema::dropIfExists('page_views');
    }
}
