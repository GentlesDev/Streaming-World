<?php

class PaymentController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
    	/*
    	 * Méthode appelée en cas de requête HTTP GET
    	 *
    	 * L'argument $http est un objet permettant de faire des redirections etc.
    	 * L'argument $queryFields contient l'équivalent de $_GET en PHP natif.
    	 */
       if(empty($_SESSION) == true || $_SESSION['role'] !== "admin" ) {
         $http->redirectTo('/');
       }
       $artworkModel = new ArtworksModel();
       $artworks = $artworkModel->getAllArtworks();
       $productsModel = new ProductsModel();
       $lines = $productsModel->getAllLines();
       $artworkStreams = $artworkModel->getAllArtworksAvailable();
       return[
        "artworkStreams" => $artworkStreams,
         'lines'=>$lines,
         "artworks"=>$artworks
       ];


    }

    public function httpPostMethod(Http $http, array $formFields)
    {
      $artworkModel = new ArtworksModel();
      $artworks = $artworkModel->getAllArtworks();
      $productsModel = new ProductsModel();
      $lines = $productsModel->getAllLines();
      $artworkStreams = $artworkModel->getAllArtworksAvailable();
      return[
        "artworkStreams" => $artworkStreams,
        'lines'=>$lines,
        "artworks"=>$artworks
      ];




    }
}
