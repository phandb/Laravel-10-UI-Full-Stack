<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    protected $fillable = [
        'canFirstName',
        'canMiddleName',
        'canLastName',
        'canSaintName',
        'dateOfBirth',
        'address',       
        'email',
        'is_baptized_at_HVMCC',
        'baptizedYear',
        'baptismForm',
        'filePath',
        'dadFirstName',
        'dadLastName',
        'dadPhone',
        'momFirstName',
        'momLastName',
        'momPhone',
        'sponFirstName',
        'sponLastName',
        
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

}
