<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToExpensesTable extends Migration
{
    public function up()
    {
        Schema::table('expenses', function (Blueprint $table) {
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id', 'category_fk_7139385')->references('id')->on('expense_categories');
            $table->unsignedBigInteger('account_id')->nullable();
            $table->foreign('account_id', 'account_fk_7139466')->references('id')->on('accounts');
        });
    }
}
