<?php

namespace IPMEDT4K\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model 
{
    protected $with = ['triage', 'status'];

    public function triage () {
        return $this->hasOne(Triage::class, 'id', 'triage_id');
    }

    public function status () {
        return $this->hasOne(Status::class, 'id', 'status_id');
    }
}