<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Campaign extends Model
{
    /** @use HasFactory<\Database\Factories\CampaignFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'goal_amount',
        'current_amount',
        'start_date',
        'status',
        'end_date',
        'user_id',
    ];

    /**
     * @var array<string>
     */
    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'goal_amount' => 'decimal:2',
        'current_amount' => 'decimal:2',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function donations(): HasMany
    {
        return $this->hasMany(Donation::class);
    }
}
