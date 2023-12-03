<?php

    // O padrão Singleton garante que uma classe tenha apenas uma instância e fornece um ponto global de acesso a essa instância. Isso é alcançado através de um conjunto de técnicas que restringem a criação de objetos da classe a um único ponto no código e garantem que apenas uma instância seja criada e compartilhada.

    class RegistroUsuariosSingleton {
        private static $instancia = null;
        private $usuarios_registrados = array();
    
        private function __construct() {
            // Construtor privado para evitar a criação de instâncias fora da classe
        }
    
        public static function getInstance() {
            if (self::$instancia === null) {
                self::$instancia = new self();
            }
            return self::$instancia;
        }
    
        public function cadastrarUsuario($nome, $email) {
            // Adicione aqui outros campos se necessário
            $usuario = [
                'nome' => $nome,
                'email' => $email,
            ];
    
            $this->usuarios_registrados[] = $usuario;
            echo "Usuário cadastrado com sucesso.<br>";
        }
    
        public function listarUsuariosRegistrados() {
            echo "<br>Usuários registrados:<br>";
            foreach ($this->usuarios_registrados as $usuario) {
                echo "Nome: {$usuario['nome']}, E-mail: {$usuario['email']}<br>";
            }
        }
    }
    
    $registro_usuarios = RegistroUsuariosSingleton::getInstance();
    
    // Cadastrando usuários
    $registro_usuarios->cadastrarUsuario('Nome1', 'email1@example.com');
    $registro_usuarios->cadastrarUsuario('Nome2', 'email2@example.com');
    
    // Listando usuários registrados
    $registro_usuarios->listarUsuariosRegistrados();
