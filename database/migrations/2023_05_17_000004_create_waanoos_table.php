<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWaanoosTable extends Migration
{
    public function up()
    {
        Schema::create('waanoos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('island');
            $table->integer('no');
            $table->string('village');
            $table->string('recipient');
            $table->string('status');
            $table->decimal('expenditure_per_trip', 15, 2);
            $table->integer('hire_num');
            $table->string('catch_weight');
            $table->decimal('total_catchval', 15, 2);
            $table->string('comments');
            $table->longText('remarks');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
