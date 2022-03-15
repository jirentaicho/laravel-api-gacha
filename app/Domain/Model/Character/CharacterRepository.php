<?php

namespace App\Domain\Model\Character;

use App\Models\Character;

interface CharacterRepository{

    function findAll() : CharacterList;

}