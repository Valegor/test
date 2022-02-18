<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TemplateComment extends Model
{
    protected $table = 'template_comment';

    protected $fillable = ['parent_id', 'template_id', 'text',
    'author_id', 'author_name', 'author_email', 'aviable', 
    'created_at', 'updated_at'];

    use HasFactory;
}
