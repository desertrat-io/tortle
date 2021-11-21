<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeRoleIdNullableOnAccounts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropColumns('accounts', 'role_id');
        Schema::table('accounts', function (Blueprint $table) {
            $table->unsignedInteger('role_id')->nullable();

            $table->foreign(['role_id'])->references('id')->on('roles');
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
        Schema::dropColumns('accounts', 'role_id');
        Schema::table('accounts', function (Blueprint $table) {
            $table->unsignedInteger('role_id');
            $table->foreign(['role_id'])->references('id')->on('roles');
        });
    }
}
