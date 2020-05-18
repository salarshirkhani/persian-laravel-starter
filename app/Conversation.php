<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Conversation
 *
 * @property int $id
 * @property string $type
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Message|null $lastMessage
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Message[] $messages
 * @property-read int|null $messages_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\User[] $parties
 * @property-read int|null $parties_count
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Conversation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Conversation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Conversation query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Conversation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Conversation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Conversation whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Conversation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Conversation extends Model
{
    protected $fillable = [
        'type',
    ];

    public function messages() {
        $relation = $this->hasMany('App\Message');
        $relation->getQuery()->orderBy('created_at', 'desc');
        return $relation;
    }

    public function lastMessage() {
        $relation = $this->hasOne('App\Message');
        $relation->getQuery()->orderBy('created_at', 'desc');
        return $relation;
    }

    public function parties() {
        return $this->belongsToMany('App\User');
    }

    public function otherParty($user) {
        $this->relationLoaded('parties') || $this->load('parties');

        if ($this->type != 'private' || count($this->parties) != 2)
            throw new \RuntimeException("This conversation is not between two people.");

        foreach ($this->parties as $party)
            if (!$party->is($user))
                return $party;
        throw new \RuntimeException("What the Fuck!? Both participants of this conversation are the same user!");
    }
}
