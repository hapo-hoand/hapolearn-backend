<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCoursesTagsTable extends Migration
{
    public function up()
    {
        Schema::table('courses_tags', function (Blueprint $table) {
            $table->renameColumn('id_course', 'course_id');
            $table->renameColumn('id_tag', 'tag_id');
        });
    }

    public function down()
    {
        Schema::table('courses_tags', function (Blueprint $table) {
            $table->renameColumn('course_id', 'id_course ');
            $table->renameColumn('tag_id', 'id_tag');
        });
    }
}
