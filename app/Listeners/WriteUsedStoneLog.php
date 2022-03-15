<?php

namespace App\Listeners;

use App\Events\UsedStone;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class WriteUsedStoneLog
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\UsedStone  $event
     * @return void
     */
    public function handle(UsedStone $event)
    {
        // もちろんこんなイベントを作る必要はないですが
        Log::info('ガチャ石を' . $event->used_stone . '個、' . $event->gacha_type . 'に利用しました。');
    }
}
