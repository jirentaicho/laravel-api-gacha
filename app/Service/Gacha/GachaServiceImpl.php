<?php

namespace App\Service\Gacha;

use App\Domain\Model\Character\CharacterList;
use App\Domain\Model\Character\CharacterRepository;
use App\Domain\Model\Gacha\NormalGacha;
use App\Domain\Model\User\UserDataRepository;
use App\Events\UsedStone;
use App\Exceptions\ApiException;
use App\Service\Gacha\GachaService;
use Exception;
use Illuminate\Http\JsonResponse;

class GachaServiceImpl implements GachaService{

    private UserDataRepository $userDataRepository;

    private CharacterRepository $characterRepository;

    public function __construct(
        UserDataRepository $userDataRepository,
        CharacterRepository $characterRepository
    )
    {
        $this->userDataRepository = $userDataRepository;
        $this->characterRepository = $characterRepository;
    }

    function play(int $user_id, string $type) : CharacterList
    {
        $userData = $this->userDataRepository->find($user_id);
        if(!$userData->useStone(3000)){
            // error
            throw new ApiException(['result' => 'ガチャ石が足りません']);
        }
        $this->userDataRepository->save($userData);
        //　イベントの発火(メール処理とか本来はここでやるといい)
        UsedStone::dispatch(3000, $type);

        //　ガチャ設定
        $gacha = new NormalGacha($this->characterRepository->findAll());
        $result = $gacha->getCharacters(10);

        return $result;
    }


    public function addStone(int $user_id, int $amt){
        $userdata = $this->userDataRepository->find($user_id);
        $userdata->addStone($amt);
        $this->userDataRepository->save($userdata);      
    }
}