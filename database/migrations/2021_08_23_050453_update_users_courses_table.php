<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersCoursesTable extends Migration
{
    public function up()
    {
        Schema::table('users_courses', function (Blueprint $table) {
            $table->renameColumn('id_user', 'user_id');
            $table->renameColumn('id_course', 'course_id');
        });
    }

    public function down()
    {
        Schema::table('users_courses', function (Blueprint $table) {
            $table->renameColumn('user_id', 'id_user ');
            $table->renameColumn('course_id', 'id_course');
        });
    }
}
