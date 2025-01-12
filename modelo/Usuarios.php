<?php
class Usuarios
{

    private $id;
    private $ape1;
    private $ape2;
    private $rol;
    private $nombre;


    function __construct($nombre, $id = null, $ape1 = null, $ape2 = null, $rol = null)
    {
        $this->id = $id;
        $this->ape1 = $ape1;
        $this->ape2 = $ape2;
        $this->rol = $rol;
        $this->nombre = $nombre;
    }

    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }
    

    /**
     * Get the value of ape1
     */
    public function getApe1()
    {
        return $this->ape1;
    }

    /**
     * Set the value of ape1
     */
    public function setApe1($ape1): self
    {
        $this->ape1 = $ape1;

        return $this;
    }

    /**
     * Get the value of ape2
     */
    public function getApe2()
    {
        return $this->ape2;
    }

    /**
     * Set the value of ape2
     */
    public function setApe2($ape2): self
    {
        $this->ape2 = $ape2;

        return $this;
    }

    /**
     * Get the value of rol
     */
    public function getRol()
    {
        return $this->rol;
    }

    /**
     * Set the value of rol
     */
    public function setRol($rol): self
    {
        $this->rol = $rol;

        return $this;
    }

    /**
     * Get the value of nombre
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     */
    public function setNombre($nombre): self
    {
        $this->nombre = $nombre;

        return $this;
    }
}
