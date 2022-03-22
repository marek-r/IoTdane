<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

/*
 * Pobiera dane
 * Routing do strony głównej.
 * Ograniczenie 260 wejść na godzinę
 * Nazwa: start
 */
$router->get('/', [
    'middleware' => 'throttle:260,3600',
    'as' => 'start',
    'uses' => 'DaneController@dane'
]);

/*
 * Pobiera dane
 * Routing do wszystkich wpisów
 * Ograniczenie 260 wejść na godzinę
 */
$router->get('/logs', [
    'middleware' => ['throttle:260,3600'],
    'as' => 'wszystkieWpisy',
    'uses' => 'LogsController@index'
]);

/*
 * Pobiera dane
 * Routing do strony tabeli z danymi
 * Ograniczenie 260 wejść na godzinę
 **/
$router->get('/tabela', [
    'middleware' => ['throttle:260,3600'],
    'as'=>'tabela',
    'uses' => 'DaneController@tabela'
]);

/*
 * Dodaje dane.
 * Routing do kontrolera dodającego nowy wpis
 */
$router->post('/logs', [
    'as' => 'nowyWpis',
    'uses' => 'LogsController@create'
]);

