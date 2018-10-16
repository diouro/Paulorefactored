<?php

namespace App;

class Pet extends Model
{

    /**
     * Function to accessor the user display name
     */
    public function getFavoriteFoodAttribute()
    {
        return $this->first_name . ' ' . $this->middle_name . ' ' . $this->last_name;
    }

    /**
     * Relationships
     */
    public function petFoods()
    {
        return $this->hasMany(PetFood::class, 'pet_id', 'id');  // Assuming PetFood has a pet_id relationship
    }

}
