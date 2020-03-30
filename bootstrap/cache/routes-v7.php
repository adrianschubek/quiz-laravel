<?php
/**
 * Copyright (c) 2020. Adrian Schubek
 * https://adriansoftware.de
 */

/*
|--------------------------------------------------------------------------
| Load The Cached Routes
|--------------------------------------------------------------------------
|
| Here we will decode and unserialize the RouteCollection instance that
| holds all of the route information for an application. This allows
| us to instantaneously load the entire route map into the router.
|
*/

app('router')->setCompiledRoutes(
    array (
  'compiled' =>
  array (
    0 => false,
    1 =>
    array (
      '/livewire/livewire.js' =>
      array (
        0 =>
        array (
          0 =>
          array (
            '_route' => 'generated::3tK0MdfLo1oguFtQ',
          ),
          1 => NULL,
          2 =>
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/livewire/livewire.js.map' =>
      array (
        0 =>
        array (
          0 =>
          array (
            '_route' => 'generated::JPNy3yDIghcHvjRA',
          ),
          1 => NULL,
          2 =>
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/login' =>
      array (
        0 =>
        array (
          0 =>
          array (
            '_route' => 'login',
          ),
          1 => NULL,
          2 =>
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 =>
        array (
          0 =>
          array (
            '_route' => 'generated::dyvhMGnOVwyFfaq7',
          ),
          1 => NULL,
          2 =>
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/logout' =>
      array (
        0 =>
        array (
          0 =>
          array (
            '_route' => 'logout',
          ),
          1 => NULL,
          2 =>
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/register' =>
      array (
        0 =>
        array (
          0 =>
          array (
            '_route' => 'register',
          ),
          1 => NULL,
          2 =>
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 =>
        array (
          0 =>
          array (
            '_route' => 'generated::NC64kRslDxSX5i8S',
          ),
          1 => NULL,
          2 =>
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/password/reset' =>
      array (
        0 =>
        array (
          0 =>
          array (
            '_route' => 'password.request',
          ),
          1 => NULL,
          2 =>
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 =>
        array (
          0 =>
          array (
            '_route' => 'password.update',
          ),
          1 => NULL,
          2 =>
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/password/email' =>
      array (
        0 =>
        array (
          0 =>
          array (
            '_route' => 'password.email',
          ),
          1 => NULL,
          2 =>
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/password/confirm' =>
      array (
        0 =>
        array (
          0 =>
          array (
            '_route' => 'password.confirm',
          ),
          1 => NULL,
          2 =>
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 =>
        array (
          0 =>
          array (
            '_route' => 'generated::ppshdIJxYnUtCtLX',
          ),
          1 => NULL,
          2 =>
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/email/verify' =>
      array (
        0 =>
        array (
          0 =>
          array (
            '_route' => 'verification.notice',
          ),
          1 => NULL,
          2 =>
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/email/resend' =>
      array (
        0 =>
        array (
          0 =>
          array (
            '_route' => 'verification.resend',
          ),
          1 => NULL,
          2 =>
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/' =>
      array (
        0 =>
        array (
          0 =>
          array (
            '_route' => 'home',
          ),
          1 => NULL,
          2 =>
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/stats' =>
      array (
        0 =>
        array (
          0 =>
          array (
            '_route' => 'stats',
          ),
          1 => NULL,
          2 =>
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/search' =>
      array (
        0 =>
        array (
          0 =>
          array (
            '_route' => 'quiz.search',
          ),
          1 => NULL,
          2 =>
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/comments' =>
      array (
        0 =>
        array (
          0 =>
          array (
            '_route' => 'comments.index',
          ),
          1 => NULL,
          2 =>
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/liked' =>
      array (
        0 =>
        array (
          0 =>
          array (
            '_route' => 'likes.index',
          ),
          1 => NULL,
          2 =>
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/quiz' =>
      array (
        0 =>
        array (
          0 =>
          array (
            '_route' => 'quiz.index',
          ),
          1 => NULL,
          2 =>
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
        1 =>
        array (
          0 =>
          array (
            '_route' => 'quiz.store',
          ),
          1 => NULL,
          2 =>
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/quiz/create' =>
      array (
        0 =>
        array (
          0 =>
          array (
            '_route' => 'quiz.create',
          ),
          1 => NULL,
          2 =>
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/users' =>
      array (
        0 =>
        array (
          0 =>
          array (
            '_route' => 'profiles.index',
          ),
          1 => NULL,
          2 =>
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      '/notifications' =>
      array (
        0 =>
        array (
          0 =>
          array (
            '_route' => 'notifications',
          ),
          1 => NULL,
          2 =>
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
    ),
    2 =>
    array (
      0 => '{^(?|/livewire/message/([^/]++)(*:33)|/p(?|assword/reset/([^/]++)(*:67)|rofiles/([^/]++)(?|/edit(*:98)|(*:105)))|/email/verify/([^/]++)/([^/]++)(*:146)|/quiz/([^/]++)(?|/(?|edit(*:179)|([^/]++)/play(*:200)|restore(*:215)|delete(*:229)|like(*:241)|([^/]++)/likes(*:263)|questions(?|(*:283)|/([^/]++)(?|(*:303)))|comments(?|(*:324)|/([^/]++)(*:341))|([^/]++)/comments(*:367)|comments/([^/]++)/like(*:397))|(*:406))|/users/([^/]++)(?:/([^/]++))?(*:444)|/(.*)(*:457))/?$}sDu',
    ),
    3 =>
    array (
      33 =>
      array (
        0 =>
        array (
          0 =>
          array (
            '_route' => 'generated::2wu6jgb0lNTQwEe8',
          ),
          1 =>
          array (
            0 => 'name',
          ),
          2 =>
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      67 =>
      array (
        0 =>
        array (
          0 =>
          array (
            '_route' => 'password.reset',
          ),
          1 =>
          array (
            0 => 'token',
          ),
          2 =>
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      98 =>
      array (
        0 =>
        array (
          0 =>
          array (
            '_route' => 'profiles.edit',
          ),
          1 =>
          array (
            0 => 'profile',
          ),
          2 =>
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      105 =>
      array (
        0 =>
        array (
          0 =>
          array (
            '_route' => 'profiles.update',
          ),
          1 =>
          array (
            0 => 'profile',
          ),
          2 =>
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 =>
        array (
          0 =>
          array (
            '_route' => 'profiles.destroy',
          ),
          1 =>
          array (
            0 => 'profile',
          ),
          2 =>
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      146 =>
      array (
        0 =>
        array (
          0 =>
          array (
            '_route' => 'verification.verify',
          ),
          1 =>
          array (
            0 => 'id',
            1 => 'hash',
          ),
          2 =>
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      179 =>
      array (
        0 =>
        array (
          0 =>
          array (
            '_route' => 'quiz.edit',
          ),
          1 =>
          array (
            0 => 'quiz',
          ),
          2 =>
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      200 =>
      array (
        0 =>
        array (
          0 =>
          array (
            '_route' => 'quiz.show',
          ),
          1 =>
          array (
            0 => 'quiz',
            1 => 'slug',
          ),
          2 =>
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      215 =>
      array (
        0 =>
        array (
          0 =>
          array (
            '_route' => 'quiz.restore',
          ),
          1 =>
          array (
            0 => 'id',
          ),
          2 =>
          array (
            'PUT' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      229 =>
      array (
        0 =>
        array (
          0 =>
          array (
            '_route' => 'quiz.force-delete',
          ),
          1 =>
          array (
            0 => 'id',
          ),
          2 =>
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      241 =>
      array (
        0 =>
        array (
          0 =>
          array (
            '_route' => 'quiz.like',
          ),
          1 =>
          array (
            0 => 'quiz',
          ),
          2 =>
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      263 =>
      array (
        0 =>
        array (
          0 =>
          array (
            '_route' => 'quiz.likedby',
          ),
          1 =>
          array (
            0 => 'quiz',
            1 => 'slug',
          ),
          2 =>
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      283 =>
      array (
        0 =>
        array (
          0 =>
          array (
            '_route' => 'questions.store',
          ),
          1 =>
          array (
            0 => 'quiz',
          ),
          2 =>
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      303 =>
      array (
        0 =>
        array (
          0 =>
          array (
            '_route' => 'questions.update',
          ),
          1 =>
          array (
            0 => 'quiz',
            1 => 'question',
          ),
          2 =>
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 =>
        array (
          0 =>
          array (
            '_route' => 'questions.destroy',
          ),
          1 =>
          array (
            0 => 'quiz',
            1 => 'question',
          ),
          2 =>
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      324 =>
      array (
        0 =>
        array (
          0 =>
          array (
            '_route' => 'comments.store',
          ),
          1 =>
          array (
            0 => 'quiz',
          ),
          2 =>
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      341 =>
      array (
        0 =>
        array (
          0 =>
          array (
            '_route' => 'comments.destroy',
          ),
          1 =>
          array (
            0 => 'quiz',
            1 => 'comment',
          ),
          2 =>
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      367 =>
      array (
        0 =>
        array (
          0 =>
          array (
            '_route' => 'comments.show',
          ),
          1 =>
          array (
            0 => 'quiz',
            1 => 'slug',
          ),
          2 =>
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      397 =>
      array (
        0 =>
        array (
          0 =>
          array (
            '_route' => 'comments.like',
          ),
          1 =>
          array (
            0 => 'quiz',
            1 => 'comment',
          ),
          2 =>
          array (
            'POST' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => false,
          6 => NULL,
        ),
      ),
      406 =>
      array (
        0 =>
        array (
          0 =>
          array (
            '_route' => 'quiz.update',
          ),
          1 =>
          array (
            0 => 'quiz',
          ),
          2 =>
          array (
            'PUT' => 0,
            'PATCH' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 =>
        array (
          0 =>
          array (
            '_route' => 'quiz.destroy',
          ),
          1 =>
          array (
            0 => 'quiz',
          ),
          2 =>
          array (
            'DELETE' => 0,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      444 =>
      array (
        0 =>
        array (
          0 =>
          array (
            '_route' => 'profiles.show',
            'slug' => NULL,
          ),
          1 =>
          array (
            0 => 'profile',
            1 => 'slug',
          ),
          2 =>
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
      ),
      457 =>
      array (
        0 =>
        array (
          0 =>
          array (
            '_route' => 'generated::EYriSKu6Ck4WnIbD',
          ),
          1 =>
          array (
            0 => 'fallbackPlaceholder',
          ),
          2 =>
          array (
            'GET' => 0,
            'HEAD' => 1,
          ),
          3 => NULL,
          4 => false,
          5 => true,
          6 => NULL,
        ),
        1 =>
        array (
          0 => NULL,
          1 => NULL,
          2 => NULL,
          3 => NULL,
          4 => false,
          5 => false,
          6 => 0,
        ),
      ),
    ),
    4 => NULL,
  ),
  'attributes' =>
  array (
    'generated::3tK0MdfLo1oguFtQ' =>
    array (
      'methods' =>
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'livewire/livewire.js',
      'action' =>
      array (
        'uses' => 'Livewire\\LivewireJavaScriptAssets@source',
        'controller' => 'Livewire\\LivewireJavaScriptAssets@source',
        'as' => 'generated::3tK0MdfLo1oguFtQ',
      ),
      'fallback' => false,
      'defaults' =>
      array (
      ),
      'wheres' =>
      array (
      ),
      'bindingFields' =>
      array (
      ),
    ),
    'generated::JPNy3yDIghcHvjRA' =>
    array (
      'methods' =>
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'livewire/livewire.js.map',
      'action' =>
      array (
        'uses' => 'Livewire\\LivewireJavaScriptAssets@maps',
        'controller' => 'Livewire\\LivewireJavaScriptAssets@maps',
        'as' => 'generated::JPNy3yDIghcHvjRA',
      ),
      'fallback' => false,
      'defaults' =>
      array (
      ),
      'wheres' =>
      array (
      ),
      'bindingFields' =>
      array (
      ),
    ),
    'generated::2wu6jgb0lNTQwEe8' =>
    array (
      'methods' =>
      array (
        0 => 'POST',
      ),
      'uri' => 'livewire/message/{name}',
      'action' =>
      array (
        'uses' => 'Livewire\\Connection\\HttpConnectionHandler@__invoke',
        'controller' => 'Livewire\\Connection\\HttpConnectionHandler',
        'middleware' =>
        array (
          0 => 'web',
        ),
        'as' => 'generated::2wu6jgb0lNTQwEe8',
      ),
      'fallback' => false,
      'defaults' =>
      array (
      ),
      'wheres' =>
      array (
      ),
      'bindingFields' =>
      array (
      ),
    ),
    'login' =>
    array (
      'methods' =>
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'login',
      'action' =>
      array (
        'middleware' =>
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@showLoginForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@showLoginForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' =>
        array (
        ),
        'as' => 'login',
      ),
      'fallback' => false,
      'defaults' =>
      array (
      ),
      'wheres' =>
      array (
      ),
      'bindingFields' =>
      array (
      ),
    ),
    'generated::dyvhMGnOVwyFfaq7' =>
    array (
      'methods' =>
      array (
        0 => 'POST',
      ),
      'uri' => 'login',
      'action' =>
      array (
        'middleware' =>
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@login',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@login',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' =>
        array (
        ),
        'as' => 'generated::dyvhMGnOVwyFfaq7',
      ),
      'fallback' => false,
      'defaults' =>
      array (
      ),
      'wheres' =>
      array (
      ),
      'bindingFields' =>
      array (
      ),
    ),
    'logout' =>
    array (
      'methods' =>
      array (
        0 => 'POST',
      ),
      'uri' => 'logout',
      'action' =>
      array (
        'middleware' =>
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\LoginController@logout',
        'controller' => 'App\\Http\\Controllers\\Auth\\LoginController@logout',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' =>
        array (
        ),
        'as' => 'logout',
      ),
      'fallback' => false,
      'defaults' =>
      array (
      ),
      'wheres' =>
      array (
      ),
      'bindingFields' =>
      array (
      ),
    ),
    'register' =>
    array (
      'methods' =>
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'register',
      'action' =>
      array (
        'middleware' =>
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\RegisterController@showRegistrationForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\RegisterController@showRegistrationForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' =>
        array (
        ),
        'as' => 'register',
      ),
      'fallback' => false,
      'defaults' =>
      array (
      ),
      'wheres' =>
      array (
      ),
      'bindingFields' =>
      array (
      ),
    ),
    'generated::NC64kRslDxSX5i8S' =>
    array (
      'methods' =>
      array (
        0 => 'POST',
      ),
      'uri' => 'register',
      'action' =>
      array (
        'middleware' =>
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\RegisterController@register',
        'controller' => 'App\\Http\\Controllers\\Auth\\RegisterController@register',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' =>
        array (
        ),
        'as' => 'generated::NC64kRslDxSX5i8S',
      ),
      'fallback' => false,
      'defaults' =>
      array (
      ),
      'wheres' =>
      array (
      ),
      'bindingFields' =>
      array (
      ),
    ),
    'password.request' =>
    array (
      'methods' =>
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'password/reset',
      'action' =>
      array (
        'middleware' =>
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@showLinkRequestForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@showLinkRequestForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' =>
        array (
        ),
        'as' => 'password.request',
      ),
      'fallback' => false,
      'defaults' =>
      array (
      ),
      'wheres' =>
      array (
      ),
      'bindingFields' =>
      array (
      ),
    ),
    'password.email' =>
    array (
      'methods' =>
      array (
        0 => 'POST',
      ),
      'uri' => 'password/email',
      'action' =>
      array (
        'middleware' =>
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@sendResetLinkEmail',
        'controller' => 'App\\Http\\Controllers\\Auth\\ForgotPasswordController@sendResetLinkEmail',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' =>
        array (
        ),
        'as' => 'password.email',
      ),
      'fallback' => false,
      'defaults' =>
      array (
      ),
      'wheres' =>
      array (
      ),
      'bindingFields' =>
      array (
      ),
    ),
    'password.reset' =>
    array (
      'methods' =>
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'password/reset/{token}',
      'action' =>
      array (
        'middleware' =>
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@showResetForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@showResetForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' =>
        array (
        ),
        'as' => 'password.reset',
      ),
      'fallback' => false,
      'defaults' =>
      array (
      ),
      'wheres' =>
      array (
      ),
      'bindingFields' =>
      array (
      ),
    ),
    'password.update' =>
    array (
      'methods' =>
      array (
        0 => 'POST',
      ),
      'uri' => 'password/reset',
      'action' =>
      array (
        'middleware' =>
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@reset',
        'controller' => 'App\\Http\\Controllers\\Auth\\ResetPasswordController@reset',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' =>
        array (
        ),
        'as' => 'password.update',
      ),
      'fallback' => false,
      'defaults' =>
      array (
      ),
      'wheres' =>
      array (
      ),
      'bindingFields' =>
      array (
      ),
    ),
    'password.confirm' =>
    array (
      'methods' =>
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'password/confirm',
      'action' =>
      array (
        'middleware' =>
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@showConfirmForm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@showConfirmForm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' =>
        array (
        ),
        'as' => 'password.confirm',
      ),
      'fallback' => false,
      'defaults' =>
      array (
      ),
      'wheres' =>
      array (
      ),
      'bindingFields' =>
      array (
      ),
    ),
    'generated::ppshdIJxYnUtCtLX' =>
    array (
      'methods' =>
      array (
        0 => 'POST',
      ),
      'uri' => 'password/confirm',
      'action' =>
      array (
        'middleware' =>
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@confirm',
        'controller' => 'App\\Http\\Controllers\\Auth\\ConfirmPasswordController@confirm',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' =>
        array (
        ),
        'as' => 'generated::ppshdIJxYnUtCtLX',
      ),
      'fallback' => false,
      'defaults' =>
      array (
      ),
      'wheres' =>
      array (
      ),
      'bindingFields' =>
      array (
      ),
    ),
    'verification.notice' =>
    array (
      'methods' =>
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'email/verify',
      'action' =>
      array (
        'middleware' =>
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\VerificationController@show',
        'controller' => 'App\\Http\\Controllers\\Auth\\VerificationController@show',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' =>
        array (
        ),
        'as' => 'verification.notice',
      ),
      'fallback' => false,
      'defaults' =>
      array (
      ),
      'wheres' =>
      array (
      ),
      'bindingFields' =>
      array (
      ),
    ),
    'verification.verify' =>
    array (
      'methods' =>
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'email/verify/{id}/{hash}',
      'action' =>
      array (
        'middleware' =>
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\VerificationController@verify',
        'controller' => 'App\\Http\\Controllers\\Auth\\VerificationController@verify',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' =>
        array (
        ),
        'as' => 'verification.verify',
      ),
      'fallback' => false,
      'defaults' =>
      array (
      ),
      'wheres' =>
      array (
      ),
      'bindingFields' =>
      array (
      ),
    ),
    'verification.resend' =>
    array (
      'methods' =>
      array (
        0 => 'POST',
      ),
      'uri' => 'email/resend',
      'action' =>
      array (
        'middleware' =>
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Auth\\VerificationController@resend',
        'controller' => 'App\\Http\\Controllers\\Auth\\VerificationController@resend',
        'namespace' => 'App\\Http\\Controllers',
        'prefix' => NULL,
        'where' =>
        array (
        ),
        'as' => 'verification.resend',
      ),
      'fallback' => false,
      'defaults' =>
      array (
      ),
      'wheres' =>
      array (
      ),
      'bindingFields' =>
      array (
      ),
    ),
    'home' =>
    array (
      'methods' =>
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '/',
      'action' =>
      array (
        'middleware' =>
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\HomeController@__invoke',
        'controller' => 'App\\Http\\Controllers\\HomeController',
        'namespace' => NULL,
        'prefix' => NULL,
        'where' =>
        array (
        ),
        'as' => 'home',
      ),
      'fallback' => false,
      'defaults' =>
      array (
      ),
      'wheres' =>
      array (
      ),
      'bindingFields' =>
      array (
      ),
    ),
    'stats' =>
    array (
      'methods' =>
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'stats',
      'action' =>
      array (
        'middleware' =>
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\StatsController@__invoke',
        'controller' => 'App\\Http\\Controllers\\StatsController',
        'namespace' => NULL,
        'prefix' => NULL,
        'where' =>
        array (
        ),
        'as' => 'stats',
      ),
      'fallback' => false,
      'defaults' =>
      array (
      ),
      'wheres' =>
      array (
      ),
      'bindingFields' =>
      array (
      ),
    ),
    'quiz.search' =>
    array (
      'methods' =>
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'search',
      'action' =>
      array (
        'middleware' =>
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\SearchController@__invoke',
        'controller' => 'App\\Http\\Controllers\\SearchController',
        'namespace' => NULL,
        'prefix' => NULL,
        'where' =>
        array (
        ),
        'as' => 'quiz.search',
      ),
      'fallback' => false,
      'defaults' =>
      array (
      ),
      'wheres' =>
      array (
      ),
      'bindingFields' =>
      array (
      ),
    ),
    'comments.index' =>
    array (
      'methods' =>
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'comments',
      'action' =>
      array (
        'middleware' =>
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Comments\\CommentController@index',
        'controller' => 'App\\Http\\Controllers\\Comments\\CommentController@index',
        'namespace' => NULL,
        'prefix' => NULL,
        'where' =>
        array (
        ),
        'as' => 'comments.index',
      ),
      'fallback' => false,
      'defaults' =>
      array (
      ),
      'wheres' =>
      array (
      ),
      'bindingFields' =>
      array (
      ),
    ),
    'likes.index' =>
    array (
      'methods' =>
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'liked',
      'action' =>
      array (
        'middleware' =>
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Users\\LikedQuizController@__invoke',
        'controller' => 'App\\Http\\Controllers\\Users\\LikedQuizController',
        'namespace' => NULL,
        'prefix' => NULL,
        'where' =>
        array (
        ),
        'as' => 'likes.index',
      ),
      'fallback' => false,
      'defaults' =>
      array (
      ),
      'wheres' =>
      array (
      ),
      'bindingFields' =>
      array (
      ),
    ),
    'quiz.index' =>
    array (
      'methods' =>
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'quiz',
      'action' =>
      array (
        'middleware' =>
        array (
          0 => 'web',
        ),
        'as' => 'quiz.index',
        'uses' => 'App\\Http\\Controllers\\Quizzes\\QuizController@index',
        'controller' => 'App\\Http\\Controllers\\Quizzes\\QuizController@index',
        'namespace' => NULL,
        'prefix' => '/',
        'where' =>
        array (
        ),
      ),
      'fallback' => false,
      'defaults' =>
      array (
      ),
      'wheres' =>
      array (
      ),
      'bindingFields' =>
      array (
      ),
    ),
    'quiz.create' =>
    array (
      'methods' =>
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'quiz/create',
      'action' =>
      array (
        'middleware' =>
        array (
          0 => 'web',
        ),
        'as' => 'quiz.create',
        'uses' => 'App\\Http\\Controllers\\Quizzes\\QuizController@create',
        'controller' => 'App\\Http\\Controllers\\Quizzes\\QuizController@create',
        'namespace' => NULL,
        'prefix' => '/',
        'where' =>
        array (
        ),
      ),
      'fallback' => false,
      'defaults' =>
      array (
      ),
      'wheres' =>
      array (
      ),
      'bindingFields' =>
      array (
      ),
    ),
    'quiz.store' =>
    array (
      'methods' =>
      array (
        0 => 'POST',
      ),
      'uri' => 'quiz',
      'action' =>
      array (
        'middleware' =>
        array (
          0 => 'web',
        ),
        'as' => 'quiz.store',
        'uses' => 'App\\Http\\Controllers\\Quizzes\\QuizController@store',
        'controller' => 'App\\Http\\Controllers\\Quizzes\\QuizController@store',
        'namespace' => NULL,
        'prefix' => '/',
        'where' =>
        array (
        ),
      ),
      'fallback' => false,
      'defaults' =>
      array (
      ),
      'wheres' =>
      array (
      ),
      'bindingFields' =>
      array (
      ),
    ),
    'quiz.edit' =>
    array (
      'methods' =>
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'quiz/{quiz}/edit',
      'action' =>
      array (
        'middleware' =>
        array (
          0 => 'web',
        ),
        'as' => 'quiz.edit',
        'uses' => 'App\\Http\\Controllers\\Quizzes\\QuizController@edit',
        'controller' => 'App\\Http\\Controllers\\Quizzes\\QuizController@edit',
        'namespace' => NULL,
        'prefix' => '/',
        'where' =>
        array (
        ),
      ),
      'fallback' => false,
      'defaults' =>
      array (
      ),
      'wheres' =>
      array (
      ),
      'bindingFields' =>
      array (
      ),
    ),
    'quiz.update' =>
    array (
      'methods' =>
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'quiz/{quiz}',
      'action' =>
      array (
        'middleware' =>
        array (
          0 => 'web',
        ),
        'as' => 'quiz.update',
        'uses' => 'App\\Http\\Controllers\\Quizzes\\QuizController@update',
        'controller' => 'App\\Http\\Controllers\\Quizzes\\QuizController@update',
        'namespace' => NULL,
        'prefix' => '/',
        'where' =>
        array (
        ),
      ),
      'fallback' => false,
      'defaults' =>
      array (
      ),
      'wheres' =>
      array (
      ),
      'bindingFields' =>
      array (
      ),
    ),
    'quiz.destroy' =>
    array (
      'methods' =>
      array (
        0 => 'DELETE',
      ),
      'uri' => 'quiz/{quiz}',
      'action' =>
      array (
        'middleware' =>
        array (
          0 => 'web',
        ),
        'as' => 'quiz.destroy',
        'uses' => 'App\\Http\\Controllers\\Quizzes\\QuizController@destroy',
        'controller' => 'App\\Http\\Controllers\\Quizzes\\QuizController@destroy',
        'namespace' => NULL,
        'prefix' => '/',
        'where' =>
        array (
        ),
      ),
      'fallback' => false,
      'defaults' =>
      array (
      ),
      'wheres' =>
      array (
      ),
      'bindingFields' =>
      array (
      ),
    ),
    'quiz.show' =>
    array (
      'methods' =>
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'quiz/{quiz}/{slug}/play',
      'action' =>
      array (
        'middleware' =>
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Quizzes\\QuizController@show',
        'controller' => 'App\\Http\\Controllers\\Quizzes\\QuizController@show',
        'namespace' => NULL,
        'prefix' => NULL,
        'where' =>
        array (
        ),
        'as' => 'quiz.show',
      ),
      'fallback' => false,
      'defaults' =>
      array (
      ),
      'wheres' =>
      array (
      ),
      'bindingFields' =>
      array (
      ),
    ),
    'quiz.restore' =>
    array (
      'methods' =>
      array (
        0 => 'PUT',
      ),
      'uri' => 'quiz/{id}/restore',
      'action' =>
      array (
        'middleware' =>
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Quizzes\\QuizController@restore',
        'controller' => 'App\\Http\\Controllers\\Quizzes\\QuizController@restore',
        'namespace' => NULL,
        'prefix' => NULL,
        'where' =>
        array (
        ),
        'as' => 'quiz.restore',
      ),
      'fallback' => false,
      'defaults' =>
      array (
      ),
      'wheres' =>
      array (
      ),
      'bindingFields' =>
      array (
      ),
    ),
    'quiz.force-delete' =>
    array (
      'methods' =>
      array (
        0 => 'DELETE',
      ),
      'uri' => 'quiz/{id}/delete',
      'action' =>
      array (
        'middleware' =>
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Quizzes\\QuizController@forceDelete',
        'controller' => 'App\\Http\\Controllers\\Quizzes\\QuizController@forceDelete',
        'namespace' => NULL,
        'prefix' => NULL,
        'where' =>
        array (
        ),
        'as' => 'quiz.force-delete',
      ),
      'fallback' => false,
      'defaults' =>
      array (
      ),
      'wheres' =>
      array (
      ),
      'bindingFields' =>
      array (
      ),
    ),
    'quiz.like' =>
    array (
      'methods' =>
      array (
        0 => 'POST',
      ),
      'uri' => 'quiz/{quiz}/like',
      'action' =>
      array (
        'middleware' =>
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Likes\\LikeQuizController@__invoke',
        'controller' => 'App\\Http\\Controllers\\Likes\\LikeQuizController',
        'namespace' => NULL,
        'prefix' => NULL,
        'where' =>
        array (
        ),
        'as' => 'quiz.like',
      ),
      'fallback' => false,
      'defaults' =>
      array (
      ),
      'wheres' =>
      array (
      ),
      'bindingFields' =>
      array (
      ),
    ),
    'quiz.likedby' =>
    array (
      'methods' =>
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'quiz/{quiz}/{slug}/likes',
      'action' =>
      array (
        'middleware' =>
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Quizzes\\QuizLikedByController@__invoke',
        'controller' => 'App\\Http\\Controllers\\Quizzes\\QuizLikedByController',
        'namespace' => NULL,
        'prefix' => NULL,
        'where' =>
        array (
        ),
        'as' => 'quiz.likedby',
      ),
      'fallback' => false,
      'defaults' =>
      array (
      ),
      'wheres' =>
      array (
      ),
      'bindingFields' =>
      array (
      ),
    ),
    'questions.store' =>
    array (
      'methods' =>
      array (
        0 => 'POST',
      ),
      'uri' => 'quiz/{quiz}/questions',
      'action' =>
      array (
        'middleware' =>
        array (
          0 => 'web',
        ),
        'as' => 'questions.store',
        'uses' => 'App\\Http\\Controllers\\Quizzes\\Questions\\QuestionController@store',
        'controller' => 'App\\Http\\Controllers\\Quizzes\\Questions\\QuestionController@store',
        'namespace' => NULL,
        'prefix' => '/quiz/{quiz}',
        'where' =>
        array (
        ),
      ),
      'fallback' => false,
      'defaults' =>
      array (
      ),
      'wheres' =>
      array (
      ),
      'bindingFields' =>
      array (
      ),
    ),
    'questions.update' =>
    array (
      'methods' =>
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'quiz/{quiz}/questions/{question}',
      'action' =>
      array (
        'middleware' =>
        array (
          0 => 'web',
        ),
        'as' => 'questions.update',
        'uses' => 'App\\Http\\Controllers\\Quizzes\\Questions\\QuestionController@update',
        'controller' => 'App\\Http\\Controllers\\Quizzes\\Questions\\QuestionController@update',
        'namespace' => NULL,
        'prefix' => '/quiz/{quiz}',
        'where' =>
        array (
        ),
      ),
      'fallback' => false,
      'defaults' =>
      array (
      ),
      'wheres' =>
      array (
      ),
      'bindingFields' =>
      array (
      ),
    ),
    'questions.destroy' =>
    array (
      'methods' =>
      array (
        0 => 'DELETE',
      ),
      'uri' => 'quiz/{quiz}/questions/{question}',
      'action' =>
      array (
        'middleware' =>
        array (
          0 => 'web',
        ),
        'as' => 'questions.destroy',
        'uses' => 'App\\Http\\Controllers\\Quizzes\\Questions\\QuestionController@destroy',
        'controller' => 'App\\Http\\Controllers\\Quizzes\\Questions\\QuestionController@destroy',
        'namespace' => NULL,
        'prefix' => '/quiz/{quiz}',
        'where' =>
        array (
        ),
      ),
      'fallback' => false,
      'defaults' =>
      array (
      ),
      'wheres' =>
      array (
      ),
      'bindingFields' =>
      array (
      ),
    ),
    'comments.store' =>
    array (
      'methods' =>
      array (
        0 => 'POST',
      ),
      'uri' => 'quiz/{quiz}/comments',
      'action' =>
      array (
        'middleware' =>
        array (
          0 => 'web',
        ),
        'as' => 'comments.store',
        'uses' => 'App\\Http\\Controllers\\Comments\\CommentController@store',
        'controller' => 'App\\Http\\Controllers\\Comments\\CommentController@store',
        'namespace' => NULL,
        'prefix' => '/quiz/{quiz}',
        'where' =>
        array (
        ),
      ),
      'fallback' => false,
      'defaults' =>
      array (
      ),
      'wheres' =>
      array (
      ),
      'bindingFields' =>
      array (
      ),
    ),
    'comments.destroy' =>
    array (
      'methods' =>
      array (
        0 => 'DELETE',
      ),
      'uri' => 'quiz/{quiz}/comments/{comment}',
      'action' =>
      array (
        'middleware' =>
        array (
          0 => 'web',
        ),
        'as' => 'comments.destroy',
        'uses' => 'App\\Http\\Controllers\\Comments\\CommentController@destroy',
        'controller' => 'App\\Http\\Controllers\\Comments\\CommentController@destroy',
        'namespace' => NULL,
        'prefix' => '/quiz/{quiz}',
        'where' =>
        array (
        ),
      ),
      'fallback' => false,
      'defaults' =>
      array (
      ),
      'wheres' =>
      array (
      ),
      'bindingFields' =>
      array (
      ),
    ),
    'comments.show' =>
    array (
      'methods' =>
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'quiz/{quiz}/{slug}/comments',
      'action' =>
      array (
        'middleware' =>
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Comments\\CommentController@show',
        'controller' => 'App\\Http\\Controllers\\Comments\\CommentController@show',
        'namespace' => NULL,
        'prefix' => NULL,
        'where' =>
        array (
        ),
        'as' => 'comments.show',
      ),
      'fallback' => false,
      'defaults' =>
      array (
      ),
      'wheres' =>
      array (
      ),
      'bindingFields' =>
      array (
      ),
    ),
    'comments.like' =>
    array (
      'methods' =>
      array (
        0 => 'POST',
      ),
      'uri' => 'quiz/{quiz}/comments/{comment}/like',
      'action' =>
      array (
        'middleware' =>
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Likes\\LikeCommentController@__invoke',
        'controller' => 'App\\Http\\Controllers\\Likes\\LikeCommentController',
        'namespace' => NULL,
        'prefix' => NULL,
        'where' =>
        array (
        ),
        'as' => 'comments.like',
      ),
      'fallback' => false,
      'defaults' =>
      array (
      ),
      'wheres' =>
      array (
      ),
      'bindingFields' =>
      array (
      ),
    ),
    'profiles.edit' =>
    array (
      'methods' =>
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'profiles/{profile}/edit',
      'action' =>
      array (
        'middleware' =>
        array (
          0 => 'web',
        ),
        'as' => 'profiles.edit',
        'uses' => 'App\\Http\\Controllers\\Users\\ProfileController@edit',
        'controller' => 'App\\Http\\Controllers\\Users\\ProfileController@edit',
        'namespace' => NULL,
        'prefix' => '/',
        'where' =>
        array (
        ),
      ),
      'fallback' => false,
      'defaults' =>
      array (
      ),
      'wheres' =>
      array (
      ),
      'bindingFields' =>
      array (
      ),
    ),
    'profiles.update' =>
    array (
      'methods' =>
      array (
        0 => 'PUT',
        1 => 'PATCH',
      ),
      'uri' => 'profiles/{profile}',
      'action' =>
      array (
        'middleware' =>
        array (
          0 => 'web',
        ),
        'as' => 'profiles.update',
        'uses' => 'App\\Http\\Controllers\\Users\\ProfileController@update',
        'controller' => 'App\\Http\\Controllers\\Users\\ProfileController@update',
        'namespace' => NULL,
        'prefix' => '/',
        'where' =>
        array (
        ),
      ),
      'fallback' => false,
      'defaults' =>
      array (
      ),
      'wheres' =>
      array (
      ),
      'bindingFields' =>
      array (
      ),
    ),
    'profiles.destroy' =>
    array (
      'methods' =>
      array (
        0 => 'DELETE',
      ),
      'uri' => 'profiles/{profile}',
      'action' =>
      array (
        'middleware' =>
        array (
          0 => 'web',
        ),
        'as' => 'profiles.destroy',
        'uses' => 'App\\Http\\Controllers\\Users\\ProfileController@destroy',
        'controller' => 'App\\Http\\Controllers\\Users\\ProfileController@destroy',
        'namespace' => NULL,
        'prefix' => '/',
        'where' =>
        array (
        ),
      ),
      'fallback' => false,
      'defaults' =>
      array (
      ),
      'wheres' =>
      array (
      ),
      'bindingFields' =>
      array (
      ),
    ),
    'profiles.index' =>
    array (
      'methods' =>
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'users',
      'action' =>
      array (
        'middleware' =>
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Users\\ProfileController@index',
        'controller' => 'App\\Http\\Controllers\\Users\\ProfileController@index',
        'namespace' => NULL,
        'prefix' => NULL,
        'where' =>
        array (
        ),
        'as' => 'profiles.index',
      ),
      'fallback' => false,
      'defaults' =>
      array (
      ),
      'wheres' =>
      array (
      ),
      'bindingFields' =>
      array (
      ),
    ),
    'profiles.show' =>
    array (
      'methods' =>
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'users/{profile}/{slug?}',
      'action' =>
      array (
        'middleware' =>
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Users\\ProfileController@show',
        'controller' => 'App\\Http\\Controllers\\Users\\ProfileController@show',
        'namespace' => NULL,
        'prefix' => NULL,
        'where' =>
        array (
        ),
        'as' => 'profiles.show',
      ),
      'fallback' => false,
      'defaults' =>
      array (
      ),
      'wheres' =>
      array (
      ),
      'bindingFields' =>
      array (
      ),
    ),
    'notifications' =>
    array (
      'methods' =>
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => 'notifications',
      'action' =>
      array (
        'middleware' =>
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\Notifications\\NotificationController@index',
        'controller' => 'App\\Http\\Controllers\\Notifications\\NotificationController@index',
        'namespace' => NULL,
        'prefix' => NULL,
        'where' =>
        array (
        ),
        'as' => 'notifications',
      ),
      'fallback' => false,
      'defaults' =>
      array (
      ),
      'wheres' =>
      array (
      ),
      'bindingFields' =>
      array (
      ),
    ),
    'generated::EYriSKu6Ck4WnIbD' =>
    array (
      'methods' =>
      array (
        0 => 'GET',
        1 => 'HEAD',
      ),
      'uri' => '{fallbackPlaceholder}',
      'action' =>
      array (
        'middleware' =>
        array (
          0 => 'web',
        ),
        'uses' => 'App\\Http\\Controllers\\FallbackRouteController@__invoke',
        'controller' => 'App\\Http\\Controllers\\FallbackRouteController',
        'namespace' => NULL,
        'prefix' => NULL,
        'where' =>
        array (
        ),
        'as' => 'generated::EYriSKu6Ck4WnIbD',
      ),
      'fallback' => true,
      'defaults' =>
      array (
      ),
      'wheres' =>
      array (
        'fallbackPlaceholder' => '.*',
      ),
      'bindingFields' =>
      array (
      ),
    ),
  ),
)
);
