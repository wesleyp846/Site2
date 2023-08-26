<?php 
// É como o import do Python
require_once 'config.php';

$senhaSecreta = "123";

//SE EXISTIR UM METODO DE REQUISIÇÃO QUE FOR IGUAL A POST
if($_SERVER["REQUEST_METHOD"] == "POST"){
    //valor senha que ta vindo do formulário la embaixo no html
    $senhadigitada = $_POST['senha'];
    
    //Se digitou a senha correta
    if($senhadigitada === $senhaSecreta){
        $sql = "SELECT * FROM mensagens";
        $result = $conn->query($sql);
    }else{
        echo "<h1>senha incorreta</h1>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ver menssagens</title>
    <link rel="stylesheet" href="./formulario.css">
</head>
<body>
<div>
    <!-- quando não se envia o ACTION a lugar nunhum ele entende que o metodo post é pra mesma página -->
    <form method="post"> 
        <label for="senha">Senha:</label>
        <input type="password" name="senha" placeholder="Digite a senha segura" required>
        <button type="submit">Enviar</button>
    </form>
</div>
<div class="mendb">
    <!-- isset quer diser se existe o que esta no parenteses e numero de linha maior que zero -->
    <?php if(isset($result) && $result->num_rows >0) : ?>
        <!-- essa parte so aparece se o if de cima for testado verdadeiro -->
        <h2>Mensagens</h2>
        <ul>
            <!-- laço pra trazer as informações de cada linha existente na tabela -->
            <?php while($row = $result->fetch_assoc()) :?>
                <li>
                    <strong>Nome: </strong> <?php echo $row["nome"]; ?> <br>
                    <strong>Email: </strong> <?php echo $row["email"]; ?> <br>
                    <strong>Mensagem: </strong> <?php echo $row["mensagem"]; ?> <br>
                    <strong>Data e Hora: </strong> <?php echo $row["data"]." as ".$row["hora"]; ?><br>
                </li>
                <br>
            <?php endwhile; ?>
        </ul>
        <?php else : ?>
            <p>Nenhuma mensagem.</p>
    <?php endif; ?>
</div>
</body>
</html>