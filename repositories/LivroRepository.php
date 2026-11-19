<?php 
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../models/Livro.php';
require_once __DIR__ . '/../interfaces/RepositoryInterface.php';

class LivroRepository implements RepositoryInterface{

    private $conn;
    public function __construct()
    {
        $this->conn = Database::conectar();   //Pega la no Databse e use o metodo conectar, não precisa criar new etc
    }

    #[Override]
    public function criar($objeto)
    {
        $sql = "INSERT INTO livros (titulo, autor, genero, ano_publicacao) VALUES (:t, :a, :g, :an)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':t' => $objeto->getTitulo(),  //Igual ao bind params
            ':a' => $objeto->getAutor(),
            ':g' => $objeto->getGenero(),
            ':an'=> $objeto->getAno_publicacao()
         ]);
    }

    #[Override]
    public function listar()
    {
        $stmt = $this->conn->query("SELECT * FROM livros ORDER BY id");
        return $stmt->fetchALL(PDO::FETCH_ASSOC);
    }

    #[Override]
    public function buscarPorId($id)
    {
       $stmt = $this->conn->prepare("SELECT * FROM livros WHERE id = :id");
       $stmt->execute([':id' => $id]);
       return $stmt->fetch(PDO::FETCH_ASSOC);  //Quando é buscar um dado é só fetch
    }

#[Override]
	public function atualizar($id, $objeto)
    {
        $sql = "UPDATE livros SET titulo=:t, autor=:a, genero=:g, ano_publicacao=:an WHERE id=:id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':t' => $objeto->getTitulo(),  //Igual ao bind params
            ':a' => $objeto->getAutor(),
            ':g' => $objeto->getGenero(),
            ':an'=> $objeto->getAno_publicacao(),
            ':id' => $id
        ]);
    }

    #[Override]
    public function excluir($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM livros WHERE id = :id");
        $stmt->execute([':id' => $id]);
    }
}
?>