<?php

namespace App\Http\Resources;

use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FixtureResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $home = Team::find($this->home);
        $away = Team::find($this->away);

        return [
            'id' => $this->id,
            'home' => (new TeamResource($home)),
            'away' => (new TeamResource($away)),
            'matchPlayed' => $this->matchPlayed,
            'score'  => $this->score
        ];
    }
}
