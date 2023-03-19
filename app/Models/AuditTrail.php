<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditTrail extends Model
{
    use HasFactory;

    protected $table="audit_trail";
    protected $fillable = [
        'user_id',
        'field',
        'old_value',
        'new_value',
    ];

    /**
     * Get the user who made the change.
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}
