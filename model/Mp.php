<?php


class Mp
{
    private $idMp;
    private $numMp;
    private $nomMp;



    /**
     * Mp constructor.
     * @param $idMp
     * @param $numMp
     * @param $nomMp
     */
    public function __construct($idMp, $numMp, $nomMp)
    {
        $this->idMp = $idMp;
        $this->numMp = $numMp;
        $this->nomMp = $nomMp;
    }

    /**
     * @return mixed
     */
    public function getIdMp()
    {
        return $this->idMp;
    }

    /**
     * @param mixed $idMp
     */
    public function setIdMp($idMp)
    {
        $this->idMp = $idMp;
    }

    /**
     * @return mixed
     */
    public function getNumMp()
    {
        return $this->numMp;
    }

    /**
     * @param mixed $numMp
     */
    public function setNumMp($numMp)
    {
        $this->numMp = $numMp;
    }

    /**
     * @return mixed
     */
    public function getNomMp()
    {
        return $this->nomMp;
    }

    /**
     * @param mixed $nomMp
     */
    public function setNomMp($nomMp)
    {
        $this->nomMp = $nomMp;
    }




}