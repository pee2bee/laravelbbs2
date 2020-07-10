<?php

use Illuminate\Database\Seeder;
use App\Models\Reply;

class RepliesTableSeeder extends Seeder
{
    public function run()
    {
        $user_ids = \App\Models\User::all()->pluck('id')->toArray();
        $post_ids = \App\Models\Post::all()->pluck('id')->toArray();

        $replies = factory(Reply::class)->times(1000)->make()->each(function ($reply, $index) use ($user_ids,$post_ids) {
           $reply->user_id = $user_ids[array_rand($user_ids)];
           $reply->post_id = $post_ids[array_rand($post_ids)];
        });

        Reply::insert($replies->toArray());

        $replies = factory(Reply::class)->times(1000)->make()->each(function ($reply, $index) use ($user_ids,$post_ids) {
            $reply->user_id = $user_ids[array_rand($user_ids)];
            $reply->post_id = $post_ids[array_rand($post_ids)];
        });

        Reply::insert($replies->toArray());

        $replies = factory(Reply::class)->times(1000)->make()->each(function ($reply, $index) use ($user_ids,$post_ids) {
            $reply->user_id = $user_ids[array_rand($user_ids)];
            $reply->post_id = $post_ids[array_rand($post_ids)];
        });

        Reply::insert($replies->toArray());

        $replies = factory(Reply::class)->times(1000)->make()->each(function ($reply, $index) use ($user_ids,$post_ids) {
            $reply->user_id = $user_ids[array_rand($user_ids)];
            $reply->post_id = $post_ids[array_rand($post_ids)];
        });

        Reply::insert($replies->toArray());

        $replies = factory(Reply::class)->times(1000)->make()->each(function ($reply, $index) use ($user_ids,$post_ids) {
            $reply->user_id = $user_ids[array_rand($user_ids)];
            $reply->post_id = $post_ids[array_rand($post_ids)];
        });

        Reply::insert($replies->toArray());

        $replies = factory(Reply::class)->times(1000)->make()->each(function ($reply, $index) use ($user_ids,$post_ids) {
            $reply->user_id = $user_ids[array_rand($user_ids)];
            $reply->post_id = $post_ids[array_rand($post_ids)];
        });

        Reply::insert($replies->toArray());

        $replies = factory(Reply::class)->times(1000)->make()->each(function ($reply, $index) use ($user_ids,$post_ids) {
            $reply->user_id = $user_ids[array_rand($user_ids)];
            $reply->post_id = $post_ids[array_rand($post_ids)];
        });

        Reply::insert($replies->toArray());

        $replies = factory(Reply::class)->times(1000)->make()->each(function ($reply, $index) use ($user_ids,$post_ids) {
            $reply->user_id = $user_ids[array_rand($user_ids)];
            $reply->post_id = $post_ids[array_rand($post_ids)];
        });

        Reply::insert($replies->toArray());
    }

}

