<?php

namespace App\Repository\Query\Trait;

trait WhereLike
{
    public function whereLikeWithEscape(
        $query,
        string $column,
        string $value
    ): \Illuminate\Database\Eloquent\Builder {
        $escapedValue = addcslashes($value, '%_\\');
        return $query
            ->where($column, 'like', "%{$escapedValue}%");
    }
}