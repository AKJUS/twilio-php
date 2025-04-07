<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Numbers
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Twilio\Rest\Numbers\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;
use Twilio\InstanceContext;


class PortingPortabilityContext extends InstanceContext
    {
    /**
     * Initialize the PortingPortabilityContext
     *
     * @param Version $version Version that contains the resource
     * @param string $phoneNumber Phone number to check portability in e164 format.
     */
    public function __construct(
        Version $version,
        $phoneNumber
    ) {
        parent::__construct($version);

        // Path Solution
        $this->solution = [
        'phoneNumber' =>
            $phoneNumber,
        ];

        $this->uri = '/Porting/Portability/PhoneNumber/' . \rawurlencode($phoneNumber)
        .'';
    }

    /**
     * Fetch the PortingPortabilityInstance
     *
     * @param array|Options $options Optional Arguments
     * @return PortingPortabilityInstance Fetched PortingPortabilityInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(array $options = []): PortingPortabilityInstance
    {

        $options = new Values($options);

        $params = Values::of([
            'TargetAccountSid' =>
                $options['targetAccountSid'],
            'AddressSid' =>
                $options['addressSid'],
        ]);

        $headers = Values::of(['Content-Type' => 'application/x-www-form-urlencoded', 'Accept' => 'application/json' ]);
        $payload = $this->version->fetch('GET', $this->uri, $params, [], $headers);

        return new PortingPortabilityInstance(
            $this->version,
            $payload,
            $this->solution['phoneNumber']
        );
    }


    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        $context = [];
        foreach ($this->solution as $key => $value) {
            $context[] = "$key=$value";
        }
        return '[Twilio.Numbers.V1.PortingPortabilityContext ' . \implode(' ', $context) . ']';
    }
}
