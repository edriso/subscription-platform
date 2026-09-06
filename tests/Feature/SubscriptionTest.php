<?php

namespace Tests\Feature;

use App\Models\Website;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class SubscriptionTest extends TestCase
{
    use RefreshDatabase;

    public function test_subscribe_then_send_new_post_once(): void
    {
        $website = Website::factory()->create();
        $this->postJson("/api/websites/{$website->id}/subscribe", ['email' => 'reader@example.com'])->assertOk();
        $this->assertCount(1, $website->subscribers);
        $this->postJson("/api/websites/{$website->id}/subscribe", ['email' => 'reader@example.com'])->assertStatus(422);
        $post = $website->posts()->create(['title' => 'New post', 'description' => 'Post body']);
        Mail::shouldReceive('raw')->once()->with('Post body', \Mockery::on(function ($callback) {
            $message = \Mockery::mock(\Illuminate\Mail\Message::class);
            $message->shouldReceive('to')->once()->with('reader@example.com')->andReturnSelf();
            $message->shouldReceive('subject')->once()->with('New post')->andReturnSelf();
            $callback($message);
            return true;
        }));
        $this->artisan('posts:send-emails')->assertSuccessful();
        $this->assertNotNull($post->fresh()->email_sent_at);
        $this->artisan('posts:send-emails')->assertSuccessful();
    }

    public function test_subscription_rejects_injected_email_headers(): void
    {
        $website = Website::factory()->create();
        $this->postJson("/api/websites/{$website->id}/subscribe", ['email' => "reader@example.com\r\nBcc: other@example.com"])->assertStatus(422);
        $this->assertDatabaseCount('subscribers', 0);
    }
}
