<?php

class SpecifiesController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {

        $artworkModel = new ArtworksModel();
        $artworks = $artworkModel->getAllArtworks();
        $productsModel = new ProductsModel();
        $lines = $productsModel->getAllLines();
        $title = $artworkModel->getOneArtworkSpecifie();
        $specifies = $artworkModel->getAllEpisodesByArtworksId();
        $artworkStreams = $artworkModel->getAllArtworksAvailable($_GET['artworkId']);
        return [
            "specifies" => $specifies,
            "artworkStreams" => $artworkStreams,
            "title" => $title,
            "lines" => $lines,
            "artworks" => $artworks
        ];
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
    }
}
