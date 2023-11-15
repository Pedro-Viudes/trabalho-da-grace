
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["btnEntrar"])) {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    // Realizar a verificação dos dados usando password_verify
    $hashSenha = password_hash("123", PASSWORD_DEFAULT); // Substitua "123" pela senha real
    if ($nome == "pedro" && $email == "pedro@gmail.com" && password_verify($senha, $hashSenha)) {
        // Login bem-sucedido
        echo "Login bem-sucedido!";
        header("Location: home.php");
        exit();
    } else {
        // Credenciais inválidas
        echo "Credenciais inválidas. Tente novamente.";
    }
}
?>


<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/css.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <title>HOME</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  </head>
  <body>


  
    <div class="container d-flex justify-content-center align-items-center vh-100 w-100 ">
  
      <div class="row justify-content-center ">
          <div class="col-4 fundo text-center rounded " >
            <img src="assets/uenpfrente.png" width="80%">
          </div>
          <div class="col-4 text-center fundo2 ">
            <h3  class="p-3 texth3">Faça o Login </h3>


            <form method="post" action="">
               <div class="  padding offset-md-3  m-0">
                <div class="form-floating mb-3">
                  <input type="text" class="form-control" id="floatingInput" placeholder="Nome" name="nome">
                  <label for="floatingInput">Nome</label>
                </div>
                <div class="form-floating mb-3">
                  <input type="email" class="form-control" id="floatingInput" name="email" placeholder="name@example.com">
                  <label for="floatingInput">Email </label>
                </div>
                <div class="form-floating mb-3">
                  <input type="password" class="form-control" id="floatingPassword" name="senha" placeholder="Senha">
                  <label for="floatingPassword">Senha</label>
                </div>
                <div class="row text-center p m-0 justify-content-evenly">
                <button type="submit" class="col-4 btn btn-primary w-50  "name="btnEntrar">Entrar</button>
                <button type="submit" class="col-4 btn btn-sm w-50 "><a href="cadastrar.php " class="text-black text-decoration-none">Cadastrar</a></button>
              </div>
            </form>
            



          </div>
        </div>
    </div>







    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  </body>
</html>