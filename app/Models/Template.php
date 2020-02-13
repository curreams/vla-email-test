<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Template extends Model
{
    

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'OB_NOREPLY_TEMPLATES';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'VIT_TEMPLATE_ID';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = [
                  'VIT_TEMPLATE_NAME',
                  'VIT_SECTION',
                  'VIT_SUBJECT',
                  'VIT_TEMPLATE'
              ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [];
    
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];
    



}
