<?php
namespace GestSchool\Domain;

/**
 *
 * @author trigger
 *        
 */
class Classe
{

    /**
     * Class code.
     *
     * @var string
     */
    private $code;

    /**
     * Class serie.
     *
     * @var \GestSchool\Domain\Serie
     */
    private $serie;

    /**
     * Class level.
     *
     * @var \GestSchool\Domain\Level
     */
    private $level;

    /**
     * Class option.
     *
     * @var \GestSchool\Domain\Option
     */
    private $option;

    public function getCode()
    {
        return $this->code;
    }

    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    public function getSerie()
    {
        return $this->serie;
    }

    public function setSerie(Serie $serie)
    {
        $this->serie = $serie;
        return $this;
    }

    public function getLevel()
    {
        return $this->level;
    }

    public function setLevel(Level $level)
    {
        $this->level = $level;
        return $this;
    }

    public function getOption()
    {
        return $this->option;
    }

    public function setOption(Option $option)
    {
        $this->option = $option;
        return $this;
    }
}