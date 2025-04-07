<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Flex
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Twilio\Rest\FlexApi\V1;

use Twilio\Exceptions\TwilioException;
use Twilio\Options;
use Twilio\Values;
use Twilio\Version;
use Twilio\InstanceContext;
use Twilio\Serialize;


class FlexFlowContext extends InstanceContext
    {
    /**
     * Initialize the FlexFlowContext
     *
     * @param Version $version Version that contains the resource
     * @param string $sid The SID of the Flex Flow resource to delete.
     */
    public function __construct(
        Version $version,
        $sid
    ) {
        parent::__construct($version);

        // Path Solution
        $this->solution = [
        'sid' =>
            $sid,
        ];

        $this->uri = '/FlexFlows/' . \rawurlencode($sid)
        .'';
    }

    /**
     * Delete the FlexFlowInstance
     *
     * @return bool True if delete succeeds, false otherwise
     * @throws TwilioException When an HTTP error occurs.
     */
    public function delete(): bool
    {

        $headers = Values::of(['Content-Type' => 'application/x-www-form-urlencoded' ]);
        return $this->version->delete('DELETE', $this->uri, [], [], $headers);
    }


    /**
     * Fetch the FlexFlowInstance
     *
     * @return FlexFlowInstance Fetched FlexFlowInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(): FlexFlowInstance
    {

        $headers = Values::of(['Content-Type' => 'application/x-www-form-urlencoded', 'Accept' => 'application/json' ]);
        $payload = $this->version->fetch('GET', $this->uri, [], [], $headers);

        return new FlexFlowInstance(
            $this->version,
            $payload,
            $this->solution['sid']
        );
    }


    /**
     * Update the FlexFlowInstance
     *
     * @param array|Options $options Optional Arguments
     * @return FlexFlowInstance Updated FlexFlowInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(array $options = []): FlexFlowInstance
    {

        $options = new Values($options);

        $data = Values::of([
            'FriendlyName' =>
                $options['friendlyName'],
            'ChatServiceSid' =>
                $options['chatServiceSid'],
            'ChannelType' =>
                $options['channelType'],
            'ContactIdentity' =>
                $options['contactIdentity'],
            'Enabled' =>
                Serialize::booleanToString($options['enabled']),
            'IntegrationType' =>
                $options['integrationType'],
            'Integration.FlowSid' =>
                $options['integrationFlowSid'],
            'Integration.Url' =>
                $options['integrationUrl'],
            'Integration.WorkspaceSid' =>
                $options['integrationWorkspaceSid'],
            'Integration.WorkflowSid' =>
                $options['integrationWorkflowSid'],
            'Integration.Channel' =>
                $options['integrationChannel'],
            'Integration.Timeout' =>
                $options['integrationTimeout'],
            'Integration.Priority' =>
                $options['integrationPriority'],
            'Integration.CreationOnMessage' =>
                Serialize::booleanToString($options['integrationCreationOnMessage']),
            'LongLived' =>
                Serialize::booleanToString($options['longLived']),
            'JanitorEnabled' =>
                Serialize::booleanToString($options['janitorEnabled']),
            'Integration.RetryCount' =>
                $options['integrationRetryCount'],
        ]);

        $headers = Values::of(['Content-Type' => 'application/x-www-form-urlencoded', 'Accept' => 'application/json' ]);
        $payload = $this->version->update('POST', $this->uri, [], $data, $headers);

        return new FlexFlowInstance(
            $this->version,
            $payload,
            $this->solution['sid']
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
        return '[Twilio.FlexApi.V1.FlexFlowContext ' . \implode(' ', $context) . ']';
    }
}
