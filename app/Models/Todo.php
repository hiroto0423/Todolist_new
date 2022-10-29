<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    protected $fillable = ['content','tag_id','user_id'];

    public function tag() {
        return $this->belongsTo('App\Models\Tag');
    }
    public function user()
    {
        return $this->BelongsTo(User::class);
    }
    public function selectedTag($tag_id) {
        if ($this->tag_id == $tag_id) {
            return 'selected';
        }else {
            return '';
        }
        
    }
}
