<?php

use App\Models\Album;
use App\Models\File;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();

            $table->foreignIdFor(File::class, 'file_id');

            $table->foreign('file_id')
                ->references('id')
                ->on('files');

            $table->foreignIdFor(Album::class, 'album_id');

            $table->foreign('album_id')
                ->references('id')
                ->on('albums');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('images');
    }
}
