<?php 

    // Interface Strategy
    interface EstrategiaOrdenacao {
        public function ordenar(array $elementos): array;
    }

    // Strategy Concreto - Ordenação Crescente
    class OrdenacaoCrescente implements EstrategiaOrdenacao {
        public function ordenar(array $elementos): array {
            sort($elementos);
            return $elementos;
        }
    }

    // Strategy Concreto - Ordenação Decrescente
    class OrdenacaoDecrescente implements EstrategiaOrdenacao {
        public function ordenar(array $elementos): array {
            rsort($elementos);
            return $elementos;
        }
    }

    // Contexto
    class ContextoOrdenacao {
        private $estrategia;

        public function setEstrategia(EstrategiaOrdenacao $estrategia) {
            $this->estrategia = $estrategia;
        }

        public function ordenarElementos(array $elementos): array {
            return $this->estrategia->ordenar($elementos);
        }
    }

    $elementos = [5, 2, 8, 1, 7];

    // Usando a estratégia de ordenação crescente
    $contexto = new ContextoOrdenacao();
    $contexto->setEstrategia(new OrdenacaoCrescente());
    $resultado = $contexto->ordenarElementos($elementos);
    echo "Ordenação Crescente: " . implode(", ", $resultado) . "<br>";

    // Usando a estratégia de ordenação decrescente
    $contexto->setEstrategia(new OrdenacaoDecrescente());
    $resultado = $contexto->ordenarElementos($elementos);
    echo "Ordenação Decrescente: " . implode(", ", $resultado) . "<br>";