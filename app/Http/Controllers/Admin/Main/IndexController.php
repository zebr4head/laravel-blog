<?php

namespace App\Http\Controllers\Admin\Main;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        $post = Post::all();
        $categories = Category::all();
        $tags = Tag::all();
        return view('admin.main.index', compact('post', 'categories', 'tags'));
    }
}
