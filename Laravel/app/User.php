<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    // Hide password 
    protected $hidden = ['password'];

    /**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'email'
    ];

    /**
     * Function to accessor the user display name
     */
    public function getDisplayNameAttribute()
    {
        return $this->first_name . ' ' . $this->middle_name . ' ' . $this->last_name;
    }
    /**
     * Function to accessor the user display name
     */
    public function getLoginDateFormattedAttribute()
    {
        return $this->login_date->format('Y-m-d H:i:s');
    }
    /**
     * Function to accessor the user display name
     */
    public function getCreateDateFormattedAttribute()
    {
        return $this->created_at->format('Y-m-d H:i:s');
    }
    /**
     * Function to accessor the user display name
     */
    public function getUpdateDateFormattedAttribute()
    {
        return $this->updated_at->format('Y-m-d H:i:s');
    }

    /**
     * Relationships
     */
    public function pets()
    {
        return $this->hasMany(Pet::class, 'user_id'); // assuming user_id relationship exist on the table
    }

}
