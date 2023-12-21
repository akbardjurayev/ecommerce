<?php

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Response;
class Prarser{
public function parseHtmlToJson()
{
    // Get HTML content from a URL (you can also use any other method to get HTML content)
    $htmlContent = Http::get('https://kun.uz')->body();

    // Create a DOMDocument instance
    $dom = new \DOMDocument;

    // Load HTML content into the DOMDocument
    libxml_use_internal_errors(true); // Ignore HTML errors
    $dom->loadHTML($htmlContent);
    libxml_clear_errors();

    // Create an associative array to store parsed data
    $parsedData = [];

    // Extract data from the DOMDocument (replace this with your own logic)
    // For example, extracting all anchor tags and their href attributes
    $links = $dom->getElementsByTagName('a');
    foreach ($links as $link) {
        $parsedData[] = [
            'text' => $link->nodeValue,
            'href' => $link->getAttribute('href'),
        ];
    }

    // Convert the associative array to JSON using Laravel's json helper
    $jsonResult = json_encode($parsedData);

    // Return the JSON response
    return Response::json($jsonResult);
}
}
