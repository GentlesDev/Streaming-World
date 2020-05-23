<?php

class SeasonController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {

        $artworkModel = new ArtworksModel();
        $productsModel = new ProductsModel();
        $artworks = $artworkModel->getAllArtworks();
        $seasons = $artworkModel->getAllSeasons();
        $lines = $productsModel->getAllLines();
        $artworkStreams = $artworkModel->getAllArtworksAvailable();
        return [
            "artworkStreams" => $artworkStreams,
            'lines' => $lines,
            "seasons" => $seasons,
            "artworks" => $artworks
        ];
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
    }
}
