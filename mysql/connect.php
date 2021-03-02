<?php
    $host = "localhost";
    $user = "root";
    $password = "";
    $bd = "geradoros";

    $database = new mysqli($host, $user, $password, $bd);

    if ($database->connect_error) {
        die("A conexão falhou! Erro: " . $database->connect_error);
    }


    $table_adminstrador = "CREATE TABLE adminstrador (
        id_adminstrador int not null auto_increment,
        nome_adminstrador varchar(120) not null,
        user_adminstrador varchar(32) not null,
        email_adminstrador varchar(120) not null,
        password_adminstrador varchar(32) not null, 
        register_adminstrador date,
        primary key (id_adminstrador)
    ) default charset = utf8";

    if ($database->query($table_adminstrador) === TRUE);


    $table_log = "CREATE TABLE eventLog (
        id_log int not null auto_increment,
        author_log varchar(32) not null,
        event_log varchar(255) default 'Não registrado!',
        ip_log varchar(100) default 'Não registrado!',
        local_log varchar(255) default 'Não registrado!',
        register_log date,
        primary key (id_log)
    ) default charset = utf8";

    if ($database->query($table_log) === TRUE);


    $table_client = "CREATE TABLE cliente (
        id_cliente int not null auto_increment,
        nome_cliente varchar(90) not null,
        apelido_cliente varchar(30) default 'Não registrado!',
        cpf_cliente varchar(59) default 'Não registrado!',
        descricao_cliente text,
        equipamento_cliente varchar(100) default 'Não registrado!',
        data_registro date,
        id_contato int,
        foreign key (id_contato) references contato_cliente(id_contato),
        id_endereco int,
        foreign key (id_endereco) references endereco_cliente(id_endereco),
        id_servico int,
        foreign key (id_servico) references servico_cliente(id_servico),
        primary key (id_cliente)
    ) default charset = utf8";

    if ($database->query($table_client) === TRUE);


    $table_contact = "CREATE TABLE contato_cliente (
        id_contato int not null auto_increment,
        email_contato varchar(100) default 'Não registrado!',
        numero_contato varchar(50) not null,
        facebook_contato varchar(50) default 'Não registrado!',
        data_registro date,
        primary key (id_contato)
    ) default charset = utf8";

    if ($database->query($table_contact) === TRUE);


    $table_address = "CREATE TABLE endereco_cliente (
        id_endereco int not null auto_increment,
        endereco varchar(150) default 'Não registrado!',
        cidade_endereco varchar(30) default 'Não registrado!',
        estado_endereco varchar(30) default 'Não registrado!',
        data_registro date,
        primary key (id_endereco)
    ) default charset = utf8";

    if ($database->query($table_address) === TRUE);


    $table_service = "CREATE TABLE servico_cliente (
        id_servico int not null auto_increment,
        atendente_servico varchar(90) not null,
        inicio_servico date,
        final_servico date,
        valor_servico varchar(100) default 'Não registrado!',
        status_servico varchar(40) default 'Não registrado!',
        data_registro date,
        id_tecnico int,
        foreign key (id_tecnico) references tecnico_servico(id_tecnico),
        primary key (id_servico)
    ) default charset = utf8";

    if ($database->query($table_service) === TRUE);


    $table_tecnico = "CREATE TABLE tecnico_servico (
        id_tecnico int not null auto_increment,
        nome_tecnico varchar(90) not null,
        descricao_tecnico text,
        horas_tecnico varchar(40) default 'Não registrado!',
        data_registro date,
        primary key (id_tecnico)
    ) default charset = utf8";

    if ($database->query($table_tecnico) === TRUE);
  

    $table_products = "CREATE TABLE produtos_servico (
        id_produtos int not null auto_increment,
        nome_produtos varchar(100) not null,
        qnt_produtos int not null,
        valor_produtos varchar(100) default 'Não registrado!',
        data_registro date,
        id_servico int,
        foreign key (id_servico) references servico_cliente(id_servico),
        primary key (id_produtos)
    ) default charset = utf8";

    if ($database->query($table_products) === TRUE);


?>