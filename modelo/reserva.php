<?php
class reserva
{

    private $id_user;
    private $isbn_libro;
    private $f_desde;
    private $f_hasta;

    function __construct($id_user, $isbn_libro, $f_desde, $f_hasta)
    {
        $this->id_user = $id_user;
        $this->isbn_libro = $isbn_libro;
        $this->f_desde = $f_desde;
        $this->f_hasta = $f_hasta;
    }








    /**
     * Get the value of id_user
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * Set the value of id_user
     */
    public function setIdUser($id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }

    /**
     * Get the value of isbn_libro
     */
    public function getIsbnLibro()
    {
        return $this->isbn_libro;
    }

    /**
     * Set the value of isbn_libro
     */
    public function setIsbnLibro($isbn_libro): self
    {
        $this->isbn_libro = $isbn_libro;

        return $this;
    }

    /**
     * Get the value of f_desde
     */
    public function getFDesde()
    {
        return $this->f_desde;
    }

    /**
     * Set the value of f_desde
     */
    public function setFDesde($f_desde): self
    {
        $this->f_desde = $f_desde;

        return $this;
    }

    /**
     * Get the value of f_hasta
     */
    public function getFHasta()
    {
        return $this->f_hasta;
    }

    /**
     * Set the value of f_hasta
     */
    public function setFHasta($f_hasta): self
    {
        $this->f_hasta = $f_hasta;

        return $this;
    }
}
