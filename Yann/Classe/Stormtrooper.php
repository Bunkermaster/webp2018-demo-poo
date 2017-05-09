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
    protected $name;
    /** @var string $uuid */
    protected $uuid;

    /**
     * Stormtrooper constructor.
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
        $this->uuid = uniqid();
    }

    /**
     * @param Patrol $patrol
     */
    public function saluer(Patrol $patrol)
    {
        foreach($patrol->getCollection() as $trooper){
            /** @var SalutInterface $trooper */
            if(
                $this->uuid !== $trooper->getUuid()
                && $patrol->checkSalutation($this, $trooper) === false
            ){
                $patrol->addSalutations($this, $trooper);
                $thisClass = new \ReflectionClass($this);
                $trooperClass = new \ReflectionClass($trooper);
                printf('%s : '.APP_RANK_MSG[
                        APP_EMPIRE_RANKS[$thisClass->getName()] <=> APP_EMPIRE_RANKS[$trooperClass->getName()]
                    ].PHP_EOL,
                    $this->name, $trooper->getName()
                );
//                echo $this->name . ": Bonjour ".$trooper->getName() .PHP_EOL;
            }
        }
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

    /**
     * @param SalutInterface $trooper
     */
    protected function formatMessage(SalutInterface $trooper)
    {
        $thisClass = new \ReflectionClass($this);
        $trooperClass = new \ReflectionClass($trooper);
        printf(
            '%s : '.APP_RANK_MSG[
                APP_EMPIRE_RANKS[$thisClass->getName()] <=>
                APP_EMPIRE_RANKS[$trooperClass->getName()
                ]
            ].PHP_EOL,
            $this->name,
            $trooper->getName()
        );
    }

}
