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

    /**
     * Relationships
     */
    public function pets()
    {
        return $this->hasMany(Pet::class, 'user_id'); // assuming user_id relationship exist on the table
    }
    
}
