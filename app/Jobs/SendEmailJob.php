<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Mail\UserMail;
// use App\Mail;
use Illuminate\Support\Facades\Mail;
class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $details;
    protected $p;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details,$pass)
    {
        $this->details = $details;
        $this->p=$pass;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $password = $this->p;
        $email = $this->details['email'];
        $name = $this->details['name'];
        
        $data = array('name'=>$name,'email'=>$email,'password'=>$password);
        Mail::send('mail',$data, function($message) use($email, $name) {
            $message->to($email, $name)->subject
               ('Welcome to Wappnet');
            $message->from('demownhema@gmail.com','HRMS Admin');
         });
    
    }
}
