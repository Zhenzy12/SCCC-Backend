<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Models\BorrowTransactions;
use App\Models\Categories;
use App\Models\Borrowers;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'firstName',
        'middleName',
        'lastName',
        'email',
        'password',
        'for_911',
        'for_inventory',
        'is_deleted'
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
        ];
    }

    public function borrowers()
    {
        return $this->hasMany(BorrowTransactions::class, 'lender_id');
    }

    public function categories()
    {
        return $this->hasMany(Categories::class, 'deleted_by');
    }

    public function borrowersCreatedBy()
    {
        return $this->hasMany(Borrowers::class, 'deleted_by');
    }

}
