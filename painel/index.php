<?php
    session_start();

    if(isset($_SESSION['admin_logged'])) {

        // Include in data base
        include('../mysql/connect.php');

        // ID Admin Logged
        $id_admin = $_SESSION['id_admin'];

        // Select Data admin Logged
        $select_admin = "SELECT * FROM adminstrador WHERE id_adminstrador='$id_admin'";
        $result_admin = mysqli_query($database, $select_admin);
        $result_final_admin = mysqli_fetch_assoc($result_admin);

        // Button Exit 
        if(isset($_GET['exit'])) {
            session_destroy();
            header('Location: ../');
            exit();
        }

    } else {
        header('Location: ../');
        exit();
    }

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <!-- Meta Tags -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Title -->
    <title>Painel | Gerador de OS</title>

    <!-- Links to style documents -->
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/general.css">

    <!-- Link to import icons -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css"
        integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
</head>
<body>
    <!-- Wrapper -->
    <div class="wrapper" id="wrapper">

        <!-- Header -->
        <header class="header">
            <!-- Container Header -->
            <div class="container-header">
                <!-- Items Header -->
                <div class="items-header">
                    <div class="logo-text">
                        <span>Gerador OS</span>
                    </div>

                    <div class="user">
                        <i class="fas fa-user-circle" id="btn-open-user"></i>
                    </div>
                </div>
                <!-- End Items Header -->

                <!-- User Area -->
                <div class="user-area" id="user-area">
                    <!-- Container User Area -->
                    <div class="container-user">

                        <!-- Data -->
                        <div class="dados">

                            <!-- Name and User -->
                            <div class="name">
                                <h1><?php echo $result_final_admin['nome_adminstrador']; ?> <span>(Adminstrador)</span></h1>
                                <span><?php echo $result_final_admin['user_adminstrador']; ?></span>
                            </div>

                            <!-- Items with emails and change password -->
                            <div class="items">
                                <div class="item email">
                                    <span><?php echo $result_final_admin['email_adminstrador']; ?></span>
                                    <i class="fas fa-envelope"></i>
                                </div>
                                <div class="item password">
                                    <span>Alterar Senha</span>
                                    <i class="fas fa-key"></i>
                                </div>
                            </div>

                        </div>
                        <!-- End Data -->

                        <!-- Btn Exit -->
                        <div class="exit">
                            <a href="?exit">Finalizar Acesso</a>
                        </div>
                        <!-- End Btn Exit -->
                    </div>
                    <!-- End Container User Area -->
                </div>
                <!-- End User Area -->
            </div>
            <!-- End Container Header -->
        </header>
        <!-- End Header -->

        <!-- Main -->
        <div class="main">
            <!-- Container Main -->
            <div class="container-main">

                <!-- Content Area -->
                <div class="content-area">
                    <!-- Menu -->
                    <nav class="menu">
                        <ul>
                            <li>
                                <a class="selected-item" id="btn-home">
                                    Início
                                </a>
                            </li>
                            <li>
                                <a id="btn-create">
                                    Criação
                                </a>
                            </li>
                            <li>
                                <a id="btn-manage">
                                    Gerenciar
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <!-- End Menu -->

                    <!-- Containers -->
                    <div class="containers">

                        <!-- Home -->
                        <div class="home" id="home">

                            <!-- Center home -->
                            <div class="center-home">
                                <img src="../midia/solution.png" alt="Ícone de uma nuvem com uma luz!">
                                <h1>Crie documentos OS</h1>
                                <p>Clique no botão abaixo para abrir um menu de criação de documentos OS. </p>
                                <button>Criar Documento</button>
                            </div>
                            <!-- End Center home -->

                        </div>
                        <!-- End Home -->

                        <!-- Create -->
                        <div class="create" id="create">
                            <div class="text">
                                <h1>Criar Ordem de Serviço (OS)</h1>
                                <p>Insira todos os dados abaixo para criar uma Ordem de Serviço (OS).</p>
                            </div>

                            <form action="process/create.php" method="POST" id="form-create">
                                <div class="text-info">
                                    <h1 class="title-area">Pré Serviço</h1>
                                    <p>Essa área deve ser preencida antes da execução do serviço!</p>
                                </div>

                                <div class="data-client">

                                    <div class="data">
                                        <h1>Indentificação do cliente</h1>
                                        <input type="text" name="nome_cliente" placeholder="Nome completo*" value="Carlos Eduardo">
                                        <input type="text" name="apelido" placeholder="Apelido" value="Dudu">
                                        <input type="text" name="cpf" placeholder="Número de CPF*" value="15562626265">
                                    </div>

                                    <div class="data">
                                        <h1>Contato com o cliente</h1>
                                        <input type="text" name="email" placeholder="Endereço de E-mail" value="ucarlos1001@gmail.com">
                                        <input type="text" name="telefone" placeholder="Número de Telefone/Celular*" value="1929945292">
                                        <input type="text" name="facebook" placeholder="Facebook" value="ucarlos1001">
                                    </div>

                                    <div class="data">
                                        <h1>Endereço do cliente</h1>
                                        <input type="text" name="endereco" placeholder="Endereço*" value="Rua na casa do caralho, JD velha do caralho">
                                        <input type="text" name="cidade" placeholder="Cidade*" value="Desgraçaaa">
                                        <select name="estado">
                                            <option value="0" disabled>Selecionar Estado*</option>
                                            <option value="Acre" selected>Acre</option>
                                            <option value="Alagoas">Alagoas</option>
                                            <option value="Amapá">Amapá</option>
                                            <option value="Amazonas">Amazonas</option>
                                            <option value="Bahia">Bahia</option>
                                            <option value="Ceará">Ceará</option>
                                            <option value="Espírito Santo">Espírito Santo</option>
                                            <option value="Goiás">Goiás</option>
                                            <option value="Maranhão">Maranhão</option>
                                            <option value="Mato Grosso">Mato Grosso</option>
                                            <option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
                                            <option value="Minas Gerais">Minas Gerais</option>
                                            <option value="Pará">Pará</option>
                                            <option value="Paraíba">Paraíba</option>
                                            <option value="Paraná">Paraná</option>
                                            <option value="Pernambuco">Pernambuco</option>
                                            <option value="Piauí">Piauí</option>
                                            <option value="Rio de Janeiro">Rio de Janeiro</option>
                                            <option value="Rio Grande do Norte">Rio Grande do Norte</option>
                                            <option value="Rio Grande do Sul">Rio Grande do Sul</option>
                                            <option value="Rondônia">Rondônia</option>
                                            <option value="Roraima">Roraima</option>
                                            <option value="Santa Catarina">Santa Catarina</option>
                                            <option value="São Paulo">São Paulo</option>
                                            <option value="Sergipe">Sergipe</option>
                                            <option value="Tocantins">Tocantins</option>
                                            <option value="Distrito Federal">Distrito Federal</option>
                                        </select>
                                    </div>

                                    <div class="desc-client">
                                        <h1>Descrição descrita pelo o cliente</h1>

                                        <textarea name="detalhes_cliente"
                                            placeholder="Detalhes sobre o problema e observações descrita pelo o cliente"></textarea>
                                    </div>

                                    <div class="data">
                                        <h1>Outras Informações</h1>
                                        <input type="text" name="equipamento" placeholder="Equipamento" value="Carroo">
                                        <input type="text" name="nome_atendente" placeholder="Nome do atendente" value="Aninha da Quebrada">
                                        <input type="date" name="inicio_servico"
                                            title="Data de recebimento do equipamento">
                                    </div>

                                </div>

                                <div class="text-info">
                                    <h1 class="title-area">Pós Serviço</h1>
                                    <p>Essa área deve ser preencida depois da execução do serviço!</p>
                                </div>

                                <div class="info-final">

                                    <div class="info">
                                        <h1>Dados entregue pelo o técnico</h1>
                                        <input type="text" name="nome_tecnico" placeholder="Nome do Técnico" value="Vanessa">
                                        <input type="text" name="horas_trabalho" placeholder="Horas de trabalho" value="4 Horas">
                                        <input type="date" name="final_servico">
                                    </div>

                                    <div class="desc-tecnico">
                                        <h1>Descrição entregue pelo o técnico</h1>

                                        <textarea name="descricao_tecnico"
                                            placeholder="Detalhes sobre o problema, solução e observações descrita pelo o técnico"></textarea>
                                    </div>

                                    <div class="need-service">
                                        <h1>Produtos Necessários</h1>
                                        <div class="products-need" id="products-need">

                                        </div>

                                        <div class="add-end-value">
                                            <div class="btn-msg">
                                                <button class="add-new-item" onclick="addItemNeed()" type="button">Adicionar camada</button>
                                                <span class="error-need"></span>
                                            </div>
                                            <p class="show-count-element"><span>0</span>/5</p>
                                        </div>

                                    </div>

                                </div>

                                <div class="text-info">
                                    <h1 class="title-area">Final do Documento</h1>
                                    <p>Essa área pode ser preencida antes ou depois da execução do serivço!</p>
                                </div>

                                <div class="values-and-stats">
                                    <div class="data">
                                        <h1>Dados do serviço</h1>
                                        <input type="text" name="valor_servico" placeholder="Valor do Serviço" value="1000" onkeyup="valueTotal()">
                                        <input type="text" value="Valor Total em Produtos: R$ 10,00" disabled>
                                        <select name="status_servico">
                                            <option value="0" disabled>Status do serivço</option>
                                            <option value="Em espera" selected>Em espera</option>
                                            <option value="Em andamento">Em andamento</option>
                                            <option value="Finalizado">Finalizado</option>
                                            <option value="Cancelado">Cancelado</option>
                                            <option value="Pausado">Pausado</option>
                                        </select>
                                    </div>

                                    <div class="value-total">
                                        <p>
                                            VALOR TOTAL: R$
                                            <span id="total-insert">0</span>
                                        </p>
                                    </div>
                                </div>

                                <div class="btn-form">
                                    <button class="on-create" type="submit">Criar Documento</button>
                                    <button class="off-create" type="button">Cancelar Crianção</button>
                                </div>
                            </form>
                        </div>
                        <!-- End Create -->

                        <!-- manage -->
                        <div class="manage" id="manage">
                            <div class="top-manage">
                                <button>Criar Documento</button>

                                <form action="">
                                    <input type="text" placeholder="Ex: Carlos Eduardo">
                                </form>
                            </div>

                            <div class="box-table">
                                <table>
                                    <tr class="primary">
                                        <th>Nome completo</th>
                                        <th>Assistência</th>
                                        <th>Status</th>
                                        <th>Início</th>
                                        <th>Final</th>
                                        <th>Eventos</th>
                                    </tr>

                                    <tr class="document">
                                        <td>
                                            <a href="">
                                                Alfreds Futterkiste
                                            </a>
                                        </td>
                                        <td>Bateria com problema</td>
                                        <td>Em Andamento</td>
                                        <td>10/02/2001</td>
                                        <td>--/--/--</td>
                                        <td>
                                            <ul>
                                                <li>
                                                    <a href="">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </li>
                                                <li>
                                                    <a href="">
                                                        <i class="fas fa-trash"></i>
                                                    </a>
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>

                                </table>
                            </div>


                            <div class="final-list">
                                <span>Nada mais foi encontrado!</span>
                            </div>
                        </div>
                        <!-- End manage -->

                    </div>
                    <!-- End Containers -->

                </div>
                <!-- End Content Area -->

            </div>
            <!-- End Container Main -->

        </div>
        <!-- End Main -->

    </div>
    <!-- End Wrapper -->

    <script src="../js/create.js"></script>
    <script src="../js/main.js"></script>
</body>
</html>