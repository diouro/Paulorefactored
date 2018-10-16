<?php

namespace App;

class User extends Model
{

    public function getDisplayNameAttribute()
    {
        return $this->first_name . ' ' . $this->middle_name . ' ' . $this->last_name;
    }

}
