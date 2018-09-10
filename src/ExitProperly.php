<?php

namespace App;

use App\Dependencies\Redirector;

class ExitProperly
{
    public function catchErrorAndRedirect(Redirector $redirector)
    {
        try {
            throw new \Exception("oops!");
        } catch (\Exception $e) {
            $redirector->redirect('http://google.com');
            // Uncomment this to see what happens if this doesn't exit properly!
            return;
        }

        $this->doSomethingElse();
    }

    public function catchErrorAndRedirectButDontExit(Redirector $redirector)
    {
        try {
            throw new \Exception("oops!");
        } catch (\Exception $e) {
            $redirector->redirect('http://google.com');
        }

        $this->doSomethingElse();
    }

    protected function doSomethingElse()
    {
        echo "Unexpected behaviour!";
    }
}