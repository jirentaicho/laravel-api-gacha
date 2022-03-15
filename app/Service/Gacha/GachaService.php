<?php

namespace App\Service\gacha;

use App\Domain\Model\Character\CharacterList;

interface GachaService{

    function play(int $user_id, string $type) : CharacterList;

    function addStone(int $user_id, int $amt);
}