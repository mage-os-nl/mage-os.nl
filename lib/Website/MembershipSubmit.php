<?php declare(strict_types=1);

namespace MageOsNl\Website;

use UnexpectedValueException;

class MembershipSubmit
{
    /**
     * @param array $data
     * @return void
     * @throws UnexpectedValueException
     */
    public function execute(array $data = [])
    {
        if (!empty($data['password2'])) {
            throw new UnexpectedValueException('Onverwachte waarde');
        }

        if (empty($data['email'])) {
            throw new UnexpectedValueException('Geen emailadres opgegeven');
        }

        if (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            throw new UnexpectedValueException('Emailadres "' . $data['email'] . '" lijkt niet geldig');
        }

        // @todo: Send an email to address

        header('Location: https://bunq.me/mage-os-nl/10/' . urlencode('Lidmaatschap ' . $data['email']));
        exit;
    }
}