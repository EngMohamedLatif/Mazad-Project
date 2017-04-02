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
           $table->increments('id');
      $table->string('name');
      $table->string('description');
      $table->boolean('IsOnline')->default;
      $table->float('price', 8, 2);
      $table->text('imagePath');
      $table->integer('highestBidder');
      $table->float('highestPrice', 8, 2);
      
      $table->integer('numberOfBids')->default('0');

      $table->integer('user_id')->unsigned();
      $table->foreign('user_id')->refrences('id')->on('users');
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
       Schema::dropiFExists('items');
      
 
    }}
    
 
