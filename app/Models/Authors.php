<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Authors extends Model
{
    use HasFactory;
    /**
     * Fillable properties.
     *
     * @var array
     */
    public  $fillable=['aname'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table='authors';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * Get the books for the author.
     */
    public function author_book()
    {
        return $this->hasMany('App\Models\AutBook','author_id');
    }
}
