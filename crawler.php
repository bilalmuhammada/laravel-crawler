<?php

require __DIR__ . '/vendor/autoload.php';

use GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

$url = 'https://sandbox.oxylabs.io/products';

$client = new Client([
    'verify' => false,
]);

$response = $client->get($url);
$html = (string) $response->getBody();

$crawler = new Crawler($html);

$products = [];

$crawler->filter('.product-card')->each(function (Crawler $node) use (&$products) {
    $title = $node->filter('.title')->count() ? $node->filter('.title')->text() : '';
    $price = $node->filter('.price-wrapper')->count() ? $node->filter('.price-wrapper')->text() : '';
    $image_url = $node->filter('img')->count() ? $node->filter('img')->attr('src') : '';
    $description = $node->filter('.description')->count() ? $node->filter('.description')->text() : '';
    $categoryRaw = $node->filter('.category')->count() ? $node->filter('.category')->text() : '';

    // Clean category: remove CSS-looking junk from start
    // Example: ".css-1pewyd6{...}Action Adventure Fantasy"
    $category = preg_replace('/^\.[^{]+\{[^}]+\}/', '', $categoryRaw);
    $category = trim($category);
    
    $products[] = [
        'title' => trim($title),
        'price' => trim($price),
        'image_url' => $image_url,
        'description' => trim($description),
        'category' => $category,
    ];
});

// Encode as an array of product objects, no wrapping 'products' key
$jsonData = json_encode($products, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);

// Save JSON to storage path — ensure directory exists
$storagePath = __DIR__ . '/storage/app/public';
if (!is_dir($storagePath)) {
    mkdir($storagePath, 0777, true);
}

file_put_contents($storagePath . '/products.json', $jsonData);

echo "Products JSON saved successfully!\n";
