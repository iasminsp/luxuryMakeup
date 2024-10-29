<?php

class MaquiagemRepositorio {
    private PDO $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    public function getMaquiagem() {
        require 'Modelo/maquiagem.php';
        require 'db_connection.php';
        $consulta = "SELECT * FROM Maquiagem";
        $statement = $this->pdo->query($consulta);
        $resultado = $statement->fetchAll(PDO::FETCH_ASSOC);

        $maquiagem_arr = array_map(function($maquiagem) {
            return new Maquiagem(
                $maquiagem['id_maquiagem'],
                $maquiagem['marca'],
                $maquiagem['produto'],
                $maquiagem['preco']
            );
        }, $resultado);

        return $maquiagem_arr;
    }

    public function getMaquiagemPorId($id) {
        $stmt = $this->pdo->prepare("SELECT * FROM Maquiagem WHERE id_maquiagem = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchObject('Maquiagem');
    }
    
    

    public function listaMaquiagens() {
        $maquiagem_lst = $this->getMaquiagem();
        foreach($maquiagem_lst as $m) {
            echo "<div class='makeup-item'>";
            echo "<h2><a href='detalhes.php?id=" . $m->getIdMaquiagem() . "'>" . $m->getProduto() . "</a></h2>";
            echo "<p>Marca: " . $m->getMarca() . "</p>";
            echo "<p class='price'>Preço: R$ " . number_format($m->getPreco(), 2, ',', '.') . "</p>";
            echo "</div>";
        }
    }
   

    public function deletaMaquiagem(int $id) {
        $sql = "DELETE FROM Maquiagem WHERE id_maquiagem = ?";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $id);
        $statement->execute();
    }

    public function salvaMaquiagem(Maquiagem $maquiagem){
        $sql = "INSERT INTO Maquiagem (marca, produto, preco) VALUES (?,?,?)";
        $statement = $this->pdo->prepare($sql);
        $statement->bindValue(1, $maquiagem->getMarca());
        $statement->bindValue(2, $maquiagem->getProduto());
        $statement->bindValue(3, $maquiagem->getPreco());
        $statement->execute();
      }

      public function buscaMaquiagem(int $id) {
        require 'Modelo/maquiagem.php';
        $consulta = "SELECT * FROM Maquiagem WHERE id_maquiagem = :id";
        $statement = $this->pdo->prepare($consulta);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $maquiagem = $statement->fetch(PDO::FETCH_ASSOC);
    
        return new Maquiagem($maquiagem['id_maquiagem'], $maquiagem['marca'], $maquiagem['produto'], $maquiagem['preco']);
    } 

    public function atualizaMaquiagem($maquiagem) {
        $consulta = "UPDATE Maquiagem SET marca = :marca, produto = :produto, preco = :preco WHERE id_maquiagem = :id_maquiagem";
        $stmt = $this->pdo->prepare($consulta);
        $stmt->bindValue(':marca', $maquiagem->getMarca());
        $stmt->bindValue(':produto', $maquiagem->getProduto());
        $stmt->bindValue(':preco', $maquiagem->getPreco());
        $stmt->bindValue(':id_maquiagem', $maquiagem->getIdMaquiagem(), PDO::PARAM_INT);
    
        $stmt->execute();
    }
    
    
    
}
?>
