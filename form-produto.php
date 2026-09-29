<!DOCTYPE html>
<html>
<body>
<h2>Cadastro de Produto</h2>
<form action="form-produto2.php" method="post" enctype="multipart/form-data">
Nome: <input type="text" name="name"><br>
Preço: <input type="number" name="price" step="0.01" min="0"><br>
Selecione imagem do produto para upload:
  <input type="file" name="fileToUpload" id="fileToUpload">
  <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>