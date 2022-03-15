<?php

namespace App\Domain\Model\Gacha;

use App\Domain\Model\Character\CharacterData;
use App\Domain\Model\Character\CharacterList;

interface Gacha {
    public function getCharacter() : CharacterData;

    public function getCharacters(int $num) : CharacterList;
}