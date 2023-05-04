<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publication_comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('publication_id');
            $table->unsignedBigInteger('publication_comment_id');
            $table->unsignedBigInteger('reader_id');
            $table->text('comment');
            $table->timestamps();

            $table->foreign('publication_id')
                ->references('id')
                ->on('publications')
                ->onDelete('cascade');

            $table->foreign('publication_comment_id')
                ->references('id')
                ->on('publication_comments')
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
        Schema::dropIfExists('publication_comments');
    }
}
