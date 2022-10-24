<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImportsTable extends Migration
{
    public function up()
    {
        Schema::create('imports', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('code');
            $table->string('level1');
            $table->string('level2');
            $table->string('level3');
            $table->string('price');
            $table->string('priceSP');
            $table->string('quantity');
            $table->text('property_fields');
            $table->string('joint_purchases');
            $table->string('unit_of_measurement');
            $table->string('picture');
            $table->string('show_on_main');
            $table->text('description');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('imports');
    }
}
