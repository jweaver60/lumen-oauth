<?php

use LucaDegasperi\OAuth2Server\Facades\Authorizer;

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

$app->get('/', function () use ($app) {
    return $app->welcome();
});

$app->post('oauth/access_token', function() {
    return response()->json(Authorizer::issueAccessToken());
});

$app->get('oauth/authorized_user', ['middleware' => 'oauth', function() {
  $user = ["user_id" => Authorizer::getResourceOwnerId()];
  return response()->json($user);
}]);

$app->get('auth', function () use ($app) {
    $authManager = app()["auth"];
    dd(app()["auth"]->once(["email" => "jweaver60@gmail.com", "password" => "test"]));
});
