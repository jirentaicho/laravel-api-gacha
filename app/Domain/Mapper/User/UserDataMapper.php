<?php

namespace App\Domain\Mapper\User;

use App\Domain\Model\User\UserData;
use App\Models\User;

class UserDataMapper {
    public function toUserData(User $user): UserData {
        return new UserData($user->id, $user->stone_amt);
    }
}