<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    protected $counter;

    public function testGetMethod(Request $request)
    {

    }

    public function testPostMethod(Request $request)
    {

    }

    public function testGetPostMethod(Request $request)
    {
        return 'OK';
    }

    public function redirectPage()
    {

    }

    public function some()
    {

    }
}
