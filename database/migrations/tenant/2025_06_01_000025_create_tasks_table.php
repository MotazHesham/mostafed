<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTasksTable extends Migration
{
    public function up()
    {
        Schema::create('tasks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->longText('short_description')->nullable();
            $table->longText('description')->nullable();
            $table->date('due_date')->nullable();
            $table->integer('ordering')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
