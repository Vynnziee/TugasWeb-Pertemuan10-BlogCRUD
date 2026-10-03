<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 15; $i++) {
            Post::create([
                'title' => "Post Contoh #{$i}",
                'body'  => "Ini adalah isi body untuk post contoh nomor {$i}. Dibuat otomatis lewat seeder untuk menguji fitur pagination.",
            ]);
        }
    }
}
