<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BlogController extends Controller
{
    
    public function index()
    {
        $news_config = config("services.news.class");
        $news = resolve($news_config);
    }
}
