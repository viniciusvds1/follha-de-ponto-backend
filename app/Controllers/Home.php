<?php
namespace app\Controllers;


class Home
{
    public function index( $request, $response){
        $response->getBody()->write('Hello');

        return $response;
    }
}