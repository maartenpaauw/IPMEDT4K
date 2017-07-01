<?php

namespace IPMEDT4K\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model 
{
    protected $with = ['triage', 'status'];
    protected $fillable = ['number', 'first_name', 'band_number', 'last_name', 'status_id'];

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

    public function scopeWachten ($query) {
        return $query->where('status_id', Status::wachten()->id);
    }

    public function scopeMonitor ($query) {
        return $query
            ->wachten()
            ->orderBy('triage_id', 'ASC')
            ->orderBy('created_at', 'ASC')
            ->orderBy('treated_at', 'ASC')
            ->orderBy('checked_in_at', 'ASC')
        ;
    }
}