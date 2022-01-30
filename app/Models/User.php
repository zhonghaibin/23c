<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * App\Models\User
 *
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Laravel\Sanctum\PersonalAccessToken[] $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\UserFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @mixin \Eloquent
 * @property int $id
 * @property string $user_id
 * @property string $password
 * @property string $name
 * @property string $date_time
 * @property int $rank
 * @property string $introducer_id
 * @property string $nric
 * @property string $tel
 * @property string $address
 * @property string $select
 * @property string $bank_name
 * @property string $bank_account
 * @property int $confirm_id
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $email_verified_at
 * @property string|null $remember_token
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBankAccount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereBankName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereConfirmId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmailVerifiedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereIntroducerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereNric($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRank($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereRememberToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereSelect($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereTel($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUserId($value)
 */
class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_id',
        'address',
        'select',
        'nric',
        'tel',
        'date_time',
        'introducer_id',
        'nric',
        'bank_name',
        'bank_account',
        'confirm_id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    static $rankList = ['undefined', 'admin', 'partner', 'agent', 'referrer', 'enquiry'];
    static $selectList=['undefined','authorized agent','referrer','enquiry'];
    static $confirmList=['await confirmation','not approved','approved'];

    public function getRankAttribute($value)
    {

        $this->append('rank_name');
        return $value;
    }

    public function getRankNameAttribute($value)
    {
        return self::$rankList[$this->attributes['rank']];
    }

    public function getSelectAttribute($value)
    {

        $this->append('select_name');
        return $value;
    }

    public function getSelectNameAttribute($value)
    {
        return self::$selectList[$this->attributes['select']];
    }


    public function getConfirmIdAttribute($value)
    {

        $this->append('confirm_id_name');
        return $value;
    }

    public function getConfirmIdNameAttribute($value)
    {
        return self::$confirmList[$this->attributes['confirm_id']];
    }

}
