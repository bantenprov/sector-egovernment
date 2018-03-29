<?php

namespace Bantenprov\SectorEgovernment\Models\Bantenprov\SectorEgovernment;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SectorEgovernment extends Model
{
    use SoftDeletes;

    public $timestamps = true;

    protected $table = 'sector_egovernments';
    protected $dates = [
        'deleted_at'
    ];
    protected $fillable = [
        'label',
        'description',
        'user_id',
        'link',
    ];
    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
}
