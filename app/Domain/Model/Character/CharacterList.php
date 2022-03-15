<?php

namespace App\Domain\Model\Character;

use App\Domain\Mapper\Character\CharacterDataMapper;
use App\Models\Character;
use Illuminate\Contracts\Support\Arrayable;

/**
 * 
 * arrayで管理したくないので
 * キャラクターリストクラスを作成します。
 * これ全部をDtoに変換するようなのあれば・・・
 * 
 */
class CharacterList implements Arrayable{

    // キャラクターのリスト
    private array $characters = array();

    public function getCharactersList() : array {
        return $this->characters;
    }

    public function toArray() : array{
      
        // response->json()に適合させるために連想配列に変換します。
        return array_map(function(CharacterData $character){
            return [
                'lank' => $character->getLank(),
                'name' => $character->getName(),
            ];
        },$this->characters);

    }
    /**
     * キャラクターのリストをshuffleします
     */
    public function shuffle() : void {
        shuffle($this->characters);
    }

    // ここ配列じゃなくてクラスを返すようにする「
    public function getCharactersListByNum(int $num) : CharacterList{
        $this->characters = array_slice($this->characters, 0, $num);
        return $this;
    }



    /**
     * CharacterDataをリストに追加します
     */
    public function addCharacterData(CharacterData $character){
        array_push($this->characters, $character);
    }

    /**
     * Cahracterのリストを全てCharacterDataに変換してリストに追加します
     */
    public function addCharactersToData(array $characters){
        $mapper = new CharacterDataMapper();
  
        $list = array_map(function(Character $character) use ($mapper) {
            return $mapper->toCharacterData($character);
        },$characters);

        $this->characters = array_merge($this->characters, $list);
    }

}