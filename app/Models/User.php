<?php

namespace App\Models;

use App\Enums\UserRole; // <-- Tambahkan ini
use Filament\Models\Contracts\FilamentUser; // <-- Tambahkan ini
use Filament\Panel; // <-- Tambahkan ini
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;

// Pastikan Anda menambahkan "implements FilamentUser"
class User extends Authenticatable implements FilamentUser
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
        'role', // <-- Tambahkan 'role' di sini
    ];

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
            'role' => UserRole::class, // <-- Lakukan casting ke Enum
        ];
    }

    /**
     * Metode ini adalah KUNCI UTAMA untuk keamanan panel Anda.
     * Filament akan memanggil ini untuk memeriksa izin akses.
     */
    public function canAccessPanel(Panel $panel): bool
    {
        // Hanya izinkan akses jika rolenya adalah Admin.
        return $this->role === UserRole::Admin;
    }

    /**
     * Get the user's initials
     */
    public function initials(): string
    {
        return Str::of($this->name)
            ->explode(' ')
            ->take(2)
            ->map(fn ($word) => Str::substr($word, 0, 1))
            ->implode('');
    }
}
