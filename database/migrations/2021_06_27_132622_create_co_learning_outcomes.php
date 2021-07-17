<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoLearningOutcomes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('co_learning_outcomes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('proposal_id')->nullable();
            $table->integer('lo_id')->nullable();
            $table->longText('outcomes');
            $table->integer('bloom_c')->nullable();
            $table->integer('bloom_a')->nullable();
            $table->integer('bloom_p')->nullable();
            $table->string('ki')->nullable();
            $table->string('po')->nullable();
            $table->timestamps();

            $table->foreign('proposal_id')->references('proposal_id')->on('co_general_info')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('co_learning_outcomes');
    }
}
