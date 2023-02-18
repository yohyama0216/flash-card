<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Deck extends Collection
{
    use HasFactory;

    public function cards(): BelongsToMany
    {
        return $this->belongsToMany(Card::class);
    }
}
