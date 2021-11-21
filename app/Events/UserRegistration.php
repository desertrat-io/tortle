<?php

declare(strict_types=1);

namespace App\Events;

use App\Lib\Contracts\Events\AuditableEvent;
use Carbon\Carbon;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Support\Jsonable;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class UserRegistration implements AuditableEvent
{
    use Dispatchable;
    use InteractsWithSockets;
    use SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(private string $email, private string $name, private string $firedFromIp)
    {
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }

    public function getEventClassName(): string
    {
        return self::class;
    }

    public function getEventPayload(): Jsonable
    {
        return collect([
                           'email' => $this->email,
                           'name' => $this->name,
                           'from_ip' => $this->firedFromIp
                       ]);
    }

    public function getEventName(): string
    {
        return 'user_registration';
    }

    public function getEventOriginalTimestamp(): Carbon
    {
        return Carbon::now();
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return mixed
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return mixed
     */
    public function getFiredFromIp(): string
    {
        return $this->firedFromIp;
    }


}
