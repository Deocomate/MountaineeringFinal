<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blog', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('heading',255);
            $table->string('heading2',255);
            $table->string('heading_slug',255);
            $table->string('title',255);
            $table->string('thumbnail',255);
            $table->string('locate',255);
            $table->string('author',255);
            $table->longText('content');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog');
    }
};
