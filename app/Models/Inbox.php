<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Inbox
 *
 * @method static \Illuminate\Database\Eloquent\Builder|Inbox newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Inbox newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Inbox query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $user_id
 * @property string $date_time
 * @property string $message
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Inbox whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inbox whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inbox whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inbox whereMessage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inbox whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Inbox whereUserId($value)
 */
class Inbox extends Model
{
    use HasFactory;

    protected $fillable=['user_id','date_time','message'];
}
