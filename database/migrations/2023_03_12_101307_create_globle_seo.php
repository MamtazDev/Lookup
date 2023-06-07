<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlobleSeo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('globle_seo', function (Blueprint $table) {
            $table->id();
            $table->text('seo');
            $table->text('status'); 
            $table->text('extra1'); 
            $table->text('extra2'); 
            $table->text('extra3'); 
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
        Schema::dropIfExists('globle_seo');
    }
}
