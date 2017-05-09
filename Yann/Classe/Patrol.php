<?php

namespace Yann\Classe;

/**
 * Class Patrol
 * @author Yann Le Scouarnec <bunkermaster@gmail.com>
 * @package Yann\Classe
 */
class Patrol
{
    /** @var array $collection */
    private $collection;
    /** @var array $salutations */
    private $salutations = [];

    public function saluer()
    {
        if(count($this->collection) < 2){
            echo "Je me sens seul".PHP_EOL;
            return;
        }
        foreach($this->collection as $uuid => $trooper){
            $trooper->saluer($this);
        }
    }

    /**
     * @param null|string $uuid
     * @return array
     * @throws \Exception
     */
    public function getCollection($uuid = null): array
    {
        if(is_null($uuid)){
            return $this->collection;
        } elseif(isset($this->collection[$uuid])) {
            return $this->collection[$uuid];
        } else {
            throw new \Exception('UUID provided not found');
        }
    }

    /**
     * @param SalutInterface $trooper
     * @return $this
     * @internal param array $collection
     */
    public function addToCollection(SalutInterface $trooper)
    {
        $this->collection[$trooper->getUuid()] = $trooper;

        return $this;
    }

    /**
     * @param string $uuid
     * @throws \Exception
     */
    public function removeFromCollection($uuid)
    {
        if(isset($this->collection[$uuid])) {
            unset($this->collection[$uuid]);
        } else {
            throw new \Exception('UUID provided not found');
        }
    }

    /**
     * @return array
     */
    public function getSalutations(): array
    {
        return $this->salutations;
    }

    /**
     * @param SalutInterface $trooper1
     * @param SalutInterface $trooper2
     * @return $this
     * @internal param array $salutations
     */
    public function addSalutations(SalutInterface $trooper1, SalutInterface $trooper2)
    {
        $this->salutations[$trooper1->getUuid()][$trooper2->getUuid()] = true;
    }

    public function checkSalutation(SalutInterface $trooper1, SalutInterface $trooper2)
    {
        if(
            isset($this->salutations[$trooper1->getUuid()][$trooper2->getUuid()])
            && $this->salutations[$trooper1->getUuid()][$trooper2->getUuid()] == true
        ){
            return true;
        } else {
            return false;
        }
    }

}