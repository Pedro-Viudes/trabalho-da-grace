



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/estilo.css">
    <script src="https://kit.fontawesome.com/66b63d8130.js" crossorigin="anonymous"></script>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title></title>
  </head>
  <body>
    <div class="container text-center m-0 ">
      <div class="row">
        <div class="col-1 vh-100 d-flex flex-column fundo icones">
          <a href="index.php"><i class="fa-solid fa-user mb-5 "></i></a>
          <a href="home.php"><i class="fa-solid fa-house "></i></a>
          <a href="funcionarios.php"><i class="fa-solid fa-briefcase  "></i></a>
          <a href="professores.php"><i class="fa-solid fa-chalkboard-user ativado"></i></a>
          <a href="index.php"><i class="fa-solid fa-right-from-bracket"></i></a>
      
        </div>
        <div class="col-11 row g-0 text-center p-3 " style="height: 20%;">
            <div class="col-1"><a href="professores.php"><i class="fa-solid fa-arrow-left text-dark md"></i></a></div>
            <div class="col-11 fw-bold h1 text-center">Cadastrar Professores </div>
          <div class="col-md-7 offset-md-3 p-5 ">
          <?php
include("conexao.php");
// Variáveis para edição
$editar_id = 0;
$editar_nome = "";
$editar_colegiado = "";
$editar_campus = "";

// Verificar se há uma solicitação de edição
if (isset($_GET['editar_id'])) {
    $editar_id = $_GET['editar_id'];

    // Consultar o professor a ser editado
    $sql_editar = "SELECT * FROM professor WHERE id = $editar_id";
    $result_editar = $conn->query($sql_editar);

    if ($result_editar->num_rows > 0) {
        $row_editar = $result_editar->fetch_assoc();
        $editar_nome = $row_editar["nome"];
        $editar_colegiado = $row_editar["colegiado"];
        $editar_campus = $row_editar["campus"];
    }
}

// Operação CREATE (Criação) ou UPDATE (Atualização)
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nomeProfessor"];
    $colegiado = $_POST["setor"]; // Mudança aqui
    $campus = $_POST["campus"];

    if ($editar_id > 0) {
        // Estamos editando um professor existente
        $sql_atualizar = "UPDATE professor SET nome='$nomeProfessor', colegiado='$colegiado', campus='$campus' WHERE id=$editar_id";
        $result_atualizar = $conn->query($sql_atualizar);;

        if ($result_atualizar) {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Professor atualizado com sucesso!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
            // Limpar as variáveis de edição
            $editar_id = 0;
            $editar_nome = "";
            $editar_colegiado = "";
            $editar_campus = "";
        } else {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Erro ao atualizar professor: ' . $conn->error . '
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        }
    } else {
        // Estamos criando um novo professor
        // Verificar se os dados já existem no banco de dados
        $verificaExistencia = "SELECT * FROM professor WHERE nome = '$nome' and colegiado = '$colegiado'";
        $resultExistencia = $conn->query($verificaExistencia);

        if ($resultExistencia->num_rows > 0) {
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Professor já existente no banco de dados!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        } else {
            // Os dados não existem, então procedemos com a inserção
            $sql_inserir = "INSERT INTO professor (nome, colegiado, campus) VALUES ('$nome', '$colegiado', '$campus')";
            $result_inserir = $conn->query($sql_inserir);

            if ($result_inserir) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                Professor cadastrado com sucesso!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                Erro ao cadastrar professor: ' . $conn->error . '
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            }
        }
    }
}

// Fechar a conexão
$conn->close();
?>


        <form method="POST" action="" >

                <div class="form-floating mb-3  ">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Nome do Professor" name="nomeProfessor">
                    <label for="floatingInput">Nome do Professor</label>
                </div>


                
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Setor" name="setor">
                    <label for="floatingInput">Setor </label>
                </div>
            
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput" placeholder="Campus" name="campus">
                    <label for="floatingInput">Campus </label>
                </div>

                <button type="submit" class="btn btn-primary w-100 text-uppercase fs-6 fw-bold"> cadastrar</button>
            
        </form>
            
        </div>




        
        
        
        </div>


    
        
        

          
          
      </div>
    </div>





    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  
  </body>
</html>