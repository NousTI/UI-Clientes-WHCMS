<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * @property int $id
 * @property int $user_id
 * @property string $referred_name
 * @property Carbon $registered_at
 * @property string $status
 * @property float $commission_rate
 * @property float $total_earned
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 */
class Referral extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'referred_name',
        'registered_at',
        'status',
        'commission_rate',
        'total_earned',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'registered_at' => 'date',
            'commission_rate' => 'float',
            'total_earned' => 'float',
        ];
    }

    /**
     * Get the user who owns this referral.
     *
     * @return BelongsTo<User, $this>
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
