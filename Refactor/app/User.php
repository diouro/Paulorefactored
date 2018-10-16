<?php

namespace App;

class User extends Model
{

    /**
     * Function to accessor the user display name
     */
    public function getDisplayNameAttribute()
    {
        return $this->first_name . ' ' . $this->middle_name . ' ' . $this->last_name;
    }

}
