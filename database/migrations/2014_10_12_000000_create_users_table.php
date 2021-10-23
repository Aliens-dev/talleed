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
            $table->id('id');
            $table->string('fname');
            $table->string('lname');
            $table->string('username')->unique();
            $table->string('speciality')->default('باحث');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('about_me')->default("");
            $table->string('user_image')->nullable();
            $table->string('social_media_account')->default("");
            $table->string('user_status')->default("pending");
            $table->string('api_token', 80)->unique()->nullable()->default(null);
            $table->timestamp('email_verified_at')->nullable();
            $table->unsignedBigInteger('field_id')->default("");
            $table->unsignedBigInteger('status_id')->default("");
            $table->unsignedBigInteger('role_id');
            $table->softDeletes();
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
