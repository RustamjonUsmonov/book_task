<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutBook extends Model
{
    use HasFactory;
    /**
     * Fillable properties.
     *
     * @var array
     */
    public  $fillable=['author_id','book_id'];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table='author_book';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
