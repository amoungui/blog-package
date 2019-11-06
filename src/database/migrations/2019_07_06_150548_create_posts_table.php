<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title', 80);
            $table->string('slug');
            $table->text('content');
            $table->boolean('publication');            
            $table->integer('user_id')->unsigned();
            $table->timestamps();
            $table->foreign('user_id')
                      ->references('id')
                      ->on('users')
                      ->onDelete('restrict')
                      ->onUpdate('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::table('posts', function(Blueprint $table) {
                $table->dropForeign('posts_user_id_foreign');
        });
        Schema::drop('posts');
    }
}
