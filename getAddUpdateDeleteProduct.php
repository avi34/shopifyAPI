<?php

// Get our helper functions
require_once("inc/functions.php");

// Set variables for our request
$shop = "demo-shop";
$token = "SWplI7gKAckAlF9QfAvv9yrI3grYsSkw";
$query = array(
	"Content-type" => "application/json" // Tell Shopify that we're expecting a response in JSON format
);

// Run API call to get products list
$products = shopify_call($token, $shop, "/admin/products.json", array(), 'GET');

// Convert product JSON information into an array
$products = json_decode($products['response'], TRUE);

// Get the ID of the first product
$product_id = $products['products'][0]['id'];

// Modify product data
$modify_data = array(
	"product" => array(
		"id" => $product_id,
		"title" => "My New Title"
	)
);

// Run API call to modify(update) the product
$modified_product = shopify_call($token, $shop, "/admin/products/" . $product_id . ".json", $modify_data, 'PUT');

$product_data = array(
			"product" => array(
				"title" => "My New Title",
				"body_html"=> "<strong>Good snowboard!</strong>",
				"variants"=> array(
						"option1"=> "First",
					        "price"=> "10.00",
					        "sku"=>"123"
					    ),
				"images"=> array(
						"src"=> "http://example.com/rails_logo.gif"
						)       
					)
		);
// echo "<pre>";print_r($product_data); exit;
// Run API call to add the product
$added_product = $this->shopify_call($token, $shop, "/admin/products.json", $product_data, 'POST');

// Storage response
$modified_product_response = $modified_product['response'];
