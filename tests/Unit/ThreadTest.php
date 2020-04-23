<?php

namespace Tests\Unit;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ThreadTest extends TestCase
{
    use RefreshDatabase;

    protected $thread;

    /** @test */
    public function a_thread_has_a_creator()
    {
        $thread = create(\App\Thread::class);

        $this->assertInstanceOf('App\User', $thread->creator);
    }

    /** @test */
    public function a_thread_has_replies()
    {
        $thread = create(\App\Thread::class);

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $thread->replies);
    }

    /** @test */
    public function a_thread_can_add_a_reply()
    {
        $thread = create(\App\Thread::class);

        $thread->addReply([
            'body' => 'Foobar',
            'user_id' => 1
        ]);

        $this->assertCount(1, $thread->replies);
    }

    /** @test */
    public function a_thread_belongs_to_a_channel()
    {
        $thread = create(\App\Thread::class);

        $this->assertInstanceOf('App\Channel', $thread->channel);
    }
}
