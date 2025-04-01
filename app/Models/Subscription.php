<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Mail;

class Subscription extends Model
{
    use HasFactory;

    protected $fillable = ['email'];

    public static function to($email)
    {
        return new static(compact('email'));
    }

    public function send($email)
    {
        Mail::to($this->email)->send($email);
    }
}
