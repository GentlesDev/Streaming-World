<?php

class ArtworkController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {

      $artworkModel = new ArtworksModel();
      $artworks = $artworkModel->getAllArtworks();
      $streamings = $artworkModel->displayEps($_GET['name']);
      $productsModel = new ProductsModel();
      $lines = $productsModel->getAllLines();
      $artworkStreams = $artworkModel->getAllArtworksAvailable();
      $title = $artworkModel->getOneArtwork($_GET['artworkId']);
      $specifies = $artworkModel->getAllArtworkSpecifies($_GET['artworkId']);
      return[
        "specifies" => $specifies,
        "title"=>$title,
        "artworkStreams" => $artworkStreams,
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
