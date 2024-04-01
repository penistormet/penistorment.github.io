<?php
$directory = '.';
$audio_files = [];

// Check if directory exists
if (is_dir($directory)) {
    // Open directory
    if ($handle = opendir($directory)) {
        // Read directory
        while (($file = readdir($handle)) !== false) {
            // Exclude current directory and parent directory entries
            if ($file != "." && $file != ".." && preg_match('/\.(mp3|ogg|wav)$/i', $file)) {
                // Add audio files to array
                $audio_files[] = $file;
            }
        }
        closedir($handle);
    }
}

// Output JSON data
header('Content-Type: application/json');
echo json_encode($audio_files);
?>
