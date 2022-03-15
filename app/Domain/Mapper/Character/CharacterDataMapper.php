<?php

namespace App\Domain\Mapper\Character;

use App\Domain\Model\Character\CharacterData;
use App\Domain\Model\User\UserData;
use App\Models\Character;
use App\Models\User;

class CharacterDataMapper {

    public function toCharacterData(Character $character): CharacterData {
        return new CharacterData($character->lank, $character->name);
    }
    
}