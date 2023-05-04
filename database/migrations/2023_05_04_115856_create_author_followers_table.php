<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAuthorFollowersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('author_followers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('author_id');
            $table->unsignedBigInteger('reader_id');
            $table->tinyInteger('rating');
            $table->timestamps();

            $table->unique(['author_id', 'reader_id']);

            $table->foreign('author_id')
                ->references('id')
                ->on('authors')
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
        Schema::dropIfExists('author_followers');
    }
}
