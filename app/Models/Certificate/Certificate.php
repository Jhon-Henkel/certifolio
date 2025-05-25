<?php

namespace App\Models\Certificate;

use App\Models\User\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * @property int $id
 * @property int $user_id
 * @property string $name
 * @property string $issuing_organization
 * @property string $issue_date
 * @property string|null $expiration_date
 * @property string|null $credential_code
 * @property string|null $credential_url
 * @property string|null $credential_file_path
 * @property string $created_at
 * @property string|null $updated_at
 *
 * @property-read User $user
 *
 * @mixin Builder<Certificate>
 */
class Certificate extends Model
{
    protected $table = 'certificates';

    protected $fillable = [
        'id',
        'user_id',
        'name',
        'issuing_organization',
        'issue_date',
        'expiration_date',
        'credential_code',
        'credential_url',
        'credential_file_path',
        'created_at',
        'updated_at',
    ];

    protected $casts = [
        'issue_date' =>  'date',
        'expiration_date' =>  'date',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * @return HasOne<User, $this>
     */
    public function user(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
