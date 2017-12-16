<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    /**
     * Don't auto-apply mass assignment protection.
     *
     * @var array
     */
    protected $guarded = [];
    
    protected $hidden = ['token', 'created_at', 'updated_at'];
    
    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['user', 'status', 'type'];
    
    /**
     * Get the owner of this application
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * Get the application status
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function status()
    {
        return $this->belongsTo(ApplicationStatus::class, 'application_status_id');
    }
    
    /**
     * Get the application type.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function type()
    {
        return $this->belongsTo(ApplicationType::class, 'application_type_id');
    }
    
    /**
     * Application main route key.
     *
     * @return string
     */
    public function getRouteKeyName(){
        return 'token';
    }
}
