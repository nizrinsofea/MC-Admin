<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCoProposalStatus extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('co_proposal_status', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('proposal_id')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('co_proposal_status');
    }
}
