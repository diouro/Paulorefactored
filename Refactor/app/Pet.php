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
     * Relationships
     */
    public function favoriteFoods()
    {
        return $this->hasMany(PetFood::class, 'pet_id', 'id');  // Assuming PetFood has a pet_id relationship
    }

}
