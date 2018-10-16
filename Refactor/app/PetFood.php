<?php

namespace App;

class PetFood extends Model
{

    /**
     * Function to accessor the user display name
     */
    public function getFavoriteFoodAttribute()
    {
        return $this->first_name . ' ' . $this->middle_name . ' ' . $this->last_name;
    }

}
