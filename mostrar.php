<?php 
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "db_imobiliaria";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Erro ao conectar ao banco de dados: " . mysqli_connect_error());
    }
    $sql ="SELECT * FROM imovel";
    $result = mysqli_query($conn,$sql);

?>
<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Listar Imóveis</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Koulen&family=Marvel:ital,wght@0,400;0,700;1,400;1,700&display=swap" rel="stylesheet">
  </head>
  <body>
    <h1 class="titulo">Imobiliaria Club</h1>
    <?php include 'cabecalho.php'?>
    <h1>Listar Imoveis</h1>
    <div class='container'>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>UF</th>
                <th>Cidade</th>
                <th>Bairro</th>
                <th>Tipo Logradouro</th>
                <th>Logradouro</th>
                <th>Número</th>
                <th>Complemento</th>
                <th>Tipo de Imóvel</th>
                <th>Venda ou Aluguel</th>
                <th>Descrição</th>
                <th>Preço</th>
                <th>Imagem</th>
            </tr>
        </thead>
        <?php 
        if(mysqli_num_rows($result)>0){
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".htmlspecialchars($row["uf"])."</td>";
                echo "<td>".htmlspecialchars($row["cidade"])."</td>";
                echo "<td>".htmlspecialchars($row["bairro"])."</td>";
                echo "<td>".htmlspecialchars($row["tipoLogradouro"])."</td>";
                echo "<td>".htmlspecialchars($row["logradouro"])."</td>";
                echo "<td>".htmlspecialchars($row["numero"])."</td>";
                echo "<td>".htmlspecialchars($row["complemento"])."</td>";
                echo "<td>".htmlspecialchars($row["tipoImovel"])."</td>";
                echo "<td>".($row["aluguelVenda"]? "Aluguel" : "Venda")."</td>";
                echo "<td>".htmlspecialchars($row["preco"])."</td>";
                echo "<td>".htmlspecialchars($row["descricao"])."</td>";
                echo "<td><img src='".htmlspecialchars($row["imagem"])."'alt='Imagem do Imóvel' width='100'</td>";
                echo "</tr>";
            }
        }else {
            echo "<tr><td colspan = '4'> Nenhum livro encontrado</td></tr>";
        }
        ?>
    </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
  </body>
</html>
<?php 
mysqli_close($conn)
?>