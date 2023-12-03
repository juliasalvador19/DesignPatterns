<?php 

    // Interface Observer
    interface Observador {
        public function notificar($mensagem);
    }

    // Subject (Assunto)
    class SistemaNotificacao {
        private $observadores = array();

        public function adicionarObservador(Observador $observador) {
            $this->observadores[] = $observador;
        }

        public function removerObservador(Observador $observador) {
            $indice = array_search($observador, $this->observadores);
            if ($indice !== false) {
                unset($this->observadores[$indice]);
            }
        }

        public function notificarObservadores($mensagem) {
            foreach ($this->observadores as $observador) {
                $observador->notificar($mensagem);
            }
        }
    }

    // Observador Concreto
    class ComponenteNotificavel implements Observador {
        private $nome;

        public function __construct($nome) {
            $this->nome = $nome;
        }

        public function notificar($mensagem) {
            echo "[$this->nome] Recebeu a notificação: $mensagem<br>";
        }
    }

    // Exemplo de uso
    $sistemaNotificacao = new SistemaNotificacao();

    $observador1 = new ComponenteNotificavel("Observador1");
    $observador2 = new ComponenteNotificavel("Observador2");

    // Adicionando observadores ao sistema de notificação
    $sistemaNotificacao->adicionarObservador($observador1);
    $sistemaNotificacao->adicionarObservador($observador2);

    // Notificando observadores
    $sistemaNotificacao->notificarObservadores("Novas atualizações disponíveis!");