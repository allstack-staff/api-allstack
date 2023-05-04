<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publication_tags', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('publication_id');
            $table->unsignedBigInteger('tag_id');
            $table->timestamps();

            $table->foreign('publication_id')
                ->references('id')
                ->on('publications')
                ->onDelete('cascade');
            $table->foreign('tag_id')
                ->references('id')
                ->on('tags')
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
        Schema::dropIfExists('publication_tags');
    }
}
