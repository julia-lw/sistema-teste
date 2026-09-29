<?php
$target_dir = "uploads/";
$uploadOk = 1;

// verifica se o formulário foi submetido via POST e se o arquivo foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["fileToUpload"]) && $_FILES["fileToUpload"]["error"] == UPLOAD_ERR_OK) {

    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // checa se o arquivo é uma imagem real ou falsa
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        echo "File is an image - " . $check["mime"] . ".<br>";
        $uploadOk = 1;
    } else {
        echo "File is not an image.<br>";
        $uploadOk = 0;
    }

    // checa se o arquivo já existe
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.<br>";
        $uploadOk = 0;
    }

    // checa o tamanho do arquivo
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.<br>";
        $uploadOk = 0;
    }

    // aceita apenas certos formatos de arquivo
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.<br>";
        $uploadOk = 0;
    }

    // checa se houve algum erro que impede o upload
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.<br>";
    // se está tudo ok, tenta fazer o upload do arquivo
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "O produto " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " foi enviado com sucesso.<br>";
        } else {
            echo "Sorry, there was an error uploading your file.<br>";
        }
    }

} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    echo "Nenhum arquivo foi selecionado ou ocorreu um erro no envio.";
}
?>
<html>
<body>
<h2>Upload de Produto:</h2>
<form action="form-usuario2.php" method="post">
Nome: <?php echo $_POST["name"]; ?><br>
Preço: <?php echo $_POST["price"]; ?><br>
Foto: <img src="<?php echo $caminhoImagem; ?>">
</form>

</body>
</html>