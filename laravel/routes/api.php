<?php

use GuzzleHttp\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


// ПОЛЬЗОВАТЕЛИ

//данные пользователя и счет по email

Route::get('user/{user_email}', 'UserController@index');


// КАРТЫ

// все карты - постранично
Route::get('cards', 'CardController@index');

// полная информация о карте по ID
Route::get('card/{id}', 'CardController@show');

// полная информация о карте по CODE
Route::get('card-code/{code}', 'CardController@showCode');


// КАТЕГОРИИ КАРТ

// список категорий
Route::get('card-categories', 'CategoryController@index');

// список категорий карт постранично с рубашками
// запрос правильный - лажа с данными - разные рубашки
Route::get('card-category-img', 'CategoryController@catImg');

// список карт в категории - постранично
Route::get('card-category/{category}', 'CategoryController@show');

// список карт в категории по имени
Route::get('card-category-name/{category}', 'CategoryController@name');


// ИГРЫ

// все игры постранично
Route::get('game', 'GameController@index');

// полная информация об игре по ID
Route::get('game/{id}', 'GameController@show');

// прикрепленные карты к игре
Route::get('game-card/{id}', 'GameCardController@show');


// КАТЕГОРИИ ИГРЫ

// список категорий игры
Route::get('game-categories', 'GameCategoryController@index');

// список игр по категориям постранично
Route::get('game-categories/{category}', 'GameCategoryController@show');


// ПОСТЫ

// полный пост по ID
Route::get('post/{post}', 'PostController@show');

// все посты постранично
Route::get('posts', 'PostController@index');

// КАТЕГОРИИ ПОСТОВ

// список категорий постов 
Route::get('posts-categories', 'PostCategoryController@index');

// список постов по категории
Route::get('post-category/{category}', 'PostCategoryController@show');


// СЧЕТ

// список всех записей - сортировать по счету убывание

Route::get('score', 'ScoreController@index');

// список 10 записей - сортировать по счету убывание

Route::get('score-top10', 'ScoreController@top10');


// обновление записи счета

Route::post('add-score', 'ScoreController@updateScore');

/////ШАБЛОНЫ/////

//КАТЕГОРИИ ШАБЛОНОВ

//получение списка категорий шаблонов

Route::get('template-categoryes', 'TemplateCategoryController@index');

//получение шаблонов по id категории
Route::get('template-category/{id}', 'TemplateCategoryController@show');

//ШАБЛОНЫ

//получение шаблона по id
Route::get('template/{id}', 'TemplateController@show');

//ОТВЕТЫ НА ШАБЛОНЫ

//получение ответа по id
Route::get('answer/{id}', 'AnswerController@show');

//проверка существования незавершенного шаблона по e-mail
Route::post('answer-check', 'AnswerController@check');

//получение списка ответов по id шабона
Route::get('template-answers/{id}', 'AnswerController@answersList');

//создание ответа на шаблон
Route::post('answer-create', 'AnswerController@store');

//обновление ответа на шаблон - title, subtitle, notes
Route::post('answer-update', 'AnswerController@update');

//обновление ответа на шаблон - object
Route::post('answer-update-passport', 'AnswerController@updatePassport');

//обновление ответа на шаблон
Route::post('answer-update-object', 'AnswerController@updateObject');

//получение списка ответов по e-mail автора
Route::get('answers-email/{email}', 'AnswerController@answerEmail');


//КОММЕНТАРИИ НА ОТВЕТЫ

//получение списка комментариев по id ответа на шаблон
Route::get('comment-answer/{id}', 'CommentController@commentsList');

//оставить комментарий
Route::post('comment-create', 'CommentController@store');

//удалить комментарий
// Route::get('comment-delete/{id}', 'CommentController@destroy');

//редактировать комментарий
// Route::post('comment-update', 'CommentController@update');

// TEST ROUTES

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::get('/get', 'GetController');
});

// Route::get('/get', 'GetController');

// Route::group(['middleware' => 'throttle:60,1'], function(){
//     Route::get('categories', 'CategoryController@index');
//     Route::get('categories/{category}', 'CategoryController@show');
// });

// Route::get('categories', 'CategoryController@index');
// Route::get('categories/{category}', 'CategoryController@show');
// Route::apiResource('categories', 'Api\CategoryController');





