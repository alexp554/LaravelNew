<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->bigInteger('user_id')->unsigned()->primary();
            $table->string('wifi_username')->nullable();
            $table->string('wifi_password')->nullable();
            $table->string('wifi_ssid')->nullable();
            $table->enum('gender', ['male', 'female']);
            $table->date('dob')->comment('Date of Birth');
            $table->string('bc')->nullable();
            $table->string('company')->nullable();
            $table->string('city')->nullable();
            $table->string('phone')->nullable();
            $table->string('profession')->nullable();
            $table->longText('expertises')->nullable()->comment('Animator, Programmer, etc');
            $table->longText('expertise_categories')->nullable()->comment('Hipster, Hacker, etc');
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('facebook')->nullable();
            $table->string('github')->nullable();
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('members');
    }
}
