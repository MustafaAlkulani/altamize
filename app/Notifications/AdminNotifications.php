<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class AdminNotifications extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

     private $data1;
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

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toDatabase($notifiable)
    { // 'title','notification','file','admin_id'
        return [
        
        
       
        'user_id'=>$this->data1['admin_id'],
        'title'=>$this->data1['notification'],
        'file'=>$this->data1['file'],
        'id_file'=>$this->data1['id'], 
        ];
     

      
    }

    
}
