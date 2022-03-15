<?php

namespace App\Domain\Model\User;


class Stone {

    private int $amt;

    public function __construct(int $amt)
    {
        $this->amt = $amt;
    }

    /**
     * 石の数からガチャが引けるか判定します
     */
    public function canGacha(int $sub) : bool {
        if( 0 > $this->amt - $sub){
            return false;
        }
        return true;
    }


    /**
     * 石をマイナスします
     */
    public function sub(int $sub) : Stone {
        $this->amt -= $sub;
        return $this;
    }


    public function add(int $amt) : Stone {
        $this->amt += $amt;
        return $this;
    }

    public function getAmt() : int {
        return $this->amt;
    }

}