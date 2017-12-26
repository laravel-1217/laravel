<?php

namespace App\Http\Controllers;

//use App\Implementations\Counter;
use App\Interfaces\CounterInterface;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    protected $request, $counter;

    public function __construct(Request $request, CounterInterface $counter)
    {
        $this->counter = $counter;
        //$this->counter = resolve('Counter');
        $this->request = $request;
    }

    public function about()
    {
        //$counter = new Counter();
        $this->counter->increment();
        $this->counter->increment();
        echo $this->counter->getValue();

        $name = $this->request->input('name', '');
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
