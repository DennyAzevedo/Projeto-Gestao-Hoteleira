<?php
if(empty($_GET['cpf'])){
    header("Location: ../index.php");
}
//puxando os arquivos conexao e classe hospede
require_once 'conexao.php';
require_once 'hospede.class.php';


//estanciando o obj hospede 
$hospede = new Hospede($pdo);

//pegando o CPF do ajax
$CPF = intval($_GET['cpf']);

//verificando se o CPF está cadastrado no banco de dados
if($hospede->existeCPF($CPF)){
    $retorno['existe'] = true;
    $retorno['mensagem'] = "CPF esta cadastrado no banco de dados!";
    echo json_encode($retorno);
}else{
    $retorno['existe'] = false;
    $retorno['mensagem'] = "CPF nao esta cadastrado no banco de dados!";
    echo json_encode($retorno);
}




