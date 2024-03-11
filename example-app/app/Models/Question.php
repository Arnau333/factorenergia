<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $table = 'Question';
    protected $primaryKey = 'id';

    protected $fillable = [
        'Tagged',   //string
        'Todate',   //date
        'Fromdate'  //date
    ];

    // Accessor for 'Tagged'
    public function getTaggedAttribute($value)
    {
        return ucfirst($value);
    }

    // Accessor for 'Todate'
    public function getTodateAttribute($value)
    {
        return $value;
    }

    // Accessor for 'Fromdate'
    public function getFromdateAttribute($value)
    {
        return $value;
    }

    // Mutator for 'Tagged'
    public function setTaggedAttribute($value)
    {
        return $value;
    }

    // Mutator for 'Todate'
    public function setTodateAttribute($value)
    {
        $this->attributes['Todate'] = $value;
    }

    // Mutator for 'Fromdate'
    public function setFromdateAttribute($value)
    {
        $this->attributes['Fromdate'] = $value;
    }
}
