<?php

namespace App\Http\Controllers;

class HomeController extends BaseController
{
    public function index()
    {
        $this->setPageTitle('JumpGate Demo');

        return $this->view();
    }
}
