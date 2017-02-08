<?php 
if (isset($_GET['m'])) {
    $message = base64_decode($_GET['m']);
} else {
    header('Location: ../index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Error</title>

    <link rel="stylesheet" href="../assets/milligram/dist/milligram.min.css">
    <link rel="stylesheet" href="../assets/normalize.css/normalize.css">
    <link rel="stylesheet" href="../css/style.css">

    <script src="assets/jquery/dist/jquery.min.js"></script>
</head>
<body>

<main class="container">
    <div class="row">
        <div class="column">
            <h1>Error</h1>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="column">
            <blockquote>
                <p><?php echo $message; ?></p>
            </blockquote>
        </div>
    </div>

    <div class="row">
        <div class="column text-center">
            <a class="button" href="../index.php">Regresar a generar una nueva orden</a>
        </div>
    </div>
</main>
    
</body>
</html>