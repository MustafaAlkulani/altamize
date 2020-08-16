<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class likenotification extends Notification
{
    use Queueable;



    private $data1;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        //
       $this->data1=$data;

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


    public function toDatabase()
    {
        return[

        'post_id'=> $this->data1['post_id'],
        'group_id'=> $this->data1['group_id'],
        'user_id'=> $this->data1['user_id'],
        'title'=> $this->data1['title'],
        'type'=>'-',
        'like'=>'yes',
     
       
       

        // 'title'=> "rrrrrrrrrrrrrrrrrr",
        // 'notifications'=>'tttttttttt',
        // 'id'=> 'dddddddd',


        ];
    }




}
