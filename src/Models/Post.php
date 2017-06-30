<?php

namespace Kntpva\Blog\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];

    public function created_project($data)
    {
        $this->title = $this->setValue($data, 'title');
        $this->body = $this->setValue($data, 'body');
        $this->slug = '';
        $this->enabled = 1;
        $this->save();

    }

    private function setValue($array, $key)
    {
        return key_exists($key, $array) ? $array[$key] : '';
    }

    protected $fillable = ['title', 'slug', 'body', 'user_id',];
}
