<?php

namespace App;

class Pet extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pets';

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
