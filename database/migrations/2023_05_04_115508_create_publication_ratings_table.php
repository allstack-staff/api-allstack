<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publication_ratings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('publication_id');
            $table->unsignedBigInteger('reader_id');
            $table->tinyInteger('rating');
            $table->timestamps();

            $table->unique(['publication_id', 'reader_id']);

            $table->foreign('publication_id')
                ->references('id')
                ->on('publications')
                ->onDelete('cascade');

            $table->foreign('reader_id')
                ->references('id')
                ->on('readers')
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
        Schema::dropIfExists('publication_ratings');
    }
}
