<?php

namespace IPMEDT4K\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model 
{
    public function scopeIngecheckt ($query) {
        return $query->where('slug', str_slug('Ingecheckt'))->first();
    }

    public function scopeWachten ($query) {
        return $query->where('slug', str_slug('Wachten'))->first();
    }

    public function scopeInBehandeling ($query) {
        return $query->where('slug', str_slug('In behandeling'))->first();
    }

    public function scopeUitgecheckt ($query) {
        return $query->where('slug', str_slug('Uitgecheckt'))->first();
    }
}