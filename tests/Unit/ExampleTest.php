<?php

namespace Tests\Unit;

// use PHPUnit\Framework\TestCase;

use Tests\TestCase;

use App\Post;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{

	use DatabaseTransactions;

    /**
     * A basic test example.
     *
     * @return void
     */
    public function testBasicTest()
    {
    	$first = factory(Post::class)->create();

    	$second = factory(Post::class)->create([
    		'created_at' => \Carbon\Carbon::now()->subMonth()
    	]);

        $posts = Post::archive();

        // dd($posts);

        $this->assertEquals([
        	[
        		'year' => $first->created_at->format('Y'),
			    'month' => $first->created_at->format('F'),
			    'published' => 1
        	],
        	[
        		'year' => $second->created_at->format('Y'),
			    'month' => $second->created_at->format('F'),
			    'published' => 1
        	]
        ]);
    }
}
