<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateAnswer extends Model
{
    protected $table = 'template_answer';
    protected $fillable = ['title', 'subtitle', 'template_id',
        'author_id', 'author_name', 'author_email', 'aviable', 
        'object', 'created_at', 'updated_at'];

    use HasFactory;
}
