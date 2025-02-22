<?php

namespace TruckersMP\APIClient\Requests\Company;

use Psr\Http\Client\ClientExceptionInterface;
use TruckersMP\APIClient\Exceptions\ApiErrorException;
use TruckersMP\APIClient\Models\Event;
use TruckersMP\APIClient\Requests\Request;

class EventRequest extends Request
{
    /**
     * The ID of the requested company.
     *
     * @var int
     */
    protected $companyId;

    /**
     * The ID of the requested event.
     *
     * @var int
     */
    protected $eventId;

    /**
     * Create a new EventRequest instance.
     *
     * @param int $companyId
     * @param int $eventId
     * @return void
     */
    public function __construct(int $companyId, int $eventId)
    {
        parent::__construct();

        $this->companyId = $companyId;
        $this->eventId = $eventId;
    }

    /**
     * Get the endpoint of the request.
     *
     * @return string
     */
    public function getEndpoint(): string
    {
        return 'vtc/' . $this->companyId . '/events/' . $this->eventId;
    }

    /**
     * Get the data for the request.
     *
     * @return Event
     *
     * @throws ApiErrorException
     * @throws ClientExceptionInterface
     */
    public function get(): Event
    {
        return new Event(
            $this->send()['response']
        );
    }
}
