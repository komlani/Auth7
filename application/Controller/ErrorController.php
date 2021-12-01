<?php

namespace Auth7\Controller;

use Auth7\Libs\Title;

class ErrorController
{
    public function index()
    {
        /** will trigger the same error page
         * for both client & admin websites */
        view('_templates/auth/header',[
            'pageTitle' => Title::set('Error'),
        ]);
        view('_templates/error');
        view('_templates/auth/footer');
    }
}
