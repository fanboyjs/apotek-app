<?php

namespace App\Models;

use App\Models\Cart;
use App\Models\ProductTransaction;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
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
            'password'          => 'hashed',
        ];
    }

    // bikin relasi ke tabel carts
    public function carts()
    {
        return $this->hasMany(Cart::class);
    }

    // bikin relasi ke tabel product_transactions
    public function product_transactions()
    {
        return $this->hasMany(ProductTransaction::class);
    }
  
    // Tabel User dapat menerima banyak data dari tabel Socialite
    public function socialite()
    {
        return $this->hasMany(Socialite::class);
    }
}
