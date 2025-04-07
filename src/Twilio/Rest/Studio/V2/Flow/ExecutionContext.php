<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Studio
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */


namespace Twilio\Rest\Studio\V2\Flow;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Values;
use Twilio\Version;
use Twilio\InstanceContext;
use Twilio\Rest\Studio\V2\Flow\Execution\ExecutionStepList;
use Twilio\Rest\Studio\V2\Flow\Execution\ExecutionContextList;


/**
 * @property ExecutionStepList $steps
 * @property ExecutionContextList $executionContext
 * @method \Twilio\Rest\Studio\V2\Flow\Execution\ExecutionContextContext executionContext()
 * @method \Twilio\Rest\Studio\V2\Flow\Execution\ExecutionStepContext steps(string $sid)
 */
class ExecutionContext extends InstanceContext
    {
    protected $_steps;
    protected $_executionContext;

    /**
     * Initialize the ExecutionContext
     *
     * @param Version $version Version that contains the resource
     * @param string $flowSid The SID of the Excecution's Flow.
     * @param string $sid The SID of the Execution resource to delete.
     */
    public function __construct(
        Version $version,
        $flowSid,
        $sid
    ) {
        parent::__construct($version);

        // Path Solution
        $this->solution = [
        'flowSid' =>
            $flowSid,
        'sid' =>
            $sid,
        ];

        $this->uri = '/Flows/' . \rawurlencode($flowSid)
        .'/Executions/' . \rawurlencode($sid)
        .'';
    }

    /**
     * Delete the ExecutionInstance
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
     * Fetch the ExecutionInstance
     *
     * @return ExecutionInstance Fetched ExecutionInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function fetch(): ExecutionInstance
    {

        $headers = Values::of(['Content-Type' => 'application/x-www-form-urlencoded', 'Accept' => 'application/json' ]);
        $payload = $this->version->fetch('GET', $this->uri, [], [], $headers);

        return new ExecutionInstance(
            $this->version,
            $payload,
            $this->solution['flowSid'],
            $this->solution['sid']
        );
    }


    /**
     * Update the ExecutionInstance
     *
     * @param string $status
     * @return ExecutionInstance Updated ExecutionInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function update(string $status): ExecutionInstance
    {

        $data = Values::of([
            'Status' =>
                $status,
        ]);

        $headers = Values::of(['Content-Type' => 'application/x-www-form-urlencoded', 'Accept' => 'application/json' ]);
        $payload = $this->version->update('POST', $this->uri, [], $data, $headers);

        return new ExecutionInstance(
            $this->version,
            $payload,
            $this->solution['flowSid'],
            $this->solution['sid']
        );
    }


    /**
     * Access the steps
     */
    protected function getSteps(): ExecutionStepList
    {
        if (!$this->_steps) {
            $this->_steps = new ExecutionStepList(
                $this->version,
                $this->solution['flowSid'],
                $this->solution['sid']
            );
        }

        return $this->_steps;
    }

    /**
     * Access the executionContext
     */
    protected function getExecutionContext(): ExecutionContextList
    {
        if (!$this->_executionContext) {
            $this->_executionContext = new ExecutionContextList(
                $this->version,
                $this->solution['flowSid'],
                $this->solution['sid']
            );
        }

        return $this->_executionContext;
    }

    /**
     * Magic getter to lazy load subresources
     *
     * @param string $name Subresource to return
     * @return ListResource The requested subresource
     * @throws TwilioException For unknown subresources
     */
    public function __get(string $name): ListResource
    {
        if (\property_exists($this, '_' . $name)) {
            $method = 'get' . \ucfirst($name);
            return $this->$method();
        }

        throw new TwilioException('Unknown subresource ' . $name);
    }

    /**
     * Magic caller to get resource contexts
     *
     * @param string $name Resource to return
     * @param array $arguments Context parameters
     * @return InstanceContext The requested resource context
     * @throws TwilioException For unknown resource
     */
    public function __call(string $name, array $arguments): InstanceContext
    {
        $property = $this->$name;
        if (\method_exists($property, 'getContext')) {
            return \call_user_func_array(array($property, 'getContext'), $arguments);
        }

        throw new TwilioException('Resource does not have a context');
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
        return '[Twilio.Studio.V2.ExecutionContext ' . \implode(' ', $context) . ']';
    }
}
