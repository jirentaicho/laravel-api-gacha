<?php

namespace App\Domain\Model\User;

interface UserDataRepository{

    function find(int $user_id) : UserData;

    function save(UserData $user_data) : void;

}