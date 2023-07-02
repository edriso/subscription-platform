<?php

namespace App\Console\Commands;

use App\Models\Post;
use App\Models\Website;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendPostEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'posts:send-emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send post emails to subscribers';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $newPosts = Post::whereNull('email_sent_at')->get();

        foreach ($newPosts as $post) {
            $subscribers = $post->website->subscribers;

            foreach ($subscribers as $subscriber) {
                $this->sendEmailsToSubscriber($subscriber, $post);
            }

            $post->update(['email_sent_at' => now()]);
        }

        $this->info('Post email sent successfully.');
    }

    private function sendEmailsToSubscriber($subscriber, $post)
    {
        Mail::raw($post->description, function ($message) use ($subscriber, $post) {
            $message->to($subscriber->email)->subject($post->title);
        });
    }
}
