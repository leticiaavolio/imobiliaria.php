<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_imobiliaria";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
            die("Conexão falhou: " . mysqli_connect_error());
    };
    $uf = mysqli_real_escape_string($conn, $_POST['uf']);
    $cidade = mysqli_real_escape_string($conn, $_POST['cidade']);
    $bairro = mysqli_real_escape_string($conn, $_POST['bairro']);
    $tipoLogradouro = mysqli_real_escape_string($conn, $_POST['tipoLogradouro']);
    $logradouro = mysqli_real_escape_string($conn, $_POST['logradouro']);
    $numero = mysqli_real_escape_string($conn, $_POST['numero']);
    $complemento = mysqli_real_escape_string($conn, $_POST['complemento']);
    $tipoImovel = mysqli_real_escape_string($conn, $_POST['tipoImovel']);
    $aluguelVenda = mysqli_real_escape_string($conn, $_POST['aluguelVenda']);
    $descricao = mysqli_real_escape_string($conn, $_POST['descricao']);
    $preco = mysqli_real_escape_string($conn, $_POST['preco']);
    
    
    $diretorio_imagens = "uploads/"; // Diretorio relativo
    $imagem_nome = basename($_FILES["imagem"]["name"]);
    $destino = $diretorio_imagens . $imagem_nome;
    
        // Inserir dados no banco de dados


        if (move_uploaded_file($_FILES["imagem"]["tmp_name"], $destino)) {
            // Inserir os dados no banco de dados
            $sql = "INSERT INTO imovel (uf, cidade, bairro, tipoLogradouro, logradouro, numero, complemento, tipoImovel, aluguelVenda,descricao, preco, imagem) VALUES ('$uf', '$cidade', '$bairro', '$tipoLogradouro', '$logradouro', '$numero', '$complemento', '$tipoImovel','$aluguelVenda','$descricao','$preco','$destino')";

            if (mysqli_query($conn, $sql)) {
                echo "Imóvel cadastrado com sucesso!";
            } 
            else {
                echo "Erro ao cadastrar o Imóvel: " . mysqli_error($conn);
            }
        }else {
            echo "Erro ao fazer upload da imagem.";
        }
    // Fechar conexão com o banco de dados
    mysqli_close($conn);
}
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Imobiliaria Club</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Koulen&family=Marvel:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
  </head>
  <body class="cadBody">
    <h1 class="titulo">Imobiliaria Club</h1>

    <?php 
    include 'cabecalho.php';
    ?>

    <h1>Cadastro de Imovel</h1>

    <form method="POST" enctype="multipart/form-data">
        <label for="uf">UF</label>
        <input type="text" id="uf" name="uf" required>
        <label for="cidade">Cidade</label>
        <input type="text" id="cidade" name="cidade" required>
        <label for="bairro">Bairro</label>
        <input type="text" id="bairro" name="bairro" required>
        <label for="tipoLogradouro">Tipo de Logradouro</label>
        <input type="text" id="tipoLogradouro" name="tipoLogradouro" required>
        <label for="logradouro">Logradouro</label>
        <input type="text" id="logradouro" name="logradouro" required>
        <label for="numero">Número</label>
        <input type="number" id="numero" name="numero" required>
        <label for="complemento">Complemento</label>
        <input type="text" id="complemento" name="complemento">
        <label for="tipoImovel">Tipo de Imóvel</label>
        <input type="text" id="tipoImovel" name="tipoImovel" required>
        <label for="selecionar">Selecionar</label>
        <select id="aluguelVenda" name="aluguelVenda" required>
            <option value="Venda">Venda</option>
            <option value="Aluguel">Aluguel</option>
        </select>
        <label for="descricao">Descrição</label>
        <input type="text" id="descricao" name="descricao" required>
        <label for="preco">Preço</label>
        <input type="number" id="preco" name="preco" required>
        <label for="imagem">Imagem</label>
        <input type="file" id="imagem" name="imagem" required>
        <button type="submit" class="btn btn-success">Cadastrar</button>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  </body>
</html>