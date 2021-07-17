<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoAssessmentAlignment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('co_assessment_alignment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('proposal_id')->nullable();
            $table->string('outcome_id')->nullable();
            $table->string('tl_method')->nullable();
            $table->string('as_method')->nullable();
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
        Schema::dropIfExists('co_assessment_alignment');
    }
}
