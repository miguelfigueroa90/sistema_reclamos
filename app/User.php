<?php

namespace App;

// use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    protected $connection = 'pgsql_espejo';
    protected $table = 'usuarios';
    protected $primaryKey = 'id';

    public $timestamps = false;

    public function getRememberToken()
	{
		return null; // not supported
	}

	public function setRememberToken($value)
	{
		// not supported
	}

	public function getRememberTokenName()
	{
		return null; // not supported
	}

	/**
	* Overrides the method to ignore the remember token.
	*/
	public function setAttribute($key, $value)
	{
		$isRememberTokenAttribute = $key == $this->getRememberTokenName();

		if (!$isRememberTokenAttribute) {
			parent::setAttribute($key, $value);
		}
	}
}
