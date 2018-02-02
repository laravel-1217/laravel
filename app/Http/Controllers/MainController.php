<?php namespace App\Http\Controllers;

use App\Events\FeedbackWasCreated;
use App\Mail\FeedbackMail;
use App\Models\Page;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;

class MainController extends Controller
{
    public function index()
    {
        $posts = Cache::remember('mainPosts', env('CACHE_TIME', 0), function () {
            return Post::with(['sections', 'comments'])
                ->active()
                ->intime()
                ->orderBy('id', 'DESC')
                ->get();
        });

        return view('layouts.primary', [
            'page' => 'pages.main',
            'title' => 'Blogplace :: Блог Дмитрий Юрьев - PHP & JS разработчик, ментор, преподаватель',
            'content' => '<p>Привет, меня зовут Дмитрий Юрьев и я веб разработчик!</p>',
            'image' => [
                'path' => 'assets/images/Me.jpg',
                'alt' => 'Image'
            ],
            'activeMenu' => 'main',
            'posts' => $posts,
        ]);
    }

    public function about()
    {
        return view('layouts.primary', [
            'page' => 'pages.about',
            'title' => 'Обо мне',
            'content' => Page::find(1)->content,
            /*'image' => [
                'path' => 'assets/images/Me.jpg',
                'alt' => 'Image'
            ],*/
            'activeMenu' => 'about',
        ]);
    }

    public function feedback()
    {
        return view('layouts.primary', [
            'page' => 'pages.feedback',
            'title' => 'Написать мне',
            'activeMenu' => 'feedback',
        ]);
    }

    public function feedbackPost(Request $request)
    {
        $this->validate($this->request, [
            'name' => 'required|max:50|min:2',
            'email' => 'required|max:255|email',
            'message' => 'required|max:10240|min:10',
        ]);

        /*Mail::to('yurev@ntschool.ru')
            ->send(new FeedbackMail($request->all()));*/

        /*$mailTemplate = view('mails.feedback', [
            'data' => $request->all()
        ])->render();

        Mail::raw($mailTemplate, function($message) {
            $message->from('laravel-1217@vlane.ru');
            $message->to('yurev@ntschool.ru');
            $message->setContentType('text/html');
            $message->subject('Письмо с блога');
        });*/

        event(new FeedbackWasCreated($request->all()));

        return view('layouts.primary', [
            'page' => 'parts.blank',
            'title' => 'Сообщение отправлено!',
            'content' => 'Спасибо за ваше сообщение!',
            'link' => '<a href="javascript:history.back()">Вернуться назад</a>',
            'activeMenu' => 'feedback',
        ]);
    }
}
