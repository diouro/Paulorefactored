<?php

namespace App;

class PetFood extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pet_foods';

    /**
     * Function to accessor the user display name
     */
    public function getFavoriteFoodAttribute()
    {
        return $this->first_name . ' ' . $this->middle_name . ' ' . $this->last_name;
    }

}
