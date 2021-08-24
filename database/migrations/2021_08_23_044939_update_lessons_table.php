<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateLessonsTable extends Migration
{
    public function up()
    {
        Schema::table('lessons', function (Blueprint $table) {
            $table->text('desc')->change();
            $table->renameColumn('id_course', 'course_id');
        });
    }

    public function down()
    {
        Schema::table('lessons', function (Blueprint $table) {
            $table->string('desc')->change();
            $table->renameColumn('course_id', 'id_course');
        });
    }
}
