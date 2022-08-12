<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateExpensesTable extends Migration
{
    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->decimal('amount', 15, 2);
            $table->string('description');
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
