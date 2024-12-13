<?php

// Path to the images subdirectory
$folderPath = __DIR__ . '/' . $_GET['key'];


// Initialize an empty array to store image filenames with extensions
$imageFilenamesWithExtensions = array();

// Check if the directory exists
if (is_dir($folderPath)) {
    // Get all files in the folder
    $files = scandir($folderPath);

    // Loop through each file
    foreach ($files as $file) {
        // Skip if the file is the current directory (.) or parent directory (..)
        if ($file == '.' || $file == '..') {
            continue;
        }
        
        // Create full path to the image file
        $filePath = $folderPath . '/' . $file;
        
        // Check if the file is an image
        if (is_file($filePath) && getimagesize($filePath)) {
            // If it's an image, add the filename with extension to the array
            $imageFilenamesWithExtensions[] = $file;
        }
    }
}

// Convert the array to JSON
$jsonArray = json_encode($imageFilenamesWithExtensions);

// Output the JSON array
echo $jsonArray;

?>
