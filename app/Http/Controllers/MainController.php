<?php namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MainController extends Controller
{
    public function index()
    {
        $posts = [];

        return view('layouts.primary', [
            'page' => 'pages.main',
            'title' => 'Blogplace :: Блог Дмитрий Юрьев - PHP & JS разработчик, ментор, преподаватель',
            'content' => '<p>Привет, меня зовут Дмитрий Юрьев и я веб разработчик!</p>',
            'image' => [
                'path' => 'assets/images/Me.jpg',
                'alt' => 'Image'
            ],
            'activeMenu' => 'main',
            'posts' => $posts
        ]);
    }

    public function about()
    {
        return view('layouts.primary', [
            'page' => 'pages.about',
            'title' => 'Обо мне',
            'content' => '<p>Привет, меня зовут Дмитрий Юрьев и я веб разработчик!</p>',
            'image' => [
                'path' => 'assets/images/Me.jpg',
                'alt' => 'Image'
            ],
            'activeMenu' => 'about',
        ]);
    }

    public function feedback()
    {
        return view('layouts.primary', [
            'page' => 'pages.feedback',
            'title' => 'Написать мне',
            'content' => '<p>Привет, меня зовут Дмитрий Юрьев и я веб разработчик!</p>',
            'activeMenu' => 'feedback',
        ]);
    }

    public function db(Request $request)
    {
        $sql = "SELECT * FROM users";
        $data = DB::query($sql);

        foreach ($data as $row) {
            echo $row[0], $row['username'];
        }

        $sql = "insert into `customers` (`name`, `surname`, `age`, `birthdate`, `notes`, `updated_at`, `created_at`) 
                values ('Дмитрий', 'Юрьев', '33', '1984-09-04', 'Клевый пацан', '2018-01-11 22:16:21', '2018-01-11 22:16:21')";

        DB::query($sql);
    }


    public function ormGet()
    {
        return view('form');
    }

    public function ormPost(Request $request)
    {
        Customer::create(
            $request->all()
        );
    }

    public function orm()
    {
        /*$customerModel = new Customer();

        $customerModel->name = 'Дмитрий';
        $customerModel->surname = 'Юрьев';
        $customerModel->age = 33;
        $customerModel->birthdate= '1984-09-04';
        $customerModel->notes= 'Клевый пацан';

        $customerModel->save();*/

        /*Customer::create([
            'name' => 'Alfred',
            'surname' => 'Ivanov',
            'age' => 22,
            'birthdate' => '1990-01-30',
            'notes' => 'NTSchool student'
        ]);*/

        //

        //echo $myModel->name . ' ' . $myModel->surname;
        //dump($myModel->name);


        //dump($myModel);

        /*$allModels = Customer::all();

        foreach ($allModels as $model) {
            dump($model);
            $model->id = $model->id * 20;
            $model->save();
        }*/

        //$myModel = Customer::find(20);


        /*$models2 = Customer::where('surname', '=', 'Ivanov')
            ->get();*/

        /*$models2 = DB::table('customers')
            ->where('name', '=', 'Дмитрий')
            ->get();*/




        //dump($myModel, $models1);


        $models1 = Customer::where('id', '=', '20')
            ->first();

        $models1->name = 'Alex';
        $models1->age = 20;
        $models1->save();

        $models2 = Customer::find(60);

        /*$models2->update([
            'name' => 'John1',
            'surname' => 'Smith'
        ]);

        $models2->save();*/

        //$models2->delete();

        $allModels = Customer::all();
        dump($allModels);




        return 'OK';
    }
}
