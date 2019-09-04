<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->uuid('user_id');
            $table->string('title');
            $table->text('details');
            $table->integer('budget');
            $table->smallInteger('cents');
            $table->smallInteger('discount')->nullable();
            $table->timestamp('start_at', 0)->nullable();
            $table->timestamp('end_at', 0)->nullable();
            $table->integer('offer')->nullable();
            $table->text('images')->nullable();
            $table->integer('stock', false, true)->nullable();
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
        Schema::dropIfExists('items');
    }
}
