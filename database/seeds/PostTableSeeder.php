<?php
use App\Post;
use App\Tag;
use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tags = Tag::lists('tag');
        Post::truncate();
        factory(Post::class, 20)->create();
    }
}
