<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'url',
        'thumb',
        'message',
        'votes_red',
        'votes_blue',
        'votes_total',
        'red_percent_vote',
        'blue_percent_vote',
    ];

    protected $appends = ['votes'];

    public function getVotesAttribute()
    {
        return [
            'red' => $this->votes_red,
            'blue' => $this->votes_blue,
            'total' => $this->votes_total,
            'red_percent' => $this->red_percent_vote,
            'blue_percent' => $this->blue_percent_vote,
        ];
    }

    /**
     * Update total and percent votes
     */
    public function updateVotePercent()
    {
        $total = $this->votes_red + $this->votes_blue;
        $this->votes_total = $total;

        if ($total > 0) {
            $this->red_percent_vote = round(($this->votes_red / $total) * 100, 1);
            $this->blue_percent_vote = round(($this->votes_blue / $total) * 100, 1);
        } else {
            $this->red_percent_vote = 0;
            $this->blue_percent_vote = 0;
        }

        $this->save();
    }

}
