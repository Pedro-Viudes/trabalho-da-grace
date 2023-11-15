<?php
  include("conexao.php")
?>

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
    <div class="container text-center m-0">
      <div class="row">
        <div class="col-1 vh-100 d-flex flex-column fundo icones">
          <a href="index.php"><i class="fa-solid fa-user mb-5 "></i></a>
          <a href="home.php"><i class="fa-solid fa-house "></i></a>
          <a href="funcionarios.php"><i class="fa-solid fa-briefcase "></i></a>
          <a href="professores.php"><i class="fa-solid fa-chalkboard-user ativado"></i></a>
          <a href="index.php"><i class="fa-solid fa-right-from-bracket"></i></a>

        </div>
        <div class="col-11 row g-0 text-center p-3  " style="height: 20%;">
            
            <div class="col-5 fw-bold h1  ">Professores</div>
            <div class="col-1 fw-bold align-baseline "> <a href="impressao.php"><i class="fa-solid fa-print text-dark"></i></a> </div>
            <div class="col-5">
                
                
                
                <a href="cadastroprofessores.php"> <button class="btn ms-5 btn-primary w-100">Cadastrar</button></a></div>
        
<div class="col-12 g-0 w-100 ms-5"><br>
    <br>
    <hr>
</div>

<div class="col-12 g-0 ms-5">

    <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Nome</th>
            <th scope="col">Setor</th>
            <th scope="col">Campus</th>
            <th scope="col">Ação</th>
          </tr>
        </thead>
        <tbody>

        <?php
                
        // Verificar se uma solicitação de exclusão foi feita
        if (isset($_GET['excluir_id'])) {
            $excluir_id = $_GET['excluir_id'];
        
            // Query para deletar o professor pelo ID
            $sql_excluir = "DELETE FROM professor WHERE id = $excluir_id";
            $result_excluir = $conn->query($sql_excluir);
        
            // Verificar se a exclusão foi bem-sucedida
            if ($result_excluir) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                        Professor excluído com sucesso!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
            } else {
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                        Erro ao excluir professor: ' . $conn->error . '
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>';
            }
        }
        
        // Consulta SQL para obter todos os professores
        $sql = "SELECT * FROM professor";
        $result = $conn->query($sql);
        
        // Verificar se há resultados
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo '<tr>
                        <th scope="row">' . $row["id"] . '</th>
                        <td>' . $row["nome"] . '</td>
                        <td>' . $row["colegiado"] . '</td>
                        <td>' . $row["campus"] . '</td>
                        <td>
                            <a href="cadastroprofessores.php?id=' . $row["id"] . '"><i class="fa-solid fa-pen p-2 text-success small"></i></a>
                            <a href="?excluir_id=' . $row["id"] . '"><i class="fa-solid fa-trash p-2 text-danger small"></i></a>
                        </td>
                      </tr>';
            }
        } else {
            echo '<tr><td colspan="5">Nenhum professor encontrado</td></tr>';
        }
        
        // Fechar a conexão
        $conn->close();
        ?>
         
        </tbody>
      </table>

    
</div>
        
        </div>


    
        
        

          
          
      </div>
    </div>




    


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  
  </body>
</html>