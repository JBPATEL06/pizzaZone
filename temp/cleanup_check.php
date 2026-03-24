<?php
$imagesDir = 'f:/xampp/htdocs/money/pizzaZone/pizzaZone/images/';
$projectDir = 'f:/xampp/htdocs/money/pizzaZone/pizzaZone/';

$allImageFiles = [];
$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($imagesDir));
foreach ($iterator as $file) {
    if ($file->isFile()) {
        $allImageFiles[] = [
            'name' => $file->getFilename(),
            'path' => $file->getPathname()
        ];
    }
}

$codeFiles = [];
$allowedExts = ['php', 'css', 'js', 'sql'];
$di = new RecursiveDirectoryIterator($projectDir);
foreach (new RecursiveIteratorIterator($di) as $filename => $file) {
    if ($file->isFile()) {
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if (in_array($ext, $allowedExts)) {
            if (strpos($filename, $imagesDir) === false && strpos($filename, '.git') === false) {
                $codeFiles[] = $filename;
            }
        }
    }
}

$allCodeContent = '';
foreach ($codeFiles as $cf) {
    $allCodeContent .= file_get_contents($cf);
}

$deletedCount = 0;
foreach ($allImageFiles as $imgData) {
    $imgName = $imgData['name'];
    $imgPath = $imgData['path'];
    if (strpos($allCodeContent, $imgName) === false) {
        if (unlink($imgPath)) {
            echo "Deleted: $imgName\n";
            $deletedCount++;
        } else {
            echo "Failed to delete: $imgName\n";
        }
    }
}

echo "--- COMPLETED ---\n";
echo "Total Files Deleted: $deletedCount\n";
?>
