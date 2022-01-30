<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('user_id')->unique();
            $table->string('password');
            $table->string('name');
            $table->string('date_time')->nullable();
            $table->tinyInteger('rank')->default(0);
            $table->string('introducer_id');
            $table->string('nric')->nullable();
            $table->string('tel')->nullable();
            $table->string('address')->nullable();
            $table->string('select')->default(0);
            $table->string('bank_name')->nullable();
            $table->string('bank_account')->nullable();
            $table->tinyInteger('confirm_id')->default(0);
            $table->string('email')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
