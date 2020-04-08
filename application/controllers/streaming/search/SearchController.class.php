<?php

class SearchController
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
      $artworkModel = new ArtworksModel();
      $artworks = $artworkModel->getAllArtworks();
      $search = $_POST['search'];
      // var_dump($search);
      $streamings = $artworkModel->search($search);
      // var_dump($streamings);
      $productsModel = new ProductsModel();
      $lines = $productsModel->getAllLines();
      return[
        'lines'=>$lines,
        "search"=>$search,
        "artworks"=>$artworks,
        "streamings"=>$streamings
      ];


    }
}
?>
