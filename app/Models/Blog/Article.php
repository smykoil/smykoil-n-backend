<?php

declare(strict_types=1);

namespace App\Models\Blog;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Article extends Model implements HasMedia
{
    use HasFactory;
    use InteractsWithMedia;

    protected $guarded = ['is_published'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function post(): MorphTo
    {
        return $this->morphTo();
    }

    public function registerMediaCollections():void {
        $this->addMediaCollection('preview')
            ->singleFile(); // TODO: 'add fallback file'
    }
}
