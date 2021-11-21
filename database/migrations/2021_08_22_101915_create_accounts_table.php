<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // account meta data
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->boolean('verified')->default(false);
            $table->boolean('locked')->default(false);
            $table->boolean('mfa_enabled')->default(false);
            $table->string('created_city');
            $table->string('created_country', 2);
            $table->string('created_lang', 2);
            $table->string('created_ip', 45); // to handle ipv4 up to ipv6
            $table->string('last_accessed_ip', 45);
            $table->smallInteger('timezone')->comment('relative to gtc');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign(['user_id'])->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
