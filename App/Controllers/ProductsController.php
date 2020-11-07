<?php

namespace App\Controllers;

use App\Database\Repositories\ProductRepository;

class ProductsController {
    private $productsRepo;

    public function __construct() {
        $this->productsRepo = new ProductRepository();
    }

    public function index() {
        var_dump($this);
        $this->productsRepo->all();
    }
}