<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $posts = Post::paginate(5);

        $posts = Post::paginate(5);
        $tags = Tag::paginate(5);

        foreach ($posts as $post) {
            foreach ($tags as $tag) {
                PostTag::firstOrCreate([
                    'post_id' => $post->id,
                    'tag_id' => $tag->id,
                ]);
            }
        }

    }
}
