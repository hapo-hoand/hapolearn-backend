<?php

namespace Database\Seeders;

use App\Models\Document;
use App\Models\User;
use Illuminate\Database\Seeder;

class DocumentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Document::factory()->count(200)->create();
        $documents = Document::all();
        User::all()->each(function ($user) use ($documents) {
            for ($i = 0; $i < 5; $i ++) {
                $user->documents()->attach($documents->find(rand(1, 200)));
            }
        });
    }
}
