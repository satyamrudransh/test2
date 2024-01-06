<?php

namespace App\Http\Resources;
use App\Models\UserCoins\UserCoins;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $totalCoins = $this->userCoins->sum('coins');

        // return parent::toArray($request);
        return [
            'userId' => $this -> userId,
            'firstName' => $this -> firstName,
            'lastName' => $this -> lastName,
            'email' => $this -> email,
            'avatar' => $this -> avatar,
            'usersJoiningDetails'=> UsersJoiningDetailsResource::collection($this->whenLoaded('usersJoiningDetails')),
            // 'totalCoins' => $this->getTotalCoins(),
            // 'totalCoins' => $this->userCoins->sum('coins'),
            'totalCoins' => $totalCoins,


        ];
    }
    // private function getTotalCoins()
    // {
    //     // Use the UserCoin model to query and sum the coins for this user
    //     $totalCoins = UserCoins::where('userId', $this->userId)->sum('coins');
        
    //     return $totalCoins;
    // }
}
