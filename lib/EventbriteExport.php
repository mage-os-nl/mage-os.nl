<?php declare(strict_types=1);

namespace MageOsNl;

use jamiehollern\eventbrite\Eventbrite;

class EventbriteExport
{
    public function getAttendeesByEventId(string $eventId = '', string $continuationToken = '')
    {
        $eventbrite = new Eventbrite($this->getToken());
        if (false === $eventbrite->canConnect()) {
            return [];
        }

        $endPoint = 'events/' . $eventId . '/attendees/?status=attending';
        if ($continuationToken) {
            $endPoint .= '&continuation='.$continuationToken;
        }

        $response = $eventbrite->makeRequest('get', $endPoint);
        $data = $response['body'];

        $export = [];
        foreach ($data['attendees'] as $attendee) {
            $ticketName = $attendee['ticket_class_name'];
            $email = $attendee['profile']['email'];
            $export['tickets'][$ticketName][$email] = [
                'name' => $attendee['profile']['name'],
                'email' => $email,
                'qty' => $attendee['quantity'],
            ];
        }

        if ($data['pagination']['has_more_items'] > 0) {
            $continuationToken = $data['pagination']['continuation'];
            $export = array_merge_recursive($export, $this->getAttendeesByEventId($eventId, $continuationToken));
        }

        foreach (array_keys($export['tickets']) as $ticketName) {
            $export['totals'][$ticketName] = count($export['tickets'][$ticketName]);
        }

        return $export;
    }

    private function getToken(): string
    {
        $file = __DIR__ . '/../.env';
        $data = parse_ini_file($file);
        return $data['EVENTBRITE_PRIVATE_TOKEN'];
    }
}