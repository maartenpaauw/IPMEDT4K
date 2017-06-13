<?php

namespace IPMEDT4K\Models;

use Illuminate\Database\Eloquent\Model;

class Triage extends Model 
{
    public function scopeOnmiddelijk ($query) {
        return $query->where('slug', str_slug('Onmiddelijk'))->first();
    }

    public function scopeHoogUrgent ($query) {
        return $query->where('slug', str_slug('Hoog urgent'))->first();
    }

    public function scopeUrgent ($query) {
        return $query->where('slug', str_slug('Urgent'))->first();
    }

    public function scopeStandaard ($query) {
        return $query->where('slug', str_slug('Standaard'))->first();
    }

    public function scopeNietUrgent ($query) {
        return $query->where('slug', str_slug('Niet urgent'))->first();
    }
}