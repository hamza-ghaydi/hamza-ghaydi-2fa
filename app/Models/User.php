<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'two_factor_enabled',
        'two_factor_code',
        'two_factor_expires_at',
        'two_factor_verified',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'two_factor_expires_at' => 'datetime',
        'two_factor_enabled' => 'boolean',
        'two_factor_verified' => 'boolean',
    ];


    public function generateTwoFactorCode(): string
    {
        $code = str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        
        $this->update([
            'two_factor_code' => $code,
            'two_factor_expires_at' => Carbon::now()->addHour(),
            'two_factor_verified' => false,
        ]);

        return $code;
    }

    public function resetTwoFactorCode(): void
    {
        $this->update([
            'two_factor_code' => null,
            'two_factor_expires_at' => null,
            'two_factor_verified' => false,
        ]);
    }

    public function enableTwoFactor(): void
    {
        $this->update(['two_factor_enabled' => true]);
    }

    public function disableTwoFactor(): void
    {
        $this->update([
            'two_factor_enabled' => false,
            'two_factor_code' => null,
            'two_factor_expires_at' => null,
            'two_factor_verified' => false,
        ]);
    }

    public function verifyTwoFactorCode(string $code): bool
    {
        if (!$this->two_factor_code || !$this->two_factor_expires_at) {
            return false;
        }

        if (Carbon::now()->isAfter($this->two_factor_expires_at)) {
            return false;
        }

        if ($this->two_factor_code !== $code) {
            return false;
        }

        $this->update(['two_factor_verified' => true]);
        return true;
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
