<?php 
class Livro{
    //Atributos
    private string $titulo;
    private string $autor;
    private string $genero;
    private int $ano_publicacao;
 

    //Métodos
    public function __construct($titulo, $autor, $genero, $ano_publicacao)
    {
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->genero = $genero;
        $this->ano_publicacao = $ano_publicacao;
    }

    
    public function getTitulo()
    {
        return $this->titulo;
    }

    public function getAutor()
    {
        return $this->autor;
    }

    public function getGenero()
    {
        return $this->genero;
    }

    public function getAno_publicacao()
    {
        return $this->ano_publicacao;
    }
}
?>