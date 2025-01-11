<?php
class Libros
{

    private $ISBN;
    private $titulo;
    private $autor;
    private $descripcion;

    function __construct($ISBN, $titulo, $autor, $descripcion)
    {
        $this->ISBN = $ISBN;
        $this->titulo = $titulo;
        $this->autor = $autor;
        $this->descripcion = $descripcion;
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

    /**
     * Get the value of descripcion
     */
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     */
    public function setDescripcion($descripcion): self
    {
        $this->descripcion = $descripcion;

        return $this;
    }
}
