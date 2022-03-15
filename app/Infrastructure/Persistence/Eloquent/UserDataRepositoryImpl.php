<?php

namespace App\Infrastructure\Persistence\Eloquent;

use App\Domain\Mapper\User\UserDataMapper;
use App\Domain\Model\User\UserData;
use App\Domain\Model\User\UserDataRepository;
use App\Models\User;

class UserDataRepositoryImpl implements UserDataRepository{
    
    function find(int $user_id) : UserData{
        $user = User::find($user_id);
        $mapper = new UserDataMapper();
        return $mapper->toUserData($user);
    }

    function save(UserData $userData) : void {
        $user = User::find($userData->getId());
        $user->stone_amt = $userData->getStoneAmt();
        $user->save();
    }
}