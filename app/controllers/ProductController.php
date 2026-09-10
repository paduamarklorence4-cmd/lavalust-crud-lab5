<?php
defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class ProductController extends Controller
{
    public function index()
    {
        $productModel = $this->call->model('ProductModel');
        $data['products'] = $productModel->all();
        $this->call->view('products_view', $data);
    }

    public function create()
    {
        if ($this->io->method() === 'post') {
            $productModel = $this->call->model('ProductModel');
            $productModel->insert([
                'product_name' => $this->io->post('product_name'),
                'description'  => $this->io->post('description'),
                'price'        => $this->io->post('price'),
                'quantity'     => $this->io->post('quantity'),
            ]);
            redirect('products');
            return;
        }
        $this->call->view('product_create_view');
    }

    public function edit($id)
    {
        $productModel = $this->call->model('ProductModel');
        $product = $productModel->find($id);

        if (!$product) {
            redirect('products');
            return;
        }

        if ($this->io->method() === 'post') {
            $productModel->update($id, [
                'product_name' => $this->io->post('product_name'),
                'description'  => $this->io->post('description'),
                'price'        => $this->io->post('price'),
                'quantity'     => $this->io->post('quantity'),
            ]);
            redirect('products');
            return;
        }

        $data['product'] = $product;
        $this->call->view('product_edit_view', $data);
    }

    public function delete($id)
    {
        $productModel = $this->call->model('ProductModel');
        $productModel->delete($id);
        redirect('products');
    }
}