<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    //

    public function about(Request $request)
    {
        $name = $request->input('name', '');
        //$age =


        $user1 = new \stdClass();
        $user1->name = 'Вася';

        $user2 = new \stdClass();
        $user2->name = 'Петя';

        $users = [];

        array_push($users, $user1, $user2);

        return view('qaz.asd', [
            'name' => $name,
            //'age' => $request->input('age')
            'users' => $users
        ]);
    }
}
