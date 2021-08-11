<?php

declare(strict_types=1);

namespace App\Models\Blog;

use App\Models\Commentable;
use App\Traits\HasComments;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Spatie\Image\Exceptions\InvalidManipulation;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\Image\Manipulations;

class Article extends Model implements HasMedia, Commentable
{
    use HasFactory;
    use InteractsWithMedia;
    use HasComments;

    protected $guarded = ['is_published'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function post(): MorphTo
    {
        return $this->morphTo();
    }

    public function applications(): HasMany
    {
        return $this->hasMany(Application::class);
    }

    public function registerMediaCollections():void {
        $this->addMediaCollection('preview')
            ->singleFile(); // TODO: 'add fallback file'
    }



    /**
     * @throws InvalidManipulation
     */
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->crop(Manipulations::CROP_CENTER, 256, 256)
            ->performOnCollections('preview');
    }
}
