<?php

class Maquiagem {
    private ?int $id_maquiagem;
    private string $marca;
    private string $produto;
    private float $preco;

    public function __construct(?int $id_maquiagem, string $marca, string $produto, float $preco) {
        $this->id_maquiagem = $id_maquiagem;
        $this->marca = $marca;
        $this->produto = $produto;
        $this->preco = $preco;
    }

    public function getIdMaquiagem(): int {
        return $this->id_maquiagem;
    }

    public function getMarca(): string {
        return $this->marca;
    }

    public function getProduto(): string {
        return $this->produto;
    }

    public function getPreco(): float {
        return $this->preco;
    }
}
?>
