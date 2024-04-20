<?php

namespace App\Controllers;

class PublicController
{
    public function index()
    {
        echo 'test';
    }

    public function test()
    {
        // Extract the file name from the URL
        $file = $_GET['file'];

        // Define the path to the public directory
        $publicDir = __DIR__ . '/../../public/';

        // Check if the file exists
        if (file_exists($publicDir . $file)) {
            // Get the file extension
            $fileExtension = pathinfo($file, PATHINFO_EXTENSION);

            // Define the content type based on the file extension
            switch ($fileExtension) {
                case 'css':
                    $contentType = 'text/css';
                    break;
                case 'js':
                    $contentType = 'application/javascript';
                    break;
                case 'png':
                    $contentType = 'image/png';
                    break;
                case 'jpg':
                case 'jpeg':
                    $contentType = 'image/jpeg';
                    break;
                default:
                    $contentType = 'text/plain';
            }

            // Set the content type header
            header('Content-Type: ' . $contentType);

            // Output the file content
            readfile($publicDir . $file);
        } else {
            // Return a 404 status code
            http_response_code(404);
            echo 'File not found';
        }
    }
}
