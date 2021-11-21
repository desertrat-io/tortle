<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->unsignedInteger('id', true);
            $table->string('label');
            $table->string('internal_label');
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('accounts', function (Blueprint $table) {
            $table->unsignedInteger('role_id');
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
        Schema::table('accounts', function (Blueprint $table) {
            if (Schema::hasColumn('accounts', 'role_id')) {
                $table->dropConstrainedForeignId('role_id');
            }
        });
        Schema::dropIfExists('roles');
    }
}
