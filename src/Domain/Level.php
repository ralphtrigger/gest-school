<?php
namespace GestSchool\Domain;

/**
 *
 * @author trigger
 *        
 */
class Level
{

    /**
     * Level id.
     *
     * @var integer
     */
    private $id;

    /**
     * Level code.
     *
     * @var string
     */
    private $code;

    /**
     * Level libelle.
     *
     * @var string
     */
    private $libelle;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
        return $this;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    public function getLibelle()
    {
        return $this->libelle;
    }

    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
        return $this;
    }
}