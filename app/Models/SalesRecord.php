<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SalesRecord
 *
 * @method static \Illuminate\Database\Eloquent\Builder|SalesRecord newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SalesRecord newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|SalesRecord query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $user_id
 * @property string $date_time
 * @property string $client_name
 * @property string $agent_id
 * @property string $direct_comm
 * @property string $referrer_comm
 * @property string $bonus
 * @property string $loyalty
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|SalesRecord whereAgentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesRecord whereBonus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesRecord whereClientName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesRecord whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesRecord whereDateTime($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesRecord whereDirectComm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesRecord whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesRecord whereLoyalty($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesRecord whereReferrerComm($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesRecord whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|SalesRecord whereUserId($value)
 */
class SalesRecord extends Model
{
    use HasFactory;

    protected $fillable=['user_id','date_time','client_name','agent_id','direct_comm','referrer_comm','bonus','loyalty'];
}
