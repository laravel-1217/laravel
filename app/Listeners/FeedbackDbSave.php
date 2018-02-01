<?php

namespace App\Listeners;

use App\Events\FeedbackWasCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class FeedbackDbSave
{
    public function handle(FeedbackWasCreated $event)
    {
        $data = $event->getInputData();
        file_put_contents(base_path('111.txt'), serialize($data));
    }
}
