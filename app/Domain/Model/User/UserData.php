<?php

namespace App\Domain\Model\User;

use App\Models\User;

class UserData {

    private int $id;

    private Stone $stone;

    public function __construct(int $id,int $amt)
    {
        $this->id = $id;
        $this->stone = new Stone($amt);
    }

    public function getId() : int {
        return $this->id;
    }

    public function useStone(int $sub) : bool {
        if($this->stone->canGacha($sub)){
            $this->stone = $this->stone->sub($sub);
            return true;
        }
        return false;
    }

    public function addStone(int $amt) : void {
        $this->stone = $this->stone->add($amt);
    }

    public function getStoneAmt() : int {
        return $this->stone->getAmt();
    }



}