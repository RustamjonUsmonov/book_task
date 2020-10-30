<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    use HasFactory;
    /**
     * Fillable properties.
     *
     * @var array
     */
    public  $fillable=['bname'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table='books';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
    public function author_book()
    {
        return $this->hasMany('App\Models\AutBook','book_id');
    }
}
