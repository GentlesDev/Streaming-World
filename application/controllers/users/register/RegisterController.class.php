<?php
class RegisterController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {

       $error = null;
       $artworkModel = new ArtworksModel();
       $artworks = $artworkModel->getAllArtworks();
       $productsModel = new ProductsModel();
       $lines = $productsModel->getAllLines();
       return [
         'lines'=>$lines,
         'error'=>$error,
         "artworks"=>$artworks
       ];

    }

    public function httpPostMethod(Http $http, array $formFields)
    {
       $userModel = new UserModel();
       $artworkModel = new ArtworksModel();
       $artworks = $artworkModel->getAllArtworks();

       $error = $userModel->addUser($_POST);
       $productsModel = new ProductsModel();
       $lines = $productsModel->getAllLines();
       if (array_key_exists('role', $_SESSION) === false) {
         return [
           'lines'=>$lines,
           'error'=>$error,
           "artworks"=>$artworks
         ];
       }


    }
}
