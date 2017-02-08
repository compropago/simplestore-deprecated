<?php 
if (isset($_GET['id'])) {
    $cpid = $_GET['id'];
} else {
    $message = base64_encode('No se reconocio el ID generado.');
    header('Location: error.php?m='.$message);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Success</title>

    <link rel="stylesheet" href="../assets/normalize.css/normalize.css">
    <link rel="stylesheet" href="../assets/milligram/dist/milligram.min.css">
    <link rel="stylesheet" href="../css/style.css">

    <script src="assets/jquery/dist/jquery.min.js"></script>
</head>
<body>

<main class="container">
    <div class="row">
        <div class="column">
            <h1>Orden generada con exito</h1>
            <hr>
        </div>
    </div>

    <div class="row">
        <div class="column">
            <blockquote>
                <div class="compropagoDivFrame" id="compropagodContainer" style="width: 100%;">
                    <iframe style="width: 100%;"
                        id="compropagodFrame"
                        src="https://www.compropago.com/comprobante/?confirmation_id=<?php echo $cpid; ?>"
                        frameborder="0"
                        scrolling="yes"> </iframe>
                </div>
                <script type="text/javascript">
                    function resizeIframe() {
                        var container=document.getElementById("compropagodContainer");
                        var iframe=document.getElementById("compropagodFrame");
                        if(iframe && container){
                            var ratio=585/811;
                            var width=container.offsetWidth;
                            var height=(width/ratio);
                            if(height>937){ height=937;}
                            iframe.style.width=width + 'px';
                            iframe.style.height=height + 'px';
                        }
                    }
                    window.onload = function(event) {
                        resizeIframe();
                    };
                    window.onresize = function(event) {
                        resizeIframe();
                    };
                </script>
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