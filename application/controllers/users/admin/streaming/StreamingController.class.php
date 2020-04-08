<?php

class StreamingController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {

      $artworkModel = new ArtworksModel();
      $artworks = $artworkModel->getAllArtworks();
      $streamings = $artworkModel->getAllEpisodes();
      $productsModel = new ProductsModel();
      $lines = $productsModel->getAllLines();
      // var_dump($streamings);
      return[
        'lines'=>$lines,
        "streamings"=>$streamings,
        "artworks"=>$artworks
      ];

    }

    public function httpPostMethod(Http $http, array $formFields)
    {



    }
}
?>
