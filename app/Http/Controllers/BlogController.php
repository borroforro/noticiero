<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    
    public function index(Request $request)
    {
        $news_config = config("services.news.class");
        $news_service = resolve($news_config);
        $news = $news_service->handleNews($request->q ?? 'bitcoin', 20);
        $data = $news->articles;
        $users_config = config("services.users.class");
        $users_service = resolve($users_config);
        $users_results = $users_service->handleUsers(20);
        $users = $users_results->results;
        for($i = 0; $i < sizeof($data); $i++)
        {

            $data[$i]->author = $users[$i];
        }
        $news_articles = collect($data);
        // $articles = $news_articles->paginate(10);

        $perPage = 10;
        $page = request()->get('page', 1);
        $articles = new \Illuminate\Pagination\LengthAwarePaginator(
            $news_articles->forPage($page, $perPage), 
            $news_articles->count(), 
            $perPage, 
            $page
        );
        // dd($articles);
        return view('blog.index', ['articles' => $articles]);

        
    }
}
