<?php

class KnyController
{
    public function httpGetMethod(Http $http, array $queryFields)
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

    public function httpPostMethod(Http $http, array $formFields)
    {



    }
}
?>
