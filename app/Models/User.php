<?php

namespace App\Models;

use App\Models\Schmas\Constants\BaseConstants;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        BaseConstants::PASSPORT_ID,
        BaseConstants::NAME,
        BaseConstants::EMAIL,
        BaseConstants::PASSWORD,
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        BaseConstants::PASSWORD,
        BaseConstants::REMEMBER_TOKEN,
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        BaseConstants::EMAIL_VERIFIED_AT => 'datetime',
        BaseConstants::PASSWORD => 'hashed',
    ];

    /**
     * @param Builder $builder
     * @return void
     */
    public function scopeFindUser(Builder $builder): void
    {
        $builder->where(BaseConstants::PASSPORT_ID, \request()->route(BaseConstants::PASSPORT_ID_REQUEST));
    }

    /**
     * @return HasMany
     */
    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class, BaseConstants::USER_ID, BaseConstants::ID);
    }
}
