<?php

namespace IPMEDT4K\Models;

use Illuminate\Database\Eloquent\Model;

class TriageComparison extends Model 
{
    /**
     * @var string
     */
    protected $table = 'triages_comparison';

    /**
     * @var array
     */
    protected $with = [
        'a',
        'b'
    ];

    /**
     * @return mixed
     */
    public function a () {
        return $this->hasOne(Triage::class, 'id', 'triage_a_id')->without('comparisons');
    }

    /**
     * @return mixed
     */
    public function b () {
        return $this->hasOne(Triage::class, 'id', 'triage_b_id')->without('comparisons');
    }
}