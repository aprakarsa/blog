<?php

namespace App;

use Carbon\Carbon;

class Post extends Model
{


    public function comments() {
    	// return $this->hasMany('App\Comment');
    	return $this->hasMany(Comment::class); 
    }


    public function addComment($body, $user_id) {
        Comment::create([
            'body' => $body,
            'user_id' => $user_id,
            'post_id' => $this->id
        ]);
    	
        // Comment::create([
    	// 	'body' => $body,
    	// 	'post_id' => $this->id
    	// ]);

    	// $this->comments()->create(compact('body'));

    }


    public function user() {    // $post->user->name || $comment->post->user
        return $this->belongsTo(User::class);
    }


    public function scopeFilter($query, $filters) {
        if($month = $filters['month']) {
            $query->whereMonth('created_at', Carbon::parse($month)->month);
        }

        if($year = $filters['year']) {
            $query->whereYear('created_at', $year);
        }
    }


    public static function archive() {
        return static::SelectRaw('year(`created_at`) year,monthname(`created_at`) month,count(*) published')
            ->groupBy('year','month')
            ->orderByRaw('min(created_at) desc')
            ->get()
            ->toArray();
    }

}
