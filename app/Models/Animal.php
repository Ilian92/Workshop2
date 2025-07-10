<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Animal extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type_animal_id',
        'nom',
        'race',
        'age',
        'dateNaissance',
        'caractere',
    ];

    protected function casts(): array
    {
        return [
            'dateNaissance' => 'date',
        ];
    }

    /**
     * Get the user that owns the animal.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the type of the animal.
     */
    public function typeAnimal(): BelongsTo
    {
        return $this->belongsTo(TypeAnimal::class);
    }
}
