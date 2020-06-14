<?php

namespace App;

use App\Events\MessageSent;
use App\Notifications\NewMessage;
use Illuminate\Contracts\Auth\Access\Gate;
use Illuminate\Database\Eloquent\Model;
use Morilog\Jalali\Jalalian;

/**
 * App\Message
 *
 * @property int $id
 * @property string $uuid
 * @property int $conversation_id
 * @property int $from_id
 * @property string $type
 * @property string $text
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Conversation $conversation
 * @property-read \App\User $from
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message query()
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereConversationId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereFromId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereText($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|\App\Message whereUuid($value)
 * @mixin \Eloquent
 */
class Message extends Model
{
    protected $fillable = [
        'text', 'uuid'
    ];

    protected $hidden = [
        'id', 'conversation'
    ];

    public function conversation() {
        return $this->belongsTo('App\Conversation');
    }

    public function from() {
        return $this->belongsTo('App\User', 'from_id');
    }

    protected function serializeDate(\DateTimeInterface $date)
    {
        return Jalalian::fromDateTime($date)->format('%g/%m/%d %H:%M');
    }

    public static function sendMessage($conversation, $data) {
        app(Gate::class)->authorize('update', $conversation);
        $message = new Message($data);
        $message->conversation()->associate($conversation);
        $message->from()->associate(\Auth::user());
        $message->type = 'text';
        $message->save();
        $conversation->otherParty(\Auth::user())->notify(new NewMessage(Auth::user(), $message));
        broadcast(new MessageSent($message));
        return $message;
    }
}
