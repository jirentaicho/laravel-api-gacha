<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Domain\Model\Character\CharacterList;
use App\Domain\Model\Character\CharacterRepository;
use App\Models\Character;

class CharacterRepositoryImpl implements CharacterRepository{

    function findAll() : CharacterList
    {
        // 全件取得する
        $characters = Character::get()->all();
        // 変換して渡す
        $characterList = new CharacterList();
        $characterList->addCharactersToData($characters);

        return $characterList;
    }
    
}