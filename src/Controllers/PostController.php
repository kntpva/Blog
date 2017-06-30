<?php

namespace Kntpva\Blog\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Kntpva\Blog\Models\Post;
use Kntpva\Blog\Models\User;
use Barryvdh\Debugbar\Facade as Debugbar;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\RegistersUsers;


class PostController extends BaseController
{

    use ValidatesRequests;
    use RegistersUsers;

    public function index()
    {
        $posts = Post::all();
        // die(print_r($posts));
        Debugbar::info($posts);
        return view('Blog::index', ['posts' => $posts]);
    }

    public function getPost($id)
    {
        $post = Post::find($id);
        return view('Blog::posts.show')->with('post', $post);
    }

    public function newPost()
    {
        $data = Request::all();


        if (key_exists('save', $data)) {
            Debugbar::info($data);
            $projects = new Post();
            $projects->created_project($data);
            return redirect('post');
            Debugbar::info($projects);
        }

        return view('Blog::posts.newpost');
    }

    public function delete($id)
    {
        Post::find($id)->delete();
        return redirect('post');
    }

    public function login(Request $request)
    {
        Debugbar::info(Request::all());
        if (Auth::viaRemember()||Auth::attempt(['email' => Request::input('email'), 'password' => Request::input('password')])) {
            return redirect()->intended(route('newpost'));
        }
        return view('Blog::auth.login');
    }

    public function register()
    {
        $data = Request::all();
        if (key_exists('save', $data)) {
            Debugbar::info($data);
            $projects = new User();
            $projects->created_user($data);
            Debugbar::info($projects);
        }
        return view('Blog::auth.register');
    }

}
//where('slug', '=', $slug) -> firstOrFail()
