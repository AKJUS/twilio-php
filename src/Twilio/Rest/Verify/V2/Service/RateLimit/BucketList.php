<?php

/**
 * This code was generated by
 * ___ _ _ _ _ _    _ ____    ____ ____ _    ____ ____ _  _ ____ ____ ____ ___ __   __
 *  |  | | | | |    | |  | __ |  | |__| | __ | __ |___ |\ | |___ |__/ |__|  | |  | |__/
 *  |  |_|_| | |___ | |__|    |__| |  | |    |__] |___ | \| |___ |  \ |  |  | |__| |  \
 *
 * Twilio - Verify
 * This is the public Twilio REST API.
 *
 * NOTE: This class is auto generated by OpenAPI Generator.
 * https://openapi-generator.tech
 * Do not edit the class manually.
 */

namespace Twilio\Rest\Verify\V2\Service\RateLimit;

use Twilio\Exceptions\TwilioException;
use Twilio\ListResource;
use Twilio\Stream;
use Twilio\Values;
use Twilio\Version;


class BucketList extends ListResource
    {
    /**
     * Construct the BucketList
     *
     * @param Version $version Version that contains the resource
     * @param string $serviceSid The SID of the [Service](https://www.twilio.com/docs/verify/api/service) the resource is associated with.
     * @param string $rateLimitSid The Twilio-provided string that uniquely identifies the Rate Limit resource.
     */
    public function __construct(
        Version $version,
        string $serviceSid,
        string $rateLimitSid
    ) {
        parent::__construct($version);

        // Path Solution
        $this->solution = [
        'serviceSid' =>
            $serviceSid,
        
        'rateLimitSid' =>
            $rateLimitSid,
        
        ];

        $this->uri = '/Services/' . \rawurlencode($serviceSid)
        .'/RateLimits/' . \rawurlencode($rateLimitSid)
        .'/Buckets';
    }

    /**
     * Create the BucketInstance
     *
     * @param int $max Maximum number of requests permitted in during the interval.
     * @param int $interval Number of seconds that the rate limit will be enforced over.
     * @return BucketInstance Created BucketInstance
     * @throws TwilioException When an HTTP error occurs.
     */
    public function create(int $max, int $interval): BucketInstance
    {

        $data = Values::of([
            'Max' =>
                $max,
            'Interval' =>
                $interval,
        ]);

        $headers = Values::of(['Content-Type' => 'application/x-www-form-urlencoded', 'Accept' => 'application/json' ]);
        $payload = $this->version->create('POST', $this->uri, [], $data, $headers);

        return new BucketInstance(
            $this->version,
            $payload,
            $this->solution['serviceSid'],
            $this->solution['rateLimitSid']
        );
    }


    /**
     * Reads BucketInstance records from the API as a list.
     * Unlike stream(), this operation is eager and will load `limit` records into
     * memory before returning.
     *
     * @param int $limit Upper limit for the number of records to return. read()
     *                   guarantees to never return more than limit.  Default is no
     *                   limit
     * @param mixed $pageSize Number of records to fetch per request, when not set
     *                        will use the default value of 50 records.  If no
     *                        page_size is defined but a limit is defined, read()
     *                        will attempt to read the limit with the most
     *                        efficient page size, i.e. min(limit, 1000)
     * @return BucketInstance[] Array of results
     */
    public function read(int $limit = null, $pageSize = null): array
    {
        return \iterator_to_array($this->stream($limit, $pageSize), false);
    }

    /**
     * Streams BucketInstance records from the API as a generator stream.
     * This operation lazily loads records as efficiently as possible until the
     * limit
     * is reached.
     * The results are returned as a generator, so this operation is memory
     * efficient.
     *
     * @param int $limit Upper limit for the number of records to return. stream()
     *                   guarantees to never return more than limit.  Default is no
     *                   limit
     * @param mixed $pageSize Number of records to fetch per request, when not set
     *                        will use the default value of 50 records.  If no
     *                        page_size is defined but a limit is defined, stream()
     *                        will attempt to read the limit with the most
     *                        efficient page size, i.e. min(limit, 1000)
     * @return Stream stream of results
     */
    public function stream(int $limit = null, $pageSize = null): Stream
    {
        $limits = $this->version->readLimits($limit, $pageSize);

        $page = $this->page($limits['pageSize']);

        return $this->version->stream($page, $limits['limit'], $limits['pageLimit']);
    }

    /**
     * Retrieve a single page of BucketInstance records from the API.
     * Request is executed immediately
     *
     * @param mixed $pageSize Number of records to return, defaults to 50
     * @param string $pageToken PageToken provided by the API
     * @param mixed $pageNumber Page Number, this value is simply for client state
     * @return BucketPage Page of BucketInstance
     */
    public function page(
        $pageSize = Values::NONE,
        string $pageToken = Values::NONE,
        $pageNumber = Values::NONE
    ): BucketPage
    {

        $params = Values::of([
            'PageToken' => $pageToken,
            'Page' => $pageNumber,
            'PageSize' => $pageSize,
        ]);

        $headers = Values::of(['Content-Type' => 'application/x-www-form-urlencoded', 'Accept' => 'application/json']);
        $response = $this->version->page('GET', $this->uri, $params, [], $headers);

        return new BucketPage($this->version, $response, $this->solution);
    }

    /**
     * Retrieve a specific page of BucketInstance records from the API.
     * Request is executed immediately
     *
     * @param string $targetUrl API-generated URL for the requested results page
     * @return BucketPage Page of BucketInstance
     */
    public function getPage(string $targetUrl): BucketPage
    {
        $response = $this->version->getDomain()->getClient()->request(
            'GET',
            $targetUrl
        );

        return new BucketPage($this->version, $response, $this->solution);
    }


    /**
     * Constructs a BucketContext
     *
     * @param string $sid A 34 character string that uniquely identifies this Bucket.
     */
    public function getContext(
        string $sid
        
    ): BucketContext
    {
        return new BucketContext(
            $this->version,
            $this->solution['serviceSid'],
            $this->solution['rateLimitSid'],
            $sid
        );
    }

    /**
     * Provide a friendly representation
     *
     * @return string Machine friendly representation
     */
    public function __toString(): string
    {
        return '[Twilio.Verify.V2.BucketList]';
    }
}
