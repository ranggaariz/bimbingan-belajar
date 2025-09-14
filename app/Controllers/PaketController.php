<?php

namespace App\Controllers;

class PaketController extends BaseController
{
    public function reguler()
    {
        return view('welcome_page/reguler');
    }

    public function plus()
    {
        return view('welcome_page/plus');
    }

    public function online()
    {
        return view('welcome_page/online');
    }
}
