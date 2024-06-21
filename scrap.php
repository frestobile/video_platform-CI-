<?php
$dsn = 'mysql:host=127.0.0.1;dbname=db_vis';
$username = 'root';
$password = '';

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Get the ID from the URL parameter
$id = isset($_GET['id']) ? $_GET['id'] : 3;

if ($id === null) {
    die("ID parameter is missing.");
}

// Prepare and execute the SQL query
$sql = "SELECT video_url, video_serial FROM vis_videos WHERE video_uploaded = :id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':id', $id, PDO::PARAM_INT);

try {
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
}

if (empty($data)) {
    die("No data found for the given ID.");
}
foreach ($data as $item) {
    if ($item['video_url'] != NULL) {
        $videoUrl = "https://cdn.jwplayer.com/videos/".$item["video_url"]."-ONDbyjfZ.mp4";
        $image_url = "https://cdn.jwplayer.com/thumbs/".$item["video_url"]."-1280.jpg";
        $v_saveTo = "./videos/".$item["video_serial"].$item["video_url"].".mp4";
        $i_saveTo = "./thumbnails/".$item["video_serial"]."-1280.jpg";
        downloadFile($image_url, $i_saveTo);
        downloadFile($videoUrl, $v_saveTo);
    
        $video_url = $item["video_serial"].$item["video_url"].".mp4";
        $video_serial = $item["video_serial"];
    
        $update_sql = "UPDATE vis_videos SET video_url = :video_url WHERE video_serial = :video_serial";
        $stmt = $pdo->prepare($update_sql);
        $stmt->bindParam(':video_url', $video_url, PDO::PARAM_STR_CHAR);
        $stmt->bindParam(':video_serial', $video_serial, PDO::PARAM_STR_CHAR);
    
        $stmt->execute();
    }
    
}

function downloadFile($url, $saveTo) {
    // Initialize cURL session
    $ch = curl_init($url);
    
    // Set cURL options
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return the transfer as a string
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // Follow redirects

    // Execute cURL session
    $fileData = curl_exec($ch);

    // Check for cURL errors
    if (curl_errno($ch)) {
        echo 'Error downloading ' . $url . ': ' . curl_error($ch) . PHP_EOL;
        return false;
    }

    // Close cURL session
    curl_close($ch);

    // Save the file data to the specified path
    if (file_put_contents($saveTo, $fileData)) {
        echo "File successfully downloaded to " . $saveTo . PHP_EOL;
        return true;
    } else {
        echo "Failed to save the file to " . $saveTo . PHP_EOL;
        return false;
    }
}

?>