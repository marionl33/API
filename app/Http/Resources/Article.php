<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Article extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return [
            'antenna' => $this->antenna,
            'number' => $this ->number,
            'tps' => $this ->tps,
            'RSSI' => $this ->RSSI,
            //'heart' => $this ->isHeartBeat


        ];
    }

    //to add information at every request
    public function with($request){
        return[
            'version' => '1.0.0',
        ];
    }
}
