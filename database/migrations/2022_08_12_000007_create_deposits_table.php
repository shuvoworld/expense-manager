<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDepositsTable extends Migration
{
    public function up()
    {
        Schema::create('deposits', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->decimal('amount', 15, 2);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
