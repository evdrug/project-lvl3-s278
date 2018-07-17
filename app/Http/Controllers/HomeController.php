<?php
/**
 * Created by PhpStorm.
 * User: E.Druzyakin
 * Date: 17.07.18
 * Time: 13:07
 */

namespace App\Http\Controllers;

class HomeController
{
    public function index()
    {
        return view('index');
    }
}
