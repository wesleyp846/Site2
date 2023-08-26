<?php //padrão para informar que o documento está codificado em PHP

//Pegando os dados vindos do formulário
$nome = $_POST['nome'];    //em php quando se declara uma variável se usa o $nome_da_variavel, depois metodo post e o nome do campo la do formulário
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];

/*Fazendo a conexão com o DB
a variável coon é padrão pra conexão com db's depois nova conexão com mysqli
os parametros são NOME DO SERVIDOR, USUARIO, SENHA e NOME DO BANCO  */
$conn = new mysqli('localhost', 'root', '', 'formulario');

//testando a conexao com if, se a variável $conn retornar error o die  mata a conexão e exibe o erro depois de uma mensagem
if($conn->connect_error){
    die("falha ao se comunicar com o DB:" .$conn->connect_error);
}

