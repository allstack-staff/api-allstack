<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationsReviewersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publications_reviewers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('publication_id');
            $table->unsignedBigInteger('reviewer_id');
            $table->timestamps();

            $table->foreign('publication_id')
                ->references('id')
                ->on('publications')
                ->onDelete('cascade');
            $table->foreign('reviewer_id')
                ->references('id')
                ->on('reviewers')
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
        Schema::dropIfExists('publications_reviewers');
    }
}
