<?php

    // Connection with database
    include('../../mysql/connect.php');

    header("Content-Type: application/json");

    $str_json = json_decode($_POST['json_string']);

    $nome_cliente = $str_json->{'nome_cliente'};
    $apelido = $str_json->{'apelido'};
    $cpf = $str_json->{'cpf'};
    $email = $str_json->{'email'};
    $telefone = $str_json->{'telefone'};
    $facebook = $str_json->{'facebook'};
    $endereco = $str_json->{'endereco'};
    $cidade = $str_json->{'cidade'};
    $estado = $str_json->{'estado'};
    $detalhes_cliente = $str_json->{'detalhes_cliente'};
    $equipamento = $str_json->{'equipamento'};
    $nome_atendente = $str_json->{'nome_atendente'};
    $inicio = $str_json->{'inicio'};
    $nome_tecnico = $str_json->{'nome_tecnico'};
    $horas = $str_json->{'horas'};
    $final = $str_json->{'final'};
    $descricao_tecnico = $str_json->{'descricao_tecnico'};
    $valor = $str_json->{'valor_total'};
    $status = $str_json->{'status'};
    

    // $cliente = "INSERT INTO cliente (nome_cliente, apelido_cliente, cpf_cliente, descricao_cliente, equipamento_cliente, data_registro)
    // VALUES ('$nome_cliente', '$apelido', '$cpf', '$detalhes_cliente', '$equipamento', NOW()"; // <- ID CONTATO, ID ENDERECO, ID SERVICO

    $contato_cliente = "INSERT INTO contato_cliente (email_contato, numero_contato, facebook_contato, data_registro)
    VALUES ('$email', '$telefone', '$facebook', NOW())";

    if (mysqli_query($database, $contato_cliente)) {
        echo "New record created successfully";
    }

    $endereco_cliente = "INSERT INTO endereco_cliente (endereco, cidade_endereco, estado_endereco, data_registro)
    VALUES ('$endereco', '$cidade', '$estado', NOW())";

    if (mysqli_query($database, $endereco_cliente)) {
        echo "New record created successfully";
    }







    // $servico_cliente = "INSERT INTO servico_cliente (atendente_servico, inicio_servico, final_servico, valor_servico, status_servico, dara_registro)
    // VALUES ('$nome_atendente', '$inicio', '$final', '$valor', '$status' NOW())"; // <- ID TECNICO

    // $tecnico_servico = "INSERT INTO tecnico_servico (nome_tecnico, descricao_tecnico, horas_tecnico, data_registro)
    // VALUES ('$nome_tecnico', '$descricao_tecnico', '$horas', NOW())";



?>