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

    // public function admin() {
    //     return $this->belongsTo(Admin::class);
    // }

    // Helper Methods
    public function candidateFullName() {

        return $this->canLastName . " "  . $this->canMiddleName . " " . $this->canFirstName;
    }

    public function dadFullName() {

        return $this->dadLastName . " "  . $this->dadMiddleName . " " . $this->dadFirstName;
    }

    public function momFullName() {

        return $this->momLastName . " "  . $this->momMiddleName . " " . $this->momFirstName;
    }

    public function sponsorFullName() {

        return $this->sponLastName . " "  . $this->sponMiddleName . " " . $this->sponFirstName;
    }

    public function getAge() {
        return  (int)date('Y') - (int)substr($this->dateOfBirth,0,4);
    }


}
