<?php

namespace App\Http\Resources;

use App\Models\Session;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->user_id,
            'name'=>$this->name,
            'email'=>$this->email,
            'session'=>$this->session_details($this->user_id),
        ];
    }

    private function session_details($id){
        $session = Session::whereIn('user1_id',[auth()->id(), $id])->whereIn('user2_id', [auth()->id(), $id])
            ->first();

        return new SessionResource($session);
    }
}
