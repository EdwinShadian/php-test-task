<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('tenders', function (Blueprint $table) {
            $table->id();
            $table->string('external_code');
            $table->string('number');
            $table->string('status');
            $table->string('name');
            $table->dateTime('update_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('tenders');
    }
};
