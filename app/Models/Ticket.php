<?php

namespace App\Models;

use App\Models\Schmas\Constants\BaseConstants;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        BaseConstants::USER_ID,
        BaseConstants::ORIGIN,
        BaseConstants::ESTINATION,
        BaseConstants::START_DATE,
        BaseConstants::END_DATE
    ];

    /**
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            BaseConstants::USER_ID, BaseConstants::ID
        );
    }
}
