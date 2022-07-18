<?php
/**
 * @vendor: Lynrantic co ltd
 * @developer: Hamis Hamis
 * @email: developer@lynrantic.co.tz
 * Date: 07/18/2021
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use OwenIt\Auditing\Auditable;
use OwenIt\Auditing\Contracts\Auditable as AuditableContract;
use Webpatser\Uuid\Uuid;

class BaseModel extends Model implements  AuditableContract
{
    use Auditable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = ['uuid'];

    protected $auditableEvents = [
        'deleted',
        'updated',
        'restored',
        'created'
    ];

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'uuid';
    }

    /**
     *  Setup model event hooks
     */
    public static function boot()
    {
        parent::boot();
        self::creating(function ($model) {
            $model->uuid = (string) Uuid::generate(4);
        });
    }

}