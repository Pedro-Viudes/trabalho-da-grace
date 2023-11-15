<?php
// Inclua o arquivo de conexão
include("conexao.php");

// Consultar todas as informações dos professores
$sql_todos_professores = "SELECT * FROM professor";
$result_todos_professores = $conn->query($sql_todos_professores);

// Fechar a conexão
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <?php
    // Verificar se há professores
    if ($result_todos_professores->num_rows > 0) {
        // Loop através de cada professor
        while ($row_professor = $result_todos_professores->fetch_assoc()) {
            $nomeProfessor = $row_professor["nome"];
            $setor = $row_professor["colegiado"];
            $campus = $row_professor["campus"];
    ?>
            <div class="container text-center">
                <div class="row g-0 text-center">
                    <div class="col-12 fw-bold ">
                        Folha ponto
                    </div>
                    <div class="col-sm-6 col-md-6">
                        Nome: <?php echo $nomeProfessor; ?><br>
                        Colegiado: <?php echo $setor; ?>
                    </div>
                    <div class="col-6 col-md-6">Campus: <?php echo $campus; ?><br>
                        Data: <?php echo date("d/m/Y"); ?>
                    </div>
                </div>

                <hr>

                <div class='row row-cols-2 row-cols-lg-6 g-2 g-lg-1'>
                    <?php
                    $dias_no_mes = cal_days_in_month(CAL_GREGORIAN, date('m'), date('Y'));
                    for ($i = 1; $i <= $dias_no_mes; $i++) {
                    ?>
                        <div class="col">
                            <div class="p-2">Dia <?php echo sprintf("%02d", $i) . '/' . date('m/Y'); ?>
                                <br>
                                <p>assisnarura</p>
                                <hr>
                            </div>
                        </div>
                    <?php
                    }
                    ?>
                </div>

                <div class="row g-0 text-left ms-4">
                    <div class="col-12 fw-bold ">
                        Ocorrências
                        <br>
                        <hr>
                        <hr>
                        <hr>
                        <hr>
                    </div>
                </div>
            </div>
    <?php
        }
    } else {
        echo "Nenhum professor encontrado.";
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
</body>

</html>
