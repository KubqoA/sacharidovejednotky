<?php

namespace App;

use App\Scopes\LoggedInUserScope;
use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    use \Spiritix\LadaCache\Database\LadaCacheTrait;

    protected $guarded = [];

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new LoggedInUserScope());
    }

    public function user() {
        return $this->belongsTo(User::class);
    }
}
