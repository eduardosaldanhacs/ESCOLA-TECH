<?php

    class Aluno {

        private $id;
        public $nome;
        public $turma;
        public $idade;
        public $email;
        public $senha;
        public $token;
        private $nota1;
        private $nota2;
        private $nota3;

        public function geraToken() {
            return bin2hex(random_bytes(30));
        }
    }

    interface AlunoDAOInterface {
        
        public function preencherAluno($nome, $turma, $idade, $email, $senha);
        public function criarAluno(Aluno $aluno);
        public function verificaLogin($emailDigitado, $senhaDigitada);
        public function salvaToken($emailDigitado, $token);
        public function verificaToken($token);
        public function procurarPorToken($token);
    }

    