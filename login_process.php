<?php 

    require_once("db.php");
    require_once("globals.php");
    require_once("dao/AlunoDAO.php");
    require_once("models/Message.php");
    require_once("models/Aluno.php");

$alunoDao = new AlunoDAO($conn, $BASE_URL);
$message = new Message($BASE_URL);


echo "deu certo1";
$type = filter_input(INPUT_POST, "type");


    if($type == "login") {

        $emailDigitado = filter_input(INPUT_POST, "email");
        $senhaDigitada = filter_input(INPUT_POST, "senha");
        $estaCadastrado = $alunoDao->verificaLogin($emailDigitado, $senhaDigitada);

        if($estaCadastrado == true){
            $aluno = new Aluno;
            $token = $aluno->geraToken();
            $alunoDao->salvaToken($emailDigitado, $token);  
            $_SESSION['token'] = $token;
            $message->enviarMessage("Seja bem vinda(o)!.", "success", "aluno.php");

        } else {
            $message->enviarMessage("Email e/ou senha incorretos!", "error", "login.php");
        }

    } else if ($type == "register") {
        echo "deu certo2";
        $nome = filter_input(INPUT_POST, "nome");
        $email = filter_input(INPUT_POST, "email");
        $turma = filter_input(INPUT_POST, "turma");
        $idade = filter_input(INPUT_POST, "idade");
        $senha = filter_input(INPUT_POST, "senha");
        $senha2 = filter_input(INPUT_POST, "senha2");
        echo "deu certo3";
        if($nome && $turma && $idade && $senha && $senha2 && $email) {
            echo "deu certo4";
            if($senha == $senha2) {
                $aluno = $alunoDao->preencherAluno($nome, $email, $senha, $turma, $idade);
                $alunoDao->criarAluno($aluno);
                header("Location: ". $_SERVER["HTTP_REFERER"]);
            }
        } else {
            $message->enviarMessage("Dados incompletos!.", "error", "login.php");
        }
        
    } else if ($type == "sair") {
        echo "sair";
    } else {
        print_r($type);
        echo $type;
        echo "nada";
    }
