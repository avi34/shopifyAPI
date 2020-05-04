// Get our helper functions
require_once("inc/functions.php");

// Set variables for our request
$shop = "demo-shop";
$token = "SWplI7gKAckAlF9QfAvv9yrI3grYsSkw";
$query = array(
	"Content-type" => "application/json" // Tell Shopify that we're expecting a response in JSON format
);

// Run API call to get order list
$products = shopify_call($token, $shop, "/admin/orders.json", array(), 'GET');
