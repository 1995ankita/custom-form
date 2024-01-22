<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomFieldField extends Model
{
    protected $table = 'mdl_customfield_field';
    public $timestamps = false;
    protected $fillable = [
        'shortname', 'name', 'type', 'description', 'descriptionformat',
        'sortorder', 'categoryid', 'configdata', 'timecreated', 'timemodified'
    ];
}
