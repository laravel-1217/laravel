<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index()
    {
        return 'Admin index';
    }

    public function news()
    {
        return 'Admin news';
    }
}
