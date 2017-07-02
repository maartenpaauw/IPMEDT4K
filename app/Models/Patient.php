<?php

namespace IPMEDT4K\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model 
{
    /**
     * @var array
     */
    protected $with = ['triage', 'status'];

    /**
     * @var array
     */
    protected $fillable = [
        'number',
        'first_name',
        'band_number',
        'last_name',
        'status_id'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function triage () {
        return $this->hasOne(Triage::class, 'id', 'triage_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function status () {
        return $this->hasOne(Status::class, 'id', 'status_id');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeOnmiddelijk ($query) {
        return $query->where('triage_id', Triage::onmiddelijk()->id);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeHoogUrgent ($query) {
        return $query->where('triage_id', Triage::hoogUrgent()->id);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeUrgent ($query) {
        return $query->where('triage_id', Triage::Urgent()->id);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeStandaard ($query) {
        return $query->where('triage_id', Triage::standaard()->id);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeNietUrgent ($query) {
        return $query->where('triage_id', Triage::nietUrgent()->id);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeWachten ($query) {
        return $query->where('status_id', Status::wachten()->id);
    }

    /**
     * @param $query
     * @return mixed
     */
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