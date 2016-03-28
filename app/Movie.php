<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model {

	protected $fillable = [
        'name',
        'year',
        'description',
        'filePath'
    ];

    /**
     * An movie is owned by a user.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

}
