<?php
class RoleController
{
  public function httpGetMethod(Http $http, array $queryFields)
  {
    if (empty($_SESSION) == true || $_SESSION['role'] !== "admin") {
      $http->redirectTo('/');
    }
  }

  public function httpPostMethod(Http $http, array $formFields)
  {
    // $json = json_encode($_POST);
    $userModel = new UserModel();
    $userModel->updateRole($_POST);
    $http->redirectTo('user/admin');
  }
}
