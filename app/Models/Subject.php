<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Subject extends Model
{
            /** @use HasFactory<\Database\Factories\UserFactory> */
            use HasFactory, Notifiable;

            /**
             * The attributes that are mass assignable.
             *
             * @var list<string>
             */
            protected $fillable = [
                'course_id',
                'name',
                'semester',
                'year',
            ];
}
