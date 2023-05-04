<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePublicationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('author_id');
            $table->string('title');
            $table->string('slug')->unique();
            $table->longText('content');
            $table->enum('type', ['Article', 'News', 'Blog', 'Storie']);
            $table->enum('status', ['Waiting for Review', 'In Review', 'Published', 'Inactive']);
            $table->timestamp('published_date')->nullable();
            $table->timestamps();

            $table->foreign('author_id')
                ->references('id')
                ->on('authors')
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
        Schema::dropIfExists('publications');
    }
}
