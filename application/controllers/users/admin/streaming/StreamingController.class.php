<?php

class StreamingController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {

      $artworkModel = new ArtworksModel();
      $productsModel = new ProductsModel();
      $streamingModel = new StreamingModel();
      $artworks = $artworkModel->getAllArtworks();
      $episodes = $streamingModel->getAllEpisodes();
      $lines = $productsModel->getAllLines();
      $artworkStreams = $artworkModel->getAllArtworksAvailable();
      // var_dump($episodes);
      return[
        "artworkStreams" => $artworkStreams,
        "lines"=>$lines,
        "episodes"=>$episodes,
        "artworks"=>$artworks
      ];

    }

    public function httpPostMethod(Http $http, array $formFields)
    {



    }
}
