<?php

namespace App\Models;

use Database\Factories\WishListFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\WishList
 *
 * @property int $id
 * @property string $title
 * @property int $group_id
 * @property int $user_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Group $group
 * @property-read User $user
 * @method static WishListFactory factory(...$parameters)
 * @method static Builder|WishList newModelQuery()
 * @method static Builder|WishList newQuery()
 * @method static Builder|WishList query()
 * @method static Builder|WishList whereCreatedAt($value)
 * @method static Builder|WishList whereGroupId($value)
 * @method static Builder|WishList whereId($value)
 * @method static Builder|WishList whereTitle($value)
 * @method static Builder|WishList whereUpdatedAt($value)
 * @method static Builder|WishList whereUserId($value)
 * @mixin Eloquent
 */
class WishList extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function group(): BelongsTo
    {
        return $this->belongsTo(Group::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
