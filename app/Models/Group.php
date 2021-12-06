<?php

namespace App\Models;

use Database\Factories\GroupFactory;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Group
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $type
 * @property string $gift_max_price
 * @property string $gift_min_price
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read string $price_range
 * @property-read Collection|User[] $users
 * @property-read int|null $users_count
 * @method static GroupFactory factory(...$parameters)
 * @method static Builder|Group newModelQuery()
 * @method static Builder|Group newQuery()
 * @method static Builder|Group query()
 * @method static Builder|Group whereCreatedAt($value)
 * @method static Builder|Group whereDescription($value)
 * @method static Builder|Group whereGiftMaxPrice($value)
 * @method static Builder|Group whereGiftMinPrice($value)
 * @method static Builder|Group whereId($value)
 * @method static Builder|Group whereName($value)
 * @method static Builder|Group whereType($value)
 * @method static Builder|Group whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Group extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $appends = ['price_range'];

    /**
     * The users in this group
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function getPriceRangeAttribute(): string
    {
        return $this->gift_max_price . ' - ' . $this->gift_min_price;
    }
}
