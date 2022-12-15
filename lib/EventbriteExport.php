<?php declare(strict_types=1);

namespace MageOsNl;

use jamiehollern\eventbrite\Eventbrite;

class EventbriteExport
{
    public function getAttendeesByEventId(string $eventId = '')
    {
        $eventbrite = new Eventbrite($this->getToken());
        if (false === $eventbrite->canConnect()) {
            return [];
        }

        $response = $eventbrite->makeRequest('get', 'events/' . $eventId . '/attendees/?status=attending');
        $data = $response['body'];

        $attendees = [];
        foreach ($data['attendees'] as $attendee) {
            $ticket = $attendee['ticket_class_name'];
            $email = $attendee['profile']['email'];
            $attendees[$ticket]['attendees'][$email] = [
                'name' => $attendee['profile']['name'],
                'email' => $email,
                'qty' => $attendee['quantity'],
            ];
        }

        return $attendees;
    }

    private function getToken(): string
    {
        $file = __DIR__ . '/../.env';
        $data = parse_ini_file($file);
        return $data['EVENTBRITE_PRIVATE_TOKEN'];
    }
}