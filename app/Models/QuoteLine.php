<?php

// app/Models/QuoteLine.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QuoteLine extends Model
{
    protected $fillable = [
        'quote_document_id',
        'title','description','qty','unit','unit_price','line_total',
        'sort_order',
    ];

    protected $casts = [
        'qty' => 'decimal:2',
        'unit_price' => 'decimal:2',
        'line_total' => 'decimal:2',
    ];

    public function document(): BelongsTo
    {
        return $this->belongsTo(QuoteDocument::class, 'quote_document_id');
    }
}