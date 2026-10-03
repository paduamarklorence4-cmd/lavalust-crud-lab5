<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ProductController extends Controller
{
    private $productModel;

    public function __construct()
    {
        parent::__construct();
        $this->call->library('api');
        $this->api->require_jwt(); // lahat ng product routes ay para sa naka-login lang
        $this->productModel = $this->call->model('ProductModel');
    }

    private function clean($input, $existing = [])
    {
        $data = array_merge($existing, array_intersect_key($input, array_flip(
            ['product_name', 'description', 'price', 'quantity']
        )));

        if (trim($data['product_name'] ?? '') === '') {
            $this->api->respond_error('product_name is required', 422);
        }
        if (!isset($data['price']) || !is_numeric($data['price']) || $data['price'] < 0) {
            $this->api->respond_error('price must be a number', 422);
        }
        if (!isset($data['quantity']) || filter_var($data['quantity'], FILTER_VALIDATE_INT) === false || $data['quantity'] < 0) {
            $this->api->respond_error('quantity must be a whole number', 422);
        }
        return [
            'product_name' => trim($data['product_name']),
            'description'  => $data['description'] ?? '',
            'price'        => $data['price'],
            'quantity'     => (int) $data['quantity'],
        ];
    }

    public function index()
    {
        $this->api->respond($this->productModel->all());
    }

    public function show($id)
    {
        $product = $this->productModel->find($id);
        if (!$product) {
            $this->api->respond_error('Product not found', 404);
        }
        $this->api->respond($product);
    }

    public function store()
    {
        $data = $this->clean($this->api->body());
        $this->productModel->insert($data);
        $this->api->respond(['message' => 'Product created'], 201);
    }

    public function update($id)
    {
        $product = $this->productModel->find($id);
        if (!$product) {
            $this->api->respond_error('Product not found', 404);
        }
        $data = $this->clean($this->api->body(), $product);
        $this->productModel->update($id, $data);
        $this->api->respond(['message' => 'Product updated']);
    }

    public function delete($id)
    {
        if (!$this->productModel->find($id)) {
            $this->api->respond_error('Product not found', 404);
        }
        $this->productModel->delete($id);
        $this->api->respond(['message' => 'Product deleted']);
    }
}