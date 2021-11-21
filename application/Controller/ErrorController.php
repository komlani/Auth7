<?php

namespace Auth7\Controller;

class ErrorController
{
    public function index()
    {
        /** will trigger the same error page
         * for both client & admin websites */
        view('_templates/auth/header');
        view('_templates/error');
        view('_templates/auth/footer');
    }
}
