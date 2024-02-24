<?php
/**
 * This file contains the App/Controllers/Products.php class for the TLME Framework.
 * Based on work learned in the Udemy class "Write PHP Like a Pro: Build a
 * PHP MVC Framework From Scratch" taught by Dave Hollingworth.
 *
 * File information:
 * Project Name: TLME Framework
 * Module Name: App/Controllers
 * File Name: Products.php
 * File Author: Dave Hollingworth
 * Language: PHP 8.3
 *
 * File Copyright: 01/2024
 */
declare(strict_types=1);

namespace App\Controllers;

use App\Models\Product;
use Framework\Exceptions\PageNotFoundException;
use Framework\Controller;
use Framework\Response;

/**
 * Class Products
 *
 * This class represents the controller for managing products.
 *
 * @noinspection PhpUnused
 */
class Products extends Controller
{
    /**
     * Class constructor.
     *
     * @param Product $model The product object to be assigned to the class.
     * @return void
     */
    public function __construct(private readonly Product $model) {
    }

    public function index(): Response {
        $products = $this->model->findAll();
        return $this->view("Products/index.mvc.php", ["products" => $products, "total" => $this->model->getTotal()]);
    }

    /**
     * Displays a product based on the provided ID.
     *
     * @param string $id The ID of the product to display.
     * @return Response The response object.
     *
     * @noinspection PhpUnused
     */
    public function show(string $id): Response {
        $product = $this->getProduct($id);
        return $this->view("Products/show.mvc.php", ["product" => $product]);
    }

    /**
     * Edit a product.
     *
     * Retrieves the product with the specified ID and returns a Response object.
     *
     * @param string $id The ID of the product to be edited.
     * @return Response The Response object containing the view for editing the product.
     *
     * @noinspection PhpUnused
     */
    public function edit(string $id): Response {
        $product = $this->getProduct($id);
        return $this->view("Products/edit.mvc.php", ["product" => $product]);
    }

    /**
     * Get a product by its ID.
     *
     * @param string $id The ID of the product to retrieve.
     * @return array The product details.
     * @throws PageNotFoundException If the product is not found.
     *
     * @noinspection PhpUnused
     */
    private function getProduct(string $id): array {
        $product = $this->model->find($id);
        if ($product === false) {
            throw new PageNotFoundException("Product not found");
        }
        return $product;
    }

    /**
     * Create a new product.
     *
     * This method returns a response object with the view for creating a new product.
     *
     * @return Response The response object for rendering the "Products/new.mvc.php" view.
     *
     * @noinspection PhpUnused
     */
    public function new(): Response {
        return $this->view("Products/new.mvc.php");
    }

    public function create(): Response {
        $data = [
            "name" => $this->request->post["name"],
            "description" => empty($this->request->post["description"]) ? null : $this->request->post["description"]
        ];
        if ($this->model->insert($data)) {
            return $this->redirect("/products/{$this->model->getInsertID()}/show");
        } else {
            return $this->view("Products/new.mvc.php", ["errors" => $this->model->getErrors(), "product" => $data]);
        }
    }

    public function update(string $id): Response
    {
        $product = $this->getProduct($id);
        
        $product["name"] = $this->request->post["name"];
        $product["description"] = empty($this->request->post["description"]) ? null : $this->request->post["description"];

        if ($this->model->update($id, $product)) {

            return $this->redirect("/products/{$id}/show");

        } else {

            return $this->view("Products/edit.mvc.php", [
                "errors" => $this->model->getErrors(),
                "product" => $product
            ]);

        }
    }
    
    public function delete(string $id): Response
    {
        $product = $this->getProduct($id);

        return $this->view("Products/delete.mvc.php", [
            "product" => $product
        ]);
    }

    public function destroy(string $id): Response
    {
        $product = $this->getProduct($id);

        $this->model->delete($id);

        return $this->redirect("/products/index");
    }
}