<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter
{
    public const PROPERTIES = 'properties';


    protected function getCallbacks(): array
    {
        return [
            self::PROPERTIES => [$this, 'properties']
        ];
    }

    public function properties(Builder $builder, $value): void
    {
        foreach ($value as $propertyName => $propertyValue) {
            $builder->whereHas('options', function ($query) use ($propertyName, $propertyValue) {
                $query->whereIn('value', $propertyValue)->where('name', $propertyName);
            });
        }
    }
}
