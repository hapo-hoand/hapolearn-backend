<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateLessonsUsersTable extends Migration
{
    public function up()
    {
        Schema::table('lessons_users', function (Blueprint $table) {
            $table->renameColumn('id_user', 'user_id');
            $table->renameColumn('id_lesson', 'lesson_id');
        });
    }

    public function down()
    {
        Schema::table('lessons_users', function (Blueprint $table) {
            $table->renameColumn('user_id', 'id_user');
            $table->renameColumn('lesson_id', 'id_lesson');
        });
    }
}
