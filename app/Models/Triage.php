<?php

namespace IPMEDT4K\Models;

use Illuminate\Database\Eloquent\Model;

class Triage extends Model 
{
    /**
     * @var array
     */
    protected $with = [
        'comparisons'
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function patients () {
        return $this->belongsTo(Patient::class, 'id', 'triage_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comparisons() {
        return $this->hasMany(TriageComparison::class, 'triage_a_id', 'id');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeOnmiddelijk ($query) {
        return $query->where('slug', str_slug('Onmiddelijk'))->first();
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeHoogUrgent ($query) {
        return $query->where('slug', str_slug('Hoog urgent'))->first();
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeUrgent ($query) {
        return $query->where('slug', str_slug('Urgent'))->first();
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeStandaard ($query) {
        return $query->where('slug', str_slug('Standaard'))->first();
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeNietUrgent ($query) {
        return $query->where('slug', str_slug('Niet urgent'))->first();
    }
}