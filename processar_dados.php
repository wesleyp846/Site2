<?php //padrão para informar que o documento está codificado em PHP
// É como o import do Python
require_once 'config.php';

//Pegando os dados vindos do formulário
$nome = $_POST['nome'];    //em php quando se declara uma variável se usa o $nome_da_variavel, depois metodo post e o nome do campo la do formulário
$email = $_POST['email'];
$mensagem = $_POST['mensagem'];
$data_atual = date('d/m/Y');
$hora_atual = date('H:i:s');

/* todo esse trecho foi transferido posteriormente para um arquivo de configuração
//configurações de credenciais
$server = 'localhost';
$usuario = 'root';
$senha = '';
$banco = 'formulario';

//Fazendo a conexão com o DB
//a variável coon é padrão pra conexão com db's depois nova conexão com mysqli
//os parametros são NOME DO SERVIDOR, USUARIO, SENHA e NOME DO BANCO
$conn = new mysqli($server, $usuario, $senha, $banco);

//testando a conexao com if, se a variável $conn retornar error o die  mata a conexão e exibe o erro depois de uma mensagem
if($conn->connect_error){
    die("falha ao se comunicar com o DB:" .$conn->connect_error);
}
*/

//Variavel padrão para mandar o DB fazer alguma coisa, depois usa o metodo prepare pra ele preparar um comando nos parenteses linguagem sql
$smtp = $conn->prepare("INSERT INTO mensagens (nome, email ,mensagem ,data ,hora ) VALUES (?,?,?,?,?)");
//paremetro para diser o tipo de dados, todos os cin valores são strings SSSSS
$smtp->bind_param("sssss", $nome, $email, $mensagem, $data_atual, $hora_atual);

if($smtp->execute()){
    echo "Mensagem enviada com sucesso";
}else{
    echo "Erro ao enviar mensagem: ".$smtp->error;
}

$smtp->close();
$conn->close();

?>