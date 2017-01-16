<?php
namespace GestSchool\Domain;

/**
 *
 * @author trigger
 *        
 */
class Serie
{

    /**
     * Serie code.
     *
     * @var string
     */
    private $code;

    /**
     * Serie libelle.
     *
     * @var string
     */
    private $libelle;

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