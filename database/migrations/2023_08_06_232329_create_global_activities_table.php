<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('global_activities', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->text('description');
            $table->string('image');
            $table->date('date');

            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('global_activities');
    }
};
