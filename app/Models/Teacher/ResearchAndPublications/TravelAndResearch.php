<?php

namespace App\Models\Teacher\ResearchAndPublications;

use App\User;
use Illuminate\Database\Eloquent\Model;

class TravelAndResearch extends Model
{

    protected $table = "travel_and_researches";

    protected $fillable =
        [
            'user_id','research_type','funding_agency','venue',
            'total_grants','approval'
        ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
