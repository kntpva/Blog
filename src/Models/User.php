<?php

namespace Kntpva\Blog\Models;

use Hash;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function created_user($data)
    {
        $this->name = $this->setValue($data, 'name');
        $this->email = $this->setValue($data, 'email');
        $this->password = $password = Hash::make($this->setValue($data, 'password'));
        $this->save();
    }
    private function setValue($array, $key)
    {
        return key_exists($key, $array) ? $array[$key] : '';
    }
}
