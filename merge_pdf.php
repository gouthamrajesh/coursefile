<?php
require_once 'vendor/autoload.php';

use setasign\Fpdi\Fpdi;

// Folder paths
$uploadsFolder = 'uploads/files';
$finalFolder = $uploadsFolder . '/final';

// List the PDF files in the uploads folder
$pdfFiles = glob($uploadsFolder . '/*.pdf');

// Create a new PDF object
$mergedPdf = new Fpdi();

// Iterate through the PDF files and merge them
foreach ($pdfFiles as $pdfFile) {
    // Get the number of pages in the PDF
    $pageCount = $mergedPdf->setSourceFile($pdfFile);

    // Iterate through each page and add it to the merged PDF
    for ($pageNumber = 1; $pageNumber <= $pageCount; $pageNumber++) {
        $templateId = $mergedPdf->importPage($pageNumber);
        $mergedPdf->AddPage();
        $mergedPdf->useTemplate($templateId);
    }
}

// Create the final folder if it doesn't exist
if (!file_exists($finalFolder)) {
    mkdir($finalFolder, 0777, true);
}

// Generate the output file name and path
$outputPath = $finalFolder . '/merged.pdf';

// Check if the form was submitted
if (isset($_POST['merge'])) {
    // Save the merged PDF to the output file
    $mergedPdf->Output($outputPath, 'F');

    // Print a success message
    echo "PDF files merged successfully. Merged PDF saved as $outputPath";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Merge PDF Files</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            text-align: center;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4caf50;
            color: #fff;
            border: none;
            cursor: pointer;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        button:hover {
            background-color: #45a049;
        }

        p {
            text-align: center;
            margin-top: 20px;
        }

        a {
            text-decoration: none;
            color: #0066cc;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Merge PDF Files</h1>

        <!-- Merge button and form -->
        <form method="POST" action="">
            <button type="submit" name="merge">Merge PDFs and Save</button>
        </form>

        <!-- Display download link after merging -->
        <?php if (isset($_POST['merge'])): ?>
            <p><a href="<?php echo $outputPath; ?>">Download the merged PDF</a></p>
        <?php endif; ?>
    </div>
</body>
</html>
