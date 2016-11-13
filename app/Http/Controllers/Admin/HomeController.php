<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        return $this->view();
    }
}
