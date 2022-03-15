<?php

// namespace App\Controllers;

// use CodeIgniter\Controller;

// class ControleAcesso extends Controller
// {
//     public function index()
//     {
//         //
//     }
// }

//https://www.youtube.com/watch?v=3fb8zsOhjdo
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class ControleAcesso implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Do something here
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}