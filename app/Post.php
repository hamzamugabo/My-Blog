<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    //

    /**
     * The connection name for the model.
     *
     * @var string
     */
    protected $connection = 'pgsql';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id',
        'post_name',
        'posted_by',
        'created_at',
    ];

    protected $dates = [
        'created_at',
        'updated_at',
    ];


    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * The primary key for the model.
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;


    public function comments(){

        return $this->hasMany(Comment::class);
    }
}
