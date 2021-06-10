<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProposalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('proposals', function (Blueprint $table) {
            $table->id();
            $table->string('coursecode')->nullable();
            $table->longText('coursetitle')->nullable();
            $table->longText('description')->nullable();
            $table->integer('credithr')->default(0);
            $table->integer('category')->default(0);
            $table->string('file_name')->nullable();
            $table->string('file_path')->nullable();
            $table->string('assessment')->nullable();
            $table->longText('learningoutcomes')->nullable();
            $table->longText('coursejustification')->nullable();
            $table->longText('courseimpact')->nullable();
            $table->string('created_by')->nullable();
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
        Schema::dropIfExists('proposals');
    }
}
