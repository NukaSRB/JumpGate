<?php

namespace App\Http\Controllers;

class HomeController extends BaseController
{
    public function index()
    {
        return $this->view();
    }
}
