namespace App\Mail;
<?php
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\candidates;
use App\Models\Schedule;
use App\Models\jobs;
use App\Models\interviews;
use App\Models\employee;

class SendEmailToCandidate extends Mailable
{
    use Queueable, SerializesModels;

    public function __construct()
    {

    }

    public function build()
    {
        $candidates = candidates::all();
        $jobs=jobs::all();
        $interviews=interviews::all();
        return $this->subject('Congrats!')
                    ->view('emailCandidat', compact('candidates','jobs','interviews'));
    }
}
