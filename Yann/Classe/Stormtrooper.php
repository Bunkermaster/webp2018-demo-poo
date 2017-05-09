<?php

namespace Yann\Classe;

/**
 * Class Stormtrooper
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * @package Yann\Classe
 */
class Stormtrooper implements SalutInterface
{
    /** @var string $name */
    private $name;
    /** @var string $uuid */
    private $uuid;

    /**
     * Stormtrooper constructor.
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
        $this->uuid = uniqid();
    }

    public function saluer()
    {

    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getUuid(): string
    {
        return $this->uuid;
    }


}