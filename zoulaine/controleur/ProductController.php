<?php
require_once '../modele/ProductModel.php';
class ProductController {
    
    public function showAllProducts() {
        $model = new ProductModel();

        // Retrieve filters from the GET request
        $filters = [
            'name' => $_GET['name'] ?? null,
            'category' => $_GET['category'] ?? null
        ];

        // Fetch products and categories
        $products = $model->getProducts($filters);
        $categories = $model->getCategories();


        // Inclusion de la vue
        include '../Vue/products/productList.php';
    }
   
}