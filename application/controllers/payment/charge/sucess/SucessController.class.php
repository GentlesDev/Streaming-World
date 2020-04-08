<?php

class SucessController
{
    public function httpGetMethod(Http $http, array $queryFields)
    {
       if(empty($_SESSION) == true) {
         $http->redirectTo('/');
       }
       $artworkModel = new ArtworksModel();
       $artworks = $artworkModel->getAllArtworks();

       $user = substr($_GET['order'], -1);
       // var_dump($user);
       $orderModel = new OrderModel();
       $orderModel->sucessTime($user);

       $productsModel = new ProductsModel();
       $lines = $productsModel->getAllLines();

       return[
         'lines'=>$lines,
         "user"=>$user,
         "artworks"=>$artworks
       ];
    }

    public function httpPostMethod(Http $http, array $formFields)
    {


    }
}
