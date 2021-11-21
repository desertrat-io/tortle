<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class FixForeignKeysAccountsUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropColumns('accounts', 'user_id');
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedInteger('account_id')->nullable();
            $table->foreign(['account_id'])->references('id')->on('accounts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropColumns('users', 'account_id');
        Schema::table('accounts', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->nullable();
            $table->foreign(['user_id'])->references('id')->on('accounts');
        });
    }
}
