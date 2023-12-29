<?php    
    require_once("db.php");
    require_once("globals.php");
    require_once("models/Message.php");
    require_once("dao/AlunoDAO.php");

    $alunoDao = new AlunoDAO($conn, $BASE_URL);
    $token = $_SESSION['token'];
    if(isset($token)) {
       if($alunoDao->verificaToken($token)){
            $aluno = $alunoDao->procurarPorToken($token);
       } else {
            
       }
    }

    $message = new Message($BASE_URL);

    $flassMessage = $message->pegarMessage();

    if(!empty($flassMessage["msg"])) {
        // Limpar a mensagem
        $message->limparMessage();
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escola Tech+</title>
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <!-- GOOGLE FONTS -->
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
    <script src="script.js"></script>
    <script src="https://kit.fontawesome.com/156d6a1fcd.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <nav class="navbar">
            <img src="img/logo/logo-header2.png" alt="">
            <ul class="navbar-list">
                <li class="navbar-item"><a href="index.php">Início</a></li>
                <li class="navbar-item"><a href="">Cursos</a></li>
                <li class="navbar-item"><a href="">Caléndario</a></li>
                <li class="navbar-item"><a href="">Professores</a></li>
                <li class="navbar-item"><a href="">Alunos</a></li>
                <li class="navbar-item">
                    <a href="<?= ($_SESSION['token'] != '') ? 'aluno.php' : 'login.php';?>"><button>Login</button>
                </a></li>
                <?php if($_SESSION['token']): ?>
                <li class="navbar-item"><a href="sair.php"><button>Sair</button></a></li>
                <?php endif;?>
            </ul>
        </nav>
    </header>
    <?php if(!empty($flassMessage["msg"])): ?>
    <div class="msg-container">
      <p class="msg <?= $flassMessage["type"] ?>"><?= $flassMessage["msg"] ?></p>
    </div>
  <?php endif; ?>