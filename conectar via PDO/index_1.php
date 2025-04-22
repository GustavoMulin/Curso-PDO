<?php

// CONECTAR VIA PDO E CONTROLE DE ERROS

/*
Vamos começar por aprender como conectar a nossa aplicação à base de dados
importada no vídeo anterior.
*/

// 1. Definir as propiedades da ligação
$database = 'udemy_loja_online';
$username = 'root';
$password = '';

// Efetuar a ligaçaõ.
// Para isso vamos criar uma instância da classe PDO.
// Necessitamos de 3 pârametros: o DNS (data Source Name), onde vamos
// especificar, no mínimos, o host é o nome da base de dados
// O segundo parâmetro é o nome de usúario do MySQL e o terceiro, a password
// desse usuário
$ligacao = new PDO("mysql:host=localhost;dbname=$database", $username, $password);

// verificar se a ligação foi estabelecida corretamente
$estado = $ligacao->getAttribute(PDO::ATTR_CONNECTION_STATUS);
echo $estado;

/*
Como podemos ver, conseguimos fazer a ligação à base de dados e estamos
em condições de poder fazer as nossa queries.

É importante perceber que existem 3 etapas numa comunicação com a base de dados:
1. Conectar com a base de dados;
2. Comunicar com a base de dados;
3. Fechar a ligação para libertar recursos.

A ligação vai ficar aberta até à destruição do objeto PDO().
Para "desligar" a conexão, bastará destruir o objeto $ligacao
*/

$ligacao = null;

// Se não fechar a ligação de forma explícita, a ligação vai ser interrompida
// quando o nosso scripty chega ao fim da sua execução.