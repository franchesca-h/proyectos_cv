<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Complaint extends Model
{
    const TABLE_NAME = 'complaints';
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'claim_date',
        'consumer_name',
        'consumer_address',
        'document_type',
        'document_number',
        'phone',
        'email',
        'product_type',
        'claimed_amount',
        'product_description',
        'claim_detail',
        'conformity',
        'status',
        'internal_comments',
    ];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = self::TABLE_NAME;

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'claim_date' => 'date',
        'claimed_amount' => 'decimal:2',
        'conformity' => 'boolean',
    ];
}

