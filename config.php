<?php

//configurações de credenciais
$server = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'formulario';

/*Fazendo a conexão com o DB
a variável coon é padrão pra conexão com db's depois nova conexão com mysqli
os parametros são NOME DO SERVIDOR, USUARIO, SENHA e NOME DO BANCO*/
$conn = new mysqli($server, $usuario, $senha, $banco);

//testando a conexao com if, se a variável $conn retornar error o die  mata a conexão e exibe o erro depois de uma mensagem
if($conn->connect_error){
    die("falha ao se comunicar com o DB:" .$conn->connect_error);
}

?>