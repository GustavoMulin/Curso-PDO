<?php

// OBTER DADOS EM DIFERENTES FORMATOS

/*

Por exemplo, podemos definir uma classe Produtos,
cujas propriedades são as mesmas da colunas das tabelas.
O resultado pode ser algo do tipo:
*/

class Produto {
    public $id;
    public $produto;
    public $preco_unidade;
}

$database = 'udemy_loja_online';
$username = 'root';

$ligacao = new PDO("mysql:host=localhost;dbname=$database", $username);

$resultado = $ligacao->query("SELECT * FROM produtos")->fetchAll(PDO::FETCH_CLASS, 'Produto');

$ligacao = null;

echo '<pre>';
print_r($resultado);

/*
Repara como agora os resultados vêm em forma de Produto Object.
O carregamento dos dados para a Classe é feito com a instanciação
implícita de um objeto. Sabemos que uma instanciação permite a execução
automática do método __contruct.
vejamos o próximo exemplo.
*/