<?php

// app/Models/QuoteDocument.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class QuoteDocument extends Model
{
    protected $fillable = [
        'quote_request_id',
        'number','date','valid_until',
        'customer_name','customer_email','customer_phone','customer_location',
        'vat_rate','discount','intro','notes','terms',
        'subtotal','vat_amount','total',
    ];

    protected $casts = [
        'date' => 'date',
        'valid_until' => 'date',
        'vat_rate' => 'decimal:2',
        'discount' => 'decimal:2',
        'subtotal' => 'decimal:2',
        'vat_amount' => 'decimal:2',
        'total' => 'decimal:2',
        'public_enabled' => 'boolean',
        'public_expires_at' => 'datetime',
        'sent_at' => 'datetime',
    ];

    public function request(): BelongsTo
    {
        return $this->belongsTo(QuoteRequest::class, 'quote_request_id');
    }

    public function lines(): HasMany
    {
        return $this->hasMany(QuoteLine::class)->orderBy('sort_order');
    }
}