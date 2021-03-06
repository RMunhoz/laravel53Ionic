<?php

namespace CodeDelivery\Models;

use Illuminate\Database\Eloquent\Model;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;

class Client extends Model implements Transformable
{
    use TransformableTrait;

    protected $fillable = [
        'fone',
        'address',
        'city',
        'state',
        'zipcode',
        'user_id'
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

}
