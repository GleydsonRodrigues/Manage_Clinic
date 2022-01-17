<?php
// incluindo arquivo de conexão
include "PACIENTES/conecta.php";
include "verifica.php";
require_once 'CLASSES/usuarios.php';
$u = new Usuario;

$id = $_SESSION["id_usuario"];


?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title> Pacientes </title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="CSS/pacientes.css">
    <link rel='stylesheet' href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css'>
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">

</head>

<body>

    <div class="sidebar">
        <div class="logo-details">
            <i class='bx bx-plus-medical icon'></i>
            <div class="logo_name">SUS</div>
            <i class='bx bx-menu' id="btn"></i>
        </div>

        <br>

        <ul class="nav-list">

            <li>
                <a href="dashboard.html">
                    <i class='bx bx-grid-alt'></i>
                    <span class="links_name">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
            </li>

            <br>

            <li>
                <a href="pacientes.php">
                    <i class='bx bx-user'></i>
                    <span class="links_name">Pacientes</span>
                </a>
                <span class="tooltip">Pacientes</span>
            </li>

            <br>

            <li>
                <a href="calendario.html" style="margin-top: 10px;">
                    <i class='bx bxs-calendar'></i>
                    <span class="links_name">Agenda</span>
                </a>
                <span class="tooltip">Agenda</span>
            </li>

            <br>

            <li>
                <a href="mapa.html">
                    <i class='bx bxs-map'></i>
                    <span class="links_name">Google Maps</span>
                </a>
                <span class="tooltip">Localidade</span>
            </li>

            <br>

            <li>
                <a href="sair.php" id="link_out" style="margin-top: 23px;">
                    <i class='bx bx-log-out'></i>
                    <span class="links_name">Desconectar</span>
                </a>
                <span class="tooltip">Desconectar</span>
            </li>
        </ul>
    </div>

    <section class="pacientes-section">
        <div class="main-content">

            <div class="titulo">
                LISTA DOS PACIENTES
            </div>

            <form action="" method="POST">
                <div class="divBusca">
                    <input class="form-control me-2" type="text" placeholder="Nome do Paciente" id="txtBusca" name="txtBusca">
                    <button id="btnBusca">Buscar</button>
                </div>
            </form>

            <br><br>

            <form action="PACIENTES/inserir.php">
                <div class="divCadastro">
                    <button id="btnCadastro">Novo Cadastro</button>
                </div>
            </form>

            <!-- Exibindo os produtos do banco -->
            <div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Nome Completo</th>
                            <th>Telefone Celular</th>
                            <th>CPF</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        if (isset($_POST["txtBusca"])) {
                            $pesquisa = $_POST["txtBusca"];
                        } else {
                            $pesquisa = "";
                        }
                        // String responsável pela busca no banco
                        $sql = "SELECT * FROM tblpacientes WHERE nome LIKE '%$pesquisa%';";
                        // Executa a string no banco
                        $query = $conexao->query($sql);
                        // Laço que tras as informações
                        while ($linha = $query->fetch_array()) {
                            // atribuição de valores
                            $codigo = $linha["procodigo"];

                            $nome   = $linha["nome"];
                            $pai  = $linha["pai"];
                            $mae   = $linha["mae"];
                            $telefone = $linha["telefone"];
                            $endereco   = $linha["endereco"];
                            $numero   = $linha["numero"];
                            $cidade   = $linha["cidade"];
                            $estado   = $linha["estado"];
                            $sangue   = $linha["sangue"];
                            $cpf   = $linha["cpf"];
                            $email   = $linha["email"];
                            $sexo   = $linha["sexo"];
                            $peso   = $linha["peso"];
                            $altura   = $linha["altura"];
                            $nascimento   = $linha["nascimento"];

                            $maisinfo = "Info-$codigo";
                            $obs = "obs-$codigo";

                            // Exibindo a linha da tabela
                            echo "
                        <tr>
                            <td>$nome</a></td>
                            <td>$telefone</td>
                            <td>$cpf</td>
                            <td>
                            <p>
                        
                            <a class='btn btn-dark' id='botaomaisinfo' data-bs-toggle='collapse' href='#$maisinfo' role='button' aria-expanded='false' aria-controls='multiCollapseExample1'>+ Info⠀<svg xmlns='http://www.w3.org/2000/svg' width='22' height='22' fill='currentColor' class='bi bi-info-circle' viewBox='0 0 16 16'>
                            <path d='M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z'/>
                            <path d='m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z'/>
                          </svg></a>
                            ";
                            $u->conectar("login_tcc", "localhost", "root", "");
                            if ($u->conferirUsuario($id)) {

                                echo "

                                        <a class='btn btn-primary' id='botaoobs' data-bs-toggle='modal' href='#$obs' data-bs-target='#exampleModal'>Obs:⠀<svg xmlns='http://www.w3.org/2000/svg' width='22' height='22' fill='currentColor' class='bi bi-chat-square-text' viewBox='0 0 16 16'>
                                        <path d='M14 1a1 1 0 0 1 1 1v8a1 1 0 0 1-1 1h-2.5a2 2 0 0 0-1.6.8L8 14.333 6.1 11.8a2 2 0 0 0-1.6-.8H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v8a2 2 0 0 0 2 2h2.5a1 1 0 0 1 .8.4l1.9 2.533a1 1 0 0 0 1.6 0l1.9-2.533a1 1 0 0 1 .8-.4H14a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z'/>
                                        <path d='M3 3.5a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9a.5.5 0 0 1-.5-.5zM3 6a.5.5 0 0 1 .5-.5h9a.5.5 0 0 1 0 1h-9A.5.5 0 0 1 3 6zm0 2.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5z'/>
                                      </svg></a>";
                            }

                            echo "
                            </p>

                            <div class='col'>
                            <div class='collapse multi-collapse' id='$maisinfo'>
                            <div class='card card-body'>
                                    ";

                            $sql3 = "SELECT * FROM tblobs WHERE id_paciente = '$codigo';";
                            // Executa a string no banco
                            $query3 = $conexao->query($sql3);
                            // Laço que tras as informações
                            while ($linha2 = $query3->fetch_array()) {
                                $observa   = $linha2["obs"];

                                echo "
                                    
                                        <label>Ultimas Observações Médicas:<br> $observa</label><br>
                                    ";
                            }
                            echo "
                                    <label>E-mail:<br> $email</label><br>
                                    <label>Nascimento: ⠀⠀⠀Sexo:<br> $nascimento  ⠀⠀⠀  $sexo</label><br>
                                    <label>Nome do Pai: ⠀⠀⠀  Nome da Mãe:<br> $pai  ⠀⠀⠀  $mae</label><br>
                                    <label>Endereço:<br> $endereco,  $numero<br> $cidade - $estado</label><br>
                                    <label>Tipo Sanguíneo:<br> $sangue</label><br>
                                    <label>Peso ( KG ): ⠀⠀⠀ Altura ( CM ):<br> $peso  ⠀⠀⠀  $altura</label><br>

                                        </div>
                                        </div>
                                        </div>
                                    
                                    ";



                            $u->conectar("login_tcc", "localhost", "root", "");
                            if ($u->conferirUsuario($id)) {

                                echo "

                                <div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                <div class='modal-dialog' id='$obs'>
                                  <div class='modal-content'>

                                    <div class='modal-header'>
                                      <h5 class='modal-title' id='exampleModalLabel'>Descreva o estado do paciente:</h5>
                                      <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                    </div>

                                    <div class='modal-body'>
                                        <form method='POST' action='#'>
                                        <textarea name='observ-$obs' id='' cols='30' rows='10'></textarea>
                                        </form>
                                    </div>

                                    <div class='modal-footer'>
                                        <input type='submit' value='SALVAR' name='btn-$obs' class='btn btn-success'>
                                    </div>

                                </div>
                                </div>
                                </div>
                                    
                                        ";

                                if (isset($_POST["btn-$obs"])) {

                                    $observacao = $_POST["observ-$obs"];
                                    $idUsua = $codigo;

                                    if (!empty($observacao)) {


                                        $sql2 = "INSERT INTO tblobs (obs, id_paciente) values ('$observacao', '$idUsua')";



                                        if ($conexao->query($sql2)) {

                                            //echo "salvo";
                                            unset($_POST["observ-$obs"]);
                                        } else {

                                            echo "erro";
                                        }
                                    }
                                }

                                echo "
                                
                
                                        </div>
                                    </div>
                                    </div>
                
                                </div>
                                    </td>

                                    <td> <a class='btn btn-warning' href='PACIENTES/editar.php?id=$codigo'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-pencil' viewBox='0 0 16 16'>
                                    <path d='M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z'/>
                                    </svg>
                                    </a>
                                    <a class='btn btn-danger' href='PACIENTES/deletar.php?id=$codigo'>
                                    <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash-fill' viewBox='0 0 16 16'>
                                    <path d='M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z'/>
                                  </svg>
                                    </a>







                                    </td>
                                </tr>
                                ";
                            }
                        }
                        ?>







                    </tbody>

                </table>
            </div>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>


        </div>
    </section>

    <script src="JAVA/sidebar.js"></script>

</body>

</html>