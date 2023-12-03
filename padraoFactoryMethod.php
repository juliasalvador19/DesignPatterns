<?php  
  
    //   O padrão Factory Method permite a extensão fácil do sistema para adicionar novos tipos de formas através da criação de novas classes de fábrica. Ao utilizar esse padrão, a adição de uma nova forma envolve apenas a criação de uma nova classe de fábrica concreta, sem a necessidade de modificar o código cliente existente. Isso é possível porque o código cliente interage apenas com a interface FabricaFormas, sem depender das implementações concretas específicas. A abstração da criação de objetos e a utilização de herança proporcionam uma estrutura flexível que facilita a extensão do sistema com novos tipos de formas.

  // Interface do Produto
    interface FormaGeometrica {
        public function calcularArea();
    }

    // Produto Concreto - Círculo
    class Circulo implements FormaGeometrica {
        private $raio;

        public function __construct($raio) {
            $this->raio = $raio;
        }

        public function calcularArea() {
            return pi() * $this->raio * $this->raio;
        }
    }

    // Produto Concreto - Quadrado
    class Quadrado implements FormaGeometrica {
        private $lado;

        public function __construct($lado) {
            $this->lado = $lado;
        }

        public function calcularArea() {
            return $this->lado * $this->lado;
        }
    }

    // Fábrica de Formas (Factory Method)
    interface FabricaFormas {
        public function criarForma();
    }

    // Fábrica Concreta - Fábrica de Círculos
    class FabricaCirculo implements FabricaFormas {
        private $raio;

        public function __construct($raio) {
            $this->raio = $raio;
        }

        public function criarForma() {
            return new Circulo($this->raio);
        }
    }

    // Fábrica Concreta - Fábrica de Quadrados
    class FabricaQuadrado implements FabricaFormas {
        private $lado;

        public function __construct($lado) {
            $this->lado = $lado;
        }

        public function criarForma() {
            return new Quadrado($this->lado);
        }
    }

    // Exemplo de uso
    $fabricaCirculo = new FabricaCirculo(5);
    $circulo = $fabricaCirculo->criarForma();
    echo "Área do Círculo: " . $circulo->calcularArea() . "<br>";

    $fabricaQuadrado = new FabricaQuadrado(4);
    $quadrado = $fabricaQuadrado->criarForma();
    echo "Área do Quadrado: " . $quadrado->calcularArea() . "<br>";