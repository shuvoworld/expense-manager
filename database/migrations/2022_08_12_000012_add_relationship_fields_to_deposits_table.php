<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDepositsTable extends Migration
{
    public function up()
    {
        Schema::table('deposits', function (Blueprint $table) {
            $table->unsignedBigInteger('depositor_id')->nullable();
            $table->foreign('depositor_id', 'depositor_fk_7139378')->references('id')->on('depositors');
            $table->unsignedBigInteger('account_id')->nullable();
            $table->foreign('account_id', 'account_fk_7139465')->references('id')->on('accounts');
        });
    }
}
