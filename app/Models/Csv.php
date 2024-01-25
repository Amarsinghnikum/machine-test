<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Csv extends Model
{
    use HasFactory;
    protected $table = 'csv';
    protected $fillable = [
        'name',
        'email'
    ];

    public function createOrUpdate(array $attributes)
    {
        $uniqueAttributes = ['number'];

        $existingRecord = self::where($attributes)->first();

        if ($existingRecord) {
            return $existingRecord;
        }

        return self::create($attributes);
    }
}
