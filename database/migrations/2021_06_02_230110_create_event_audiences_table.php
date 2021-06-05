<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventAudiencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_audiences', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('office_event_id')->unsigned();
            $table->string('name');
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->text('skills')->nullable();
            $table->string('profession')->nullable();
            $table->string('company')->nullable();
            $table->timestamps();

            $table->foreign('office_event_id')
                ->references('id')->on('office_events')
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
        Schema::dropIfExists('event_audiences');
    }
}
