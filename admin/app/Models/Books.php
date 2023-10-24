<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;
use Laravel\Scout\Searchable;

class Books extends Model
{
    use HasFactory, SoftDeletes, Searchable;
    protected $table = "books";
    
    protected $fillable = [
        'title',
        'author', 
        'genre',
        'isbn',
        'image',
        'published',
        'publisher',
        'description',
        'active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function getPublishedAttribute($value)
    {
        return Carbon::parse($value)->format('d/m/Y');
    }

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        return [
            'title' => $this->title,
            'author' => $this->author,
            'published' => $this->published,
            'publisher' => $this->publisher,
            'isbn' => $this->isbn,
            'genre' => $this->genre
        ];
    }

    public function scopeActive($query)
    {
        return $query->where('active', 1);
    }
}
