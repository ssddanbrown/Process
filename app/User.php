<?php namespace Process;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract {

	use Authenticatable, CanResetPassword;

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];


    /**
     * Gets all the projects that belong to a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function projects()
    {
        return $this->hasMany('Process\Models\Project');
    }

    /**
     * Gets an avatar image for the user.
     * By default it uses a gravatar.
     *
     * @param int $size
     * @return string
     */
    public function getAvatar($size = 50)
    {
        $email = md5(trim($this->email));
        $default = 'identicon';
        $url = '//www.gravatar.com/avatar/';
        return  $url . $email . '?d=' . $default . '&s=' . $size;
    }

}
