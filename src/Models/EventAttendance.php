<?php

namespace TruckersMP\APIClient\Models;

use TruckersMP\APIClient\Collections\EventAttendeeCollection;

class EventAttendance
{
    /**
     * The confirmed attendee count.
     *
     * @var int
     */
    protected $confirmed;

    /**
     * The unsure attendee count.
     *
     * @var int
     */
    protected $unsure;

    /**
     * The confirmed users.
     *
     * @var EventAttendeeCollection|null
     */
    protected $confirmed_users;

    /**
     * The unsure users.
     *
     * @var EventAttendeeCollection|null
     */
    protected $unsure_users;

    /**
     * Create a new EventAttendance instance.
     *
     * @param int $confirmed
     * @param int $unsure
     * @param array|null $confirmed_users
     * @param array|null $unsure_users
     * @return void
     */
    public function __construct(
        int $confirmed,
        int $unsure,
        ?array $confirmed_users,
        ?array $unsure_users
    ) {
        $this->confirmed = $confirmed;
        $this->unsure = $unsure;
        if (isset($confirmed_users)) {
            $this->confirmed_users = new EventAttendeeCollection($confirmed_users);
        }
        if (isset($unsure_users)) {
            $this->unsure_users = new EventAttendeeCollection($unsure_users);
        }
    }

    /**
     * Get the confirmed attendee count.
     *
     * @return int
     */
    public function getConfirmed(): int
    {
        return $this->confirmed;
    }

    /**
     * Get the unsure attendee count.
     *
     * @return int
     */
    public function getUnsure(): int
    {
        return $this->unsure;
    }

    /**
     * Get the confirmed attendees.
     *
     * @return EventAttendeeCollection|null
     */
    public function getConfirmedUsers(): ?EventAttendeeCollection
    {
        return $this->confirmed_users;
    }

    /**
     * Get the unsure attendees.
     *
     * @return EventAttendeeCollection|null
     */
    public function getUnsureUsers(): ?EventAttendeeCollection
    {
        return $this->unsure_users;
    }
}
