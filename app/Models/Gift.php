<?php

namespace App\Models;

use Database\Factories\GiftFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Gift
 *
 * @property int $id
 * @property string $name
 * @property string $estimated_value
 * @property string $link
 * @property string $place
 * @property int $order
 * @property int $wish_list_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read WishList $wishList
 * @method static GiftFactory factory(...$parameters)
 * @method static Builder|Gift newModelQuery()
 * @method static Builder|Gift newQuery()
 * @method static Builder|Gift query()
 * @method static Builder|Gift whereCreatedAt($value)
 * @method static Builder|Gift whereEstimatedValue($value)
 * @method static Builder|Gift whereId($value)
 * @method static Builder|Gift whereLink($value)
 * @method static Builder|Gift whereName($value)
 * @method static Builder|Gift whereOrder($value)
 * @method static Builder|Gift wherePlace($value)
 * @method static Builder|Gift whereUpdatedAt($value)
 * @method static Builder|Gift whereWishListId($value)
 * @mixin Eloquent
 */
class Gift extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function wishList(): BelongsTo
    {
        return $this->belongsTo(WishList::class);
    }
}
