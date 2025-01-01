<?php
class Libros
{

    private $ISBN;
    private $titulo;
    private $autor;

    function __construct($ISBN, $titulo, $autor)
    {
        $this->ISBN = $ISBN;
        $this->titulo = $titulo;
        $this->autor = $autor;
    }



    /**
     * Get the value of ISBN
     */
    public function getISBN()
    {
        return $this->ISBN;
    }

    /**
     * Set the value of ISBN
     */
    public function setISBN($ISBN): self
    {
        $this->ISBN = $ISBN;

        return $this;
    }

    /**
     * Get the value of titulo
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * Set the value of titulo
     */
    public function setTitulo($titulo): self
    {
        $this->titulo = $titulo;

        return $this;
    }

    /**
     * Get the value of autor
     */
    public function getAutor()
    {
        return $this->autor;
    }

    /**
     * Set the value of autor
     */
    public function setAutor($autor): self
    {
        $this->autor = $autor;

        return $this;
    }
}
