<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'name',
        'description',
        'status',
        'field_float',
        'field_integer',
        'field_bool',
        'field_date',
        'field_timestamp',
    ];

    protected $searchableFields = ['*'];

    protected $casts = [
        'field_bool' => 'boolean',
        'field_date' => 'date',
        'field_timestamp' => 'datetime',
    ];
}
