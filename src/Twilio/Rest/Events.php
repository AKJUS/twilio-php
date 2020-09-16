<?php

/**
 * This code was generated by
 * \ / _    _  _|   _  _
 * | (_)\/(_)(_|\/| |(/_  v1.0.0
 * /       /
 */

namespace Twilio\Rest;

use Twilio\Domain;
use Twilio\Exceptions\TwilioException;
use Twilio\Rest\Events\V1;

/**
 * @property \Twilio\Rest\Events\V1 $v1
 * @property \Twilio\Rest\Events\V1\EventTypeList $eventTypes
 * @property \Twilio\Rest\Events\V1\SinkList $sinks
 * @property \Twilio\Rest\Events\V1\SubscriptionList $subscriptions
 * @method \Twilio\Rest\Events\V1\EventTypeContext eventTypes(string $type)
 * @method \Twilio\Rest\Events\V1\SinkContext sinks(string $sid)
 * @method \Twilio\Rest\Events\V1\SubscriptionContext subscriptions(string $sid)
 */
class Events extends Domain {
    protected $_v1;

    /**
     * Construct the Events Domain
     *
     * @param Client $client Client to communicate with Twilio
     */
    public function __construct(Client $client) {
        parent::__construct($client);

        $this->baseUrl = 'https://events.twilio.com';
    }

    /**
     * @return V1 Version v1 of events
     */
    protected function getV1(): V1 {
        if (!$this->_v1) {
            $this->_v1 = new V1($this);
        }
        return $this->_v1;
    }

    /**
     * Magic getter to lazy load version
     *
     * @param string $name Version to return
     * @return \Twilio\Version The requested version
     * @throws TwilioException For unknown versions
     */
    public function __get(string $name) {
        $method = 'get' . \ucfirst($name);
        if (\method_exists($this, $method)) {
            return $this->$method();
        }

        throw new TwilioException('Unknown version ' . $name);
    }

    /**
     * Magic caller to get resource contexts
     *
     * @param string $name Resource to return
     * @param array $arguments Context parameters
     * @return \Twilio\InstanceContext The requested resource context
     * @throws TwilioException For unknown resource
     */
    public function __call(string $name, array $arguments) {
        $method = 'context' . \ucfirst($name);
        if (\method_exists($this, $method)) {
            return \call_user_func_array([$this, $method], $arguments);
        }

        throw new TwilioException('Unknown context ' . $name);
    }

    protected function getEventTypes(): \Twilio\Rest\Events\V1\EventTypeList {
        return $this->v1->eventTypes;
    }

    /**
     * @param string $type The type
     */
    protected function contextEventTypes(string $type): \Twilio\Rest\Events\V1\EventTypeContext {
        return $this->v1->eventTypes($type);
    }

    protected function getSinks(): \Twilio\Rest\Events\V1\SinkList {
        return $this->v1->sinks;
    }

    /**
     * @param string $sid A string that uniquely identifies this Sink.
     */
    protected function contextSinks(string $sid): \Twilio\Rest\Events\V1\SinkContext {
        return $this->v1->sinks($sid);
    }

    protected function getSubscriptions(): \Twilio\Rest\Events\V1\SubscriptionList {
        return $this->v1->subscriptions;
    }

    /**
     * @param string $sid A string that uniquely identifies this Subscription.
     */
    protected function contextSubscriptions(string $sid): \Twilio\Rest\Events\V1\SubscriptionContext {
        return $this->v1->subscriptions($sid);
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string {
        return '[Twilio.Events]';
    }
}