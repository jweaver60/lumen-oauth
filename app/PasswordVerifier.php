<?php

namespace App;

class PasswordVerifier
{
  public function verify($username, $password)
  {
      $credentials = [
        'email'    => $username,
        'password' => $password,
      ];

      $authManager = app()["auth"];
      if (app()["auth"]->once($credentials)) {
          return $authManager->user()->id;
      }

      return false;
  }
}