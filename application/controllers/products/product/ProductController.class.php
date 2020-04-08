<?php

class ProductController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {

      $artworkModel = new ArtworksModel();
      $productsModel = new ProductsModel();
      $artworks = $artworkModel->getAllArtworks();
      $lines = $productsModel->getAllLines();
      $products = $productsModel->getOneLine();
      return[
        "artworks"=>$artworks,
        'lines'=>$lines,
        'products'=>$products
      ];

    }

    public function httpPostMethod(Http $http, array $formFields)
    {



    }
}
?>
