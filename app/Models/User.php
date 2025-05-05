<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
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
    protected $guarded = ['id'];

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

    public function people()
    {
        return $this->belongsTo(People::class);
    }

    public function agency()
    {
        return $this->hasOne(AgencyUser::class);
    }

    public function sendMessages()
    {
        return $this->morphMany(Message::class,'sender','sender_model');
    }

    public function sentMessages()
    {
        return $this->morphMany(Message::class, 'sender','sender_model');
    }


    public function receivedMessages()
    {
        return $this->morphMany(Message::class, 'receiver','receiver_model');
    }


    public function messages()
    {
        return $this->sentMessages()->union($this->receivedMessages()->toBase());
    }


    public function lastMessage()
    {
        return $this->hasOne(Message::class, 'sender_id')
            ->where('sender_model', 'App\Models\User')
            ->latest();
    }
}
