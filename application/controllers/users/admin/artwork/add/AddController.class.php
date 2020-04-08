<?php
class AddController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
      if(empty($_SESSION) == true || $_SESSION['role'] !== "admin" ) {
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
      $artworkModel = new ArtworksModel();
      $artworks = $artworkModel->getAllArtworks();
      $artworkModel->addArtwork($_POST, $_FILES);
      $productsModel = new ProductsModel();
      $lines = $productsModel->getAllLines();
      return[
        'lines'=>$lines,
        "artworks"=>$artworks
      ];

    }
}
