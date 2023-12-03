<?php

    // O padrão Decorator permite a combinação flexível de funcionalidades adicionais a um objeto, sem modificar sua estrutura básica. Isso é alcançado através do uso de uma série de classes que envolvem o objeto original, cada uma adicionando uma camada de funcionalidade específica.

    // Classe Pessoa
    class Pessoa {
        private $nome;
        private $idade;

        public function __construct($nome, $idade) {
            $this->nome = $nome;
            $this->idade = $idade;
        }

        public function getNome() {
            return $this->nome;
        }

        public function getIdade() {
            return $this->idade;
        }
    }

    // Interface Componente
    interface Relatorio {
        public function gerar();
    }

    // Componente Concreto
    class RelatorioBasico implements Relatorio {
        private $pessoa;

        public function __construct(Pessoa $pessoa) {
            $this->pessoa = $pessoa;
        }

        public function gerar() {
            return "Nome: " . $this->pessoa->getNome() . ", Idade: " . $this->pessoa->getIdade();
        }
    }

    // Decorator Abstrato
    abstract class Decorator implements Relatorio {
        protected $relatorio;

        public function __construct(Relatorio $relatorio) {
            $this->relatorio = $relatorio;
        }

        public function gerar() {
            return $this->relatorio->gerar();
        }
    }

    // Decorator Concreto - Formatação Negrito
    class DecoratorNegrito extends Decorator {
        public function gerar() {
            return "<b>" . parent::gerar() . "</b>";
        }
    }

    // Decorator Concreto - Adição de Rodapé
    class DecoratorRodape extends Decorator {
        public function gerar() {
            return parent::gerar() . "<br>Rodapé";
        }
    }


    $relatorio = new RelatorioBasico(new Pessoa("Julia", 21));
    $relatorioFormatado = new DecoratorNegrito(new DecoratorRodape($relatorio));

    echo $relatorioFormatado->gerar();