<?php

namespace App\Domain\Model\Gacha;

use App\Domain\Model\Character\CharacterData;
use App\Domain\Model\Character\CharacterList;
use App\Domain\Model\Gacha\Gacha;

class NormalGacha implements Gacha {

    private CharacterList $characterList;

    public function __construct(CharacterList $list)
    {
        $this->characterList = $list;
    }

    // TODO 実装
    public function getCharacter() : CharacterData{
        return new CharacterData(1,"御坂クローン");
    }

    public function getCharacters(int $num) : CharacterList{
        $this->shuffle();
        return $this->characterList->getCharactersListByNum($num);
    }

    private function shuffle() : void {
        $this->characterList->shuffle();
    }



}