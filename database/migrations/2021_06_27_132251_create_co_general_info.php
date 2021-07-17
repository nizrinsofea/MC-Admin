<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoGeneralInfo extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('co_general_info', function (Blueprint $table) {
            $table->id('proposal_id')->unsigned();
            $table->string('title');
            $table->string('code')->unique();
            $table->integer('creditvalue')->default(0);
            $table->integer('mqflevel')->default(0);
            $table->string('affectedbatch')->nullable();
            $table->integer('kulliyyah')->nullable();
            $table->integer('department')->nullable();
            $table->longText('synopsis')->nullable();
            $table->string('classification')->nullable();
            $table->string('prerequisite')->nullable();
            $table->longText('reqreference')->nullable();
            $table->longText('recreference')->nullable();
            $table->string('created_by');
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
        Schema::dropIfExists('co_general_info');
    }
}
