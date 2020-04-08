<?php

class TanjiroController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
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


    }
}
?>
