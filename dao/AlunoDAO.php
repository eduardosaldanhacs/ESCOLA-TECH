<?php

    require_once("models/Aluno.php");

class AlunoDAO implements AlunoDAOInterface {

    private $conn;
    private $url;
    private $message;

    public function __construct(PDO $conn, $url) {
    $this->conn = $conn;
    $this->url = $url;
    //$this->message = new Message($url);
    }
    public function preencherAluno($nome, $email, $senha, $turma, $idade) {

        $aluno = new Aluno;

        $aluno->nome = $nome; 
        $aluno->turma = $turma; 
        $aluno->idade = $idade;
        $aluno->email = $email;
        $aluno->senha = $senha;

        return $aluno;
    }

    public function criarAluno(Aluno $aluno){
        $stmt = $this->conn->prepare("INSERT INTO tb_alunos(
            nome, email, senha, turma, idade) values (
            :nome, :email, :senha, :turma, :idade)");

        $stmt->bindParam(":nome", $aluno->nome);
        $stmt->bindParam(":email", $aluno->email);
        $stmt->bindParam(":senha", $aluno->senha);
        $stmt->bindParam(":turma", $aluno->turma);
        $stmt->bindParam(":idade", $aluno->idade);


        $stmt->execute();
    }
    /*Verifica se existe o email e senha digitado pelo usuario no login */
    public function verificaLogin($emailDigitado, $senhaDigitada) {
       $stmt = $this->conn->prepare("SELECT * FROM tb_alunos WHERE email = :email AND senha = :senha");
       $stmt->bindParam(":email", $emailDigitado);
       $stmt->bindParam(":senha", $senhaDigitada);
       $stmt->execute();

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado;
    }

    /*Armazena o token na hora do usuario fazer o login */
    public function salvaToken($emailDigitado, $token) {
        $stmt = $this->conn->prepare("UPDATE tb_alunos SET token = :token WHERE email = :email");
        $stmt->bindParam(":token", $token);
        $stmt->bindParam(":email", $emailDigitado);
        $stmt->execute();

    }

    public function verificaToken($token) {
        $stmt = $this->conn->prepare("SELECT * FROM tb_alunos WHERE token = :token");
        $stmt->bindParam(":token", $token);
        $stmt->execute();
        if($stmt->fetch(PDO::FETCH_ASSOC) > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function procurarPorToken($token) {
        $stmt = $this->conn->prepare("SELECT * FROM tb_alunos WHERE token = :token");
        $stmt->bindParam(":token", $token);
        $stmt->execute();
        $user = $stmt->fetch();
        return $user;
    }

}