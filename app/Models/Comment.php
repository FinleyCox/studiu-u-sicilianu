<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'article_id',
        'author_name',
        'body',
        'ip_address',
    ];

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }
}
