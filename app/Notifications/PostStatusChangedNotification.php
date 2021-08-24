<?php

namespace App\Notifications;

use App\Models\Post;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class PostStatusChangedNotification extends Notification
{
    use Queueable;

    public Post $post;
    /**
     * Create a new notification instance.
     * @param Post $post
     * @return void
     */
    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database'];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'id' => $this->post->id,
            'message' => " تم تغيير حالة التدوينة الى {$this->post->status}",
            'message_en' => "Post status changed to {$this->post->status}",
            'time' => $this->post->updated_at,
            'time_en' => $this->post->updated_at,
            'route' => route('posts.show', $this->post->slug),
         ];
    }
}
