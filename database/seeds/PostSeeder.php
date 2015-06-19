<?php

use App\Models\Blog\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 0; $i < 20; $i++) {
            $paragraph = rand(1, 7);
            $data = json_decode(file_get_contents("http://www.randomtext.me/api/lorem/p-". $paragraph ."/". rand(3, 20) ."". rand(20, 45)));

            $description = function() use ($data) {
                $desc = explode("</p>", $data->text_out);

                return $desc[0] ."</p>";
            };

            $title = function() use ($data) {
                $text = explode(" ", str_replace(["<p>", "</p>"], "", $data->text_out));
                $wordCount = rand(1, 8);
                $start = rand(1, count($text) - $wordCount);
                $wordCount += $start;

                $title = "";
                while($start < $wordCount)
                {
                    $title .= $text[$start] . " ";
                    $start++;
                }

                while(true) {
                    if ($post = Post::whereTitle($title)->first())
                        $title .= ".";
                    else
                        return $title;
                }

                return $title;
            };

            $post = new Post();
            $post->description = $description();
            $post->content = $data->text_out;
            $post->title = $title();
            $post->generateSlug();
            $post->user_id = 1;
            $post->save();

        }
    }
}
