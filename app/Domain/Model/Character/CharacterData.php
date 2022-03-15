<?php

namespace App\Domain\Model\Character;

class CharacterData {

    private int $lank;

    private string $name;

    
    public function __construct(int $lank, string $name){
        $this->lank = $lank;
        $this->name = $name;
    }

    public function getLank(): int {
        return $this->lank;
    }

    public function getName(): string{
        return $this->name;
    }


}