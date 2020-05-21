<?php

class UpdateController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {

        if (empty($_SESSION) == true || $_SESSION['role'] !== "admin") {
            $http->redirectTo('/');
        }
        $artworkModel = new ArtworksModel();
        $oeuvre = $artworkModel->getOneSpecifie($_GET['specifie']);
        $artworks = $artworkModel->getAllArtworks();
        $productsModel = new ProductsModel();
        $lines = $productsModel->getAllLines();
        $artworkStreams = $artworkModel->getAllArtworksAvailable();


        // var_dump($figurines);
        return [
            "artworkStreams" => $artworkStreams,
            'lines' => $lines,
            "oeuvre" => $oeuvre,
            "artworks" => $artworks
        ];
    }

    public function httpPostMethod(Http $http, array $formFields)
    {
        $artworkModel = new ArtworksModel();
        $artworks = $artworkModel->getAllArtworks();
        $oeuvre = $artworkModel->getOneSpecifie($_POST['specifie']);
        $artworkModel->updateSpecifie($_POST, $_FILES);
        $productsModel = new ProductsModel();
        $lines = $productsModel->getAllLines();
        $artworkStreams = $artworkModel->getAllArtworksAvailable();
        // var_dump($_POST);
        // var_dump($_FILES);
        return [
            "artworkStreams" => $artworkStreams,
            'lines' => $lines,
            "oeuvre" => $oeuvre,
            "artworks" => $artworks,
        ];
    }
}
