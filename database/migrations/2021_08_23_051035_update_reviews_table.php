<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateReviewsTable extends Migration
{
    public function up()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->renameColumn('id_user', 'user_id');
            $table->renameColumn('id_course', 'course_id');
            $table->text('content')->change();
            $table->dropColumn('location_type');
            $table->dropColumn('location_id');
        });
    }

    public function down()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->renameColumn('user_id', 'id_user');
            $table->renameColumn('course_id', 'id_course');
            $table->text('content')->change();
            $table->integer('location_type')->nullable();
            $table->integer('location_id')->nullable();
        });
    }
}
