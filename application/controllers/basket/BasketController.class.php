<?php

class BasketController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
      $artworkModel = new ArtworksModel();
      $productsModel = new ProductsModel();
      $artworks = $artworkModel->getAllArtworks();
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
