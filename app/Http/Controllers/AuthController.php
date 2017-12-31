<?php namespace App\Http\Controllers;

use App\Http\Requests\RegisterFormRequest;
use App\Http\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function register()
    {
        return view('layouts.secondary', [
            'page' => 'pages.register',
            'title' => 'Регистрация в блоге',
            'content' => '',
            'activeMenu' => 'register',
        ]);
    }

    public function registerPost(RegisterRequest $request)
    {
        //debug($request->all());
        //dd($request->all());

        $this->validate($request, [
            'name' => 'required|min:3|max:20',
            'email' => 'required|email|unique:users',
            'password' => 'required|max:255|min:6',
            'password2' => 'required|same:password',
            /*'phone' => '/regex:/\+\d{1}\s{1}\(\d{3}\)\s{1}\d{3}\-\d{2}\-\d{2}/',
            'phone' => 'number|min:10|max:15',*/
            'is_confirmed' => 'accepted'
        ]);

        /*$validator = Validator::make($request->all(), [
            'name' => 'required|min:3|max:20',
            'email' => 'required|email|unique:users',
            'password' => 'required|max:255|min:6',
            'password2' => 'required|same:password',
            'phone' => '/regex:/\+\d{1}\s{1}\(\d{3}\)\s{1}\d{3}\-\d{2}\-\d{2}/',
            'phone' => 'number|min:10|max:15',
            'is_confirmed' => 'accepted'
        ]);

        if ($validator->fails()) {
            return redirect('/register.html')
                ->withErrors($validator)
                ->withInput();
        }*/

        DB::table('users')->insert([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
            'phone' => $request->input('phone', null)
        ]);

        $dbData = DB::table('users')
            ->where('email', '=', 'dima@dima.ru')
            ->first();

        //$dbData->name 'Dmitrii'

        dump($dbData);

        //dump($request->all());

        return 'OK';
    }
/*
    public function login()
    {
        return view('layouts.secondary', [
            'page' => 'pages.login',
            'title' => 'Вход в систему',
            'content' => '<p>Привет, меня зовут Дмитрий Юрьев и я веб разработчик!</p>',
            'activeMenu' => 'feedback',
        ]);
    }

    public function loginPost(Request $request)
    {

    }
*/
}
