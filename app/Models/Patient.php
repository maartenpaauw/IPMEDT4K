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

    public function scopeOnmiddelijk ($query) {
        return $query->where('triage_id', Triage::onmiddelijk()->id);
    }

    public function scopeHoogUrgent ($query) {
        return $query->where('triage_id', Triage::hoogUrgent()->id);
    }

    public function scopeUrgent ($query) {
        return $query->where('triage_id', Triage::Urgent()->id);
    }

    public function scopeStandaard ($query) {
        return $query->where('triage_id', Triage::standaard()->id);
    }

    public function scopeNietUrgent ($query) {
        return $query->where('triage_id', Triage::nietUrgent()->id);
    }
}