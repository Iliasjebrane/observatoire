<?php

namespace App\providers;

use App\Utils\Message;
use App\Utils\OldFormData;
use App\Utils\ViewErrorManager;


class AppServiceProvider extends BaseServiceProvider
{
    public function boot()
    {
        session_start();

        // this is help as to work with old() function to retrieve the old submited form data

        // old('email') => last email input value

        $oldFormData = new OldFormData();
        $oldFormData->resolve();

        $viewErrorManager = new ViewErrorManager();
        $viewErrorManager->resolve();

        $message = new Message();
        $message->resolve();

    }
}