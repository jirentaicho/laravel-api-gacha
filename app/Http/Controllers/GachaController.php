<?php

namespace App\Http\Controllers;

use App\Service\Gacha\GachaService;
use Illuminate\Http\Request;

class GachaController extends Controller
{

    private GachaService $gachaService;

    public function __construct(GachaService $gachaService)
    {
        $this->gachaService = $gachaService;
    }


    // 実際のusersテーブルを利用しますが、認証処理を行いません。
    public function play(Request $request) {
        // requestのバリデーションは省略しています。

        // ユーザーIDは本来認証情報から取得します。
        $result = $this->gachaService->play($request->user_id, $request->type);

        // 結果はjsonで返却する
        return response()->json($result->toArray());

    }

    public function addStone(Request $request){
        $this->gachaService->addStone($request->user_id, $request->amt);
        return response()->json(['result' => '石を追加しました']);

    }
}
