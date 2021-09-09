<?php
namespace App\Listeners;
use App\Events\SendMail;
use App\Mail\MyTestMail;
use App\Models\Items;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
class SendMailFired
{
    public function __construct()
    {

    }
    public function handle(SendMail $event)
    {
        $item=Items::find($event->itemId)->toArray();
        $user = User::find($event->userId)->toArray();


       Mail::send('emails.mail', ['item'=> $item], function($message) use ($item, $user) {
            $message->to($user['email']);
            $message->subject('Item warning');
        });
    }
}
