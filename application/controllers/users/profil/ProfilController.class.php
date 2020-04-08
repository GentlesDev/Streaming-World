<?php

class ProfilController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {

       if(empty($_SESSION) == true) {
         $http->redirectTo('/');
       }
       $artworkModel = new ArtworksModel();
       $artworks = $artworkModel->getAllArtworks();
       $productsModel = new ProductsModel();
       $lines = $productsModel->getAllLines();
       return[
         'lines'=>$lines,
         "artworks"=>$artworks
       ];

    }

    public function httpPostMethod(Http $http, array $formFields)
    {

       $userModel = new UserModel();
       $userModel->updateUser($_POST);
       $artworkModel = new ArtworksModel();
       $artworks = $artworkModel->getAllArtworks();
       $productsModel = new ProductsModel();
       $lines = $productsModel->getAllLines();
       return[
         'lines'=>$lines,
         "artworks"=>$artworks
       ];


    }
}
