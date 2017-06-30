<?php

use Kntpva\Blog\Middleware\UserMiddleware;
use Illuminate\Http\Request;
//use Illuminate\Session\Middleware\StartSession;
$nameSpace = 'Kntpva\Blog\Controllers';

Route::get('/', function(){
    return redirect('/post');
}
);

Route::group(['prefix' => 'post', 'namespace' => $nameSpace], function () {
    Route::get('/', [
        'as' => 'index',
        'uses' => 'PostController@index'
    ]);

    Route::get('/posts/{id}', [
        'as' => 'get-post',
        'uses' => 'PostController@getPost'
    ]);

    Route::post('/newpost', ['middleware' => UserMiddleware::class,
        'as' => 'newpost',
        'uses' => 'PostController@newPost'
    ]);

    Route::get('/newpost', ['middleware' => UserMiddleware::class,
        'as' => 'newposts',
        'uses' => 'PostController@newPost'
    ]);
    Route::any('/login',[
        'as' => 'postLogin',
        'uses' => 'PostController@login'
    ]);

    Route::delete('/{id}', ['middleware' => UserMiddleware::class,
            'as' => 'deletepost',
            'uses' => 'PostController@delete'
        ]
    );

    Route::post('/register', [
            'as' => 'postRegister',
            'uses' => 'PostController@register'
        ]
    );

    Route::get('/register', [
            'as' => 'postRegisters',
            'uses' => 'PostController@register'
        ]
    );

});




//// Маршруты регистрации...
//Route::get('post/auth/register', 'Auth\AuthController@getRegister');
//Route::post('auth/register', 'Auth\AuthController@postRegister');



