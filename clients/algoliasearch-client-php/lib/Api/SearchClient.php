<?php

namespace Algolia\AlgoliaSearch\Api;

use Algolia\AlgoliaSearch\Algolia;
use Algolia\AlgoliaSearch\Configuration\SearchConfig;
use Algolia\AlgoliaSearch\Exceptions\ExceededRetriesException;
use Algolia\AlgoliaSearch\ObjectSerializer;
use Algolia\AlgoliaSearch\RetryStrategy\ApiWrapper;
use Algolia\AlgoliaSearch\RetryStrategy\ApiWrapperInterface;
use Algolia\AlgoliaSearch\RetryStrategy\ClusterHosts;
use Algolia\AlgoliaSearch\Support\Helpers;

/**
 * SearchClient Class Doc Comment
 *
 * @category Class
 * @package  Algolia\AlgoliaSearch
 */
class SearchClient
{
    /**
     * @var ApiWrapperInterface
     */
    protected $api;

    /**
     * @var SearchConfig
     */
    protected $config;

    /**
     * @param SearchConfig $config
     * @param ApiWrapperInterface $apiWrapper
     */
    public function __construct(
        ApiWrapperInterface $apiWrapper,
        SearchConfig $config
    ) {
        $this->config = $config;
        $this->api = $apiWrapper;
    }

    /**
     * Instantiate the client with basic credentials
     *
     * @param string $appId  Application ID
     * @param string $apiKey Algolia API Key
     */
    public static function create($appId = null, $apiKey = null)
    {
        return static::createWithConfig(SearchConfig::create($appId, $apiKey));
    }

    /**
     * Instantiate the client with configuration
     *
     * @param SearchConfig $config Configuration
     */
    public static function createWithConfig(SearchConfig $config)
    {
        $config = clone $config;

        $apiWrapper = new ApiWrapper(
            Algolia::getHttpClient(),
            $config,
            self::getClusterHosts($config)
        );

        return new static($apiWrapper, $config);
    }

    /**
     * Gets the cluster hosts depending on the config
     *
     * @param SearchConfig $config
     *
     * @return ClusterHosts
     */
    public static function getClusterHosts(SearchConfig $config)
    {
        $cacheKey = sprintf(
            '%s-clusterHosts-%s',
            __CLASS__,
            $config->getAppId()
        );

        if ($hosts = $config->getHosts()) {
            // If a list of hosts was passed, we ignore the cache
            $clusterHosts = ClusterHosts::create($hosts);
        } elseif (
            false === ($clusterHosts = ClusterHosts::createFromCache($cacheKey))
        ) {
            // We'll try to restore the ClusterHost from cache, if we cannot
            // we create a new instance and set the cache key
            $clusterHosts = ClusterHosts::createFromAppId(
                $config->getAppId()
            )->setCacheKey($cacheKey);
        }

        return $clusterHosts;
    }

    /**
     * @return SearchConfig
     */
    public function getClientConfig()
    {
        return $this->config;
    }

    /**
     * Create an API key.
     *
     * @param array $apiKey apiKey (required)
     * - $apiKey['acl'] => (array) Set of permissions associated with the key. (required)
     * - $apiKey['description'] => (string) A comment used to identify a key more easily in the dashboard. It is not interpreted by the API.
     * - $apiKey['indexes'] => (array) Restrict this new API key to a list of indices or index patterns. If the list is empty, all indices are allowed.
     * - $apiKey['maxHitsPerQuery'] => (int) Maximum number of hits this API key can retrieve in one query. If zero, no limit is enforced.
     * - $apiKey['maxQueriesPerIPPerHour'] => (int) Maximum number of API calls per hour allowed from a given IP address or a user token.
     * - $apiKey['queryParameters'] => (string) URL-encoded query string. Force some query parameters to be applied for each query made with this API key.
     * - $apiKey['referers'] => (array) Restrict this new API key to specific referers. If empty or blank, defaults to all referers.
     * - $apiKey['validity'] => (int) Validity limit for this key in seconds. The key will automatically be removed after this period of time.
     *
     * @see \Algolia\AlgoliaSearch\Model\Search\ApiKey
     *
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\AddApiKeyResponse
     */
    public function addApiKey($apiKey, $requestOptions = [])
    {
        // verify the required parameter 'apiKey' is set
        if ($apiKey === null) {
            throw new \InvalidArgumentException(
                'Parameter `apiKey` is required when calling `addApiKey`.'
            );
        }

        $resourcePath = '/1/keys';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        if (isset($apiKey)) {
            $httpBody = $apiKey;
        }

        return $this->sendRequest(
            'POST',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * Add or replace an object.
     *
     * @param string $indexName The index in which to perform the request. (required)
     * @param string $objectID Unique identifier of an object. (required)
     * @param array $body The Algolia object. (required)
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\UpdatedAtWithObjectIdResponse
     */
    public function addOrUpdateObject(
        $indexName,
        $objectID,
        $body,
        $requestOptions = []
    ) {
        // verify the required parameter 'indexName' is set
        if ($indexName === null) {
            throw new \InvalidArgumentException(
                'Parameter `indexName` is required when calling `addOrUpdateObject`.'
            );
        }
        // verify the required parameter 'objectID' is set
        if ($objectID === null) {
            throw new \InvalidArgumentException(
                'Parameter `objectID` is required when calling `addOrUpdateObject`.'
            );
        }
        // verify the required parameter 'body' is set
        if ($body === null) {
            throw new \InvalidArgumentException(
                'Parameter `body` is required when calling `addOrUpdateObject`.'
            );
        }

        $resourcePath = '/1/indexes/{indexName}/{objectID}';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        // path params
        if ($indexName !== null) {
            $resourcePath = str_replace(
                '{indexName}',
                ObjectSerializer::toPathValue($indexName),
                $resourcePath
            );
        }

        // path params
        if ($objectID !== null) {
            $resourcePath = str_replace(
                '{objectID}',
                ObjectSerializer::toPathValue($objectID),
                $resourcePath
            );
        }

        if (isset($body)) {
            $httpBody = $body;
        }

        return $this->sendRequest(
            'PUT',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * Add a single source.
     *
     * @param array $source The source to add. (required)
     *
     * @see \Algolia\AlgoliaSearch\Model\Search\Source
     *
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\CreatedAtResponse
     */
    public function appendSource($source, $requestOptions = [])
    {
        // verify the required parameter 'source' is set
        if ($source === null) {
            throw new \InvalidArgumentException(
                'Parameter `source` is required when calling `appendSource`.'
            );
        }

        $resourcePath = '/1/security/sources/append';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        if (isset($source)) {
            $httpBody = $source;
        }

        return $this->sendRequest(
            'POST',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * Assign or Move userID.
     *
     * @param string $xAlgoliaUserID userID to assign. (required)
     * @param array $assignUserIdParams assignUserIdParams (required)
     * - $assignUserIdParams['cluster'] => (string) Name of the cluster. (required)
     *
     * @see \Algolia\AlgoliaSearch\Model\Search\AssignUserIdParams
     *
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\CreatedAtResponse
     */
    public function assignUserId(
        $xAlgoliaUserID,
        $assignUserIdParams,
        $requestOptions = []
    ) {
        // verify the required parameter 'xAlgoliaUserID' is set
        if ($xAlgoliaUserID === null) {
            throw new \InvalidArgumentException(
                'Parameter `xAlgoliaUserID` is required when calling `assignUserId`.'
            );
        }
        if (!preg_match('/^[a-zA-Z0-9 \\-*.]+$/', $xAlgoliaUserID)) {
            throw new \InvalidArgumentException(
                'invalid value for "xAlgoliaUserID" when calling SearchClient.assignUserId, must conform to the pattern /^[a-zA-Z0-9 \\-*.]+$/.'
            );
        }

        // verify the required parameter 'assignUserIdParams' is set
        if ($assignUserIdParams === null) {
            throw new \InvalidArgumentException(
                'Parameter `assignUserIdParams` is required when calling `assignUserId`.'
            );
        }

        $resourcePath = '/1/clusters/mapping';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        if (isset($assignUserIdParams)) {
            $httpBody = $assignUserIdParams;
        }
        $headers['X-Algolia-User-ID'] = $xAlgoliaUserID;

        return $this->sendRequest(
            'POST',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * Batch operations to one index.
     *
     * @param string $indexName The index in which to perform the request. (required)
     * @param array $batchWriteParams batchWriteParams (required)
     * - $batchWriteParams['requests'] => (array)
     *
     * @see \Algolia\AlgoliaSearch\Model\Search\BatchWriteParams
     *
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\BatchResponse
     */
    public function batch($indexName, $batchWriteParams, $requestOptions = [])
    {
        // verify the required parameter 'indexName' is set
        if ($indexName === null) {
            throw new \InvalidArgumentException(
                'Parameter `indexName` is required when calling `batch`.'
            );
        }
        // verify the required parameter 'batchWriteParams' is set
        if ($batchWriteParams === null) {
            throw new \InvalidArgumentException(
                'Parameter `batchWriteParams` is required when calling `batch`.'
            );
        }

        $resourcePath = '/1/indexes/{indexName}/batch';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        // path params
        if ($indexName !== null) {
            $resourcePath = str_replace(
                '{indexName}',
                ObjectSerializer::toPathValue($indexName),
                $resourcePath
            );
        }

        if (isset($batchWriteParams)) {
            $httpBody = $batchWriteParams;
        }

        return $this->sendRequest(
            'POST',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * Batch assign userIDs.
     *
     * @param string $xAlgoliaUserID userID to assign. (required)
     * @param array $batchAssignUserIdsParams batchAssignUserIdsParams (required)
     * - $batchAssignUserIdsParams['cluster'] => (string) Name of the cluster. (required)
     * - $batchAssignUserIdsParams['users'] => (array) userIDs to assign. Note you cannot move users with this method. (required)
     *
     * @see \Algolia\AlgoliaSearch\Model\Search\BatchAssignUserIdsParams
     *
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\CreatedAtResponse
     */
    public function batchAssignUserIds(
        $xAlgoliaUserID,
        $batchAssignUserIdsParams,
        $requestOptions = []
    ) {
        // verify the required parameter 'xAlgoliaUserID' is set
        if ($xAlgoliaUserID === null) {
            throw new \InvalidArgumentException(
                'Parameter `xAlgoliaUserID` is required when calling `batchAssignUserIds`.'
            );
        }
        if (!preg_match('/^[a-zA-Z0-9 \\-*.]+$/', $xAlgoliaUserID)) {
            throw new \InvalidArgumentException(
                'invalid value for "xAlgoliaUserID" when calling SearchClient.batchAssignUserIds, must conform to the pattern /^[a-zA-Z0-9 \\-*.]+$/.'
            );
        }

        // verify the required parameter 'batchAssignUserIdsParams' is set
        if ($batchAssignUserIdsParams === null) {
            throw new \InvalidArgumentException(
                'Parameter `batchAssignUserIdsParams` is required when calling `batchAssignUserIds`.'
            );
        }

        $resourcePath = '/1/clusters/mapping/batch';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        if (isset($batchAssignUserIdsParams)) {
            $httpBody = $batchAssignUserIdsParams;
        }
        $headers['X-Algolia-User-ID'] = $xAlgoliaUserID;

        return $this->sendRequest(
            'POST',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * Batch dictionary entries.
     *
     * @param array $dictionaryName The dictionary to search in. (required)
     * @param array $batchDictionaryEntriesParams batchDictionaryEntriesParams (required)
     * - $batchDictionaryEntriesParams['clearExistingDictionaryEntries'] => (bool) When `true`, start the batch by removing all the custom entries from the dictionary.
     * - $batchDictionaryEntriesParams['requests'] => (array) List of operations to batch. Each operation is described by an `action` and a `body`. (required)
     *
     * @see \Algolia\AlgoliaSearch\Model\Search\BatchDictionaryEntriesParams
     *
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\UpdatedAtResponse
     */
    public function batchDictionaryEntries(
        $dictionaryName,
        $batchDictionaryEntriesParams,
        $requestOptions = []
    ) {
        // verify the required parameter 'dictionaryName' is set
        if ($dictionaryName === null) {
            throw new \InvalidArgumentException(
                'Parameter `dictionaryName` is required when calling `batchDictionaryEntries`.'
            );
        }
        // verify the required parameter 'batchDictionaryEntriesParams' is set
        if ($batchDictionaryEntriesParams === null) {
            throw new \InvalidArgumentException(
                'Parameter `batchDictionaryEntriesParams` is required when calling `batchDictionaryEntries`.'
            );
        }

        $resourcePath = '/1/dictionaries/{dictionaryName}/batch';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        // path params
        if ($dictionaryName !== null) {
            $resourcePath = str_replace(
                '{dictionaryName}',
                ObjectSerializer::toPathValue($dictionaryName),
                $resourcePath
            );
        }

        if (isset($batchDictionaryEntriesParams)) {
            $httpBody = $batchDictionaryEntriesParams;
        }

        return $this->sendRequest(
            'POST',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * Retrieve all index content.
     *
     * @param string $indexName The index in which to perform the request. (required)
     * @param array $browseRequest browseRequest (optional)
     * - $browseRequest['params'] => (string) Search parameters as URL-encoded query string.
     * - $browseRequest['cursor'] => (string) Cursor indicating the location to resume browsing from. Must match the value returned by the previous call.
     *
     * @see \Algolia\AlgoliaSearch\Model\Search\BrowseRequest
     *
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\BrowseResponse
     */
    public function browse(
        $indexName,
        $browseRequest = null,
        $requestOptions = []
    ) {
        // verify the required parameter 'indexName' is set
        if ($indexName === null) {
            throw new \InvalidArgumentException(
                'Parameter `indexName` is required when calling `browse`.'
            );
        }

        $resourcePath = '/1/indexes/{indexName}/browse';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        // path params
        if ($indexName !== null) {
            $resourcePath = str_replace(
                '{indexName}',
                ObjectSerializer::toPathValue($indexName),
                $resourcePath
            );
        }

        if (isset($browseRequest)) {
            $httpBody = $browseRequest;
        }

        return $this->sendRequest(
            'POST',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * Clear all synonyms.
     *
     * @param string $indexName The index in which to perform the request. (required)
     * @param bool $forwardToReplicas When true, changes are also propagated to replicas of the given indexName. (optional)
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\UpdatedAtResponse
     */
    public function clearAllSynonyms(
        $indexName,
        $forwardToReplicas = null,
        $requestOptions = []
    ) {
        // verify the required parameter 'indexName' is set
        if ($indexName === null) {
            throw new \InvalidArgumentException(
                'Parameter `indexName` is required when calling `clearAllSynonyms`.'
            );
        }

        $resourcePath = '/1/indexes/{indexName}/synonyms/clear';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        if ($forwardToReplicas !== null) {
            $queryParameters['forwardToReplicas'] = $forwardToReplicas;
        }

        // path params
        if ($indexName !== null) {
            $resourcePath = str_replace(
                '{indexName}',
                ObjectSerializer::toPathValue($indexName),
                $resourcePath
            );
        }

        return $this->sendRequest(
            'POST',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * Clear all objects from an index.
     *
     * @param string $indexName The index in which to perform the request. (required)
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\UpdatedAtResponse
     */
    public function clearObjects($indexName, $requestOptions = [])
    {
        // verify the required parameter 'indexName' is set
        if ($indexName === null) {
            throw new \InvalidArgumentException(
                'Parameter `indexName` is required when calling `clearObjects`.'
            );
        }

        $resourcePath = '/1/indexes/{indexName}/clear';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        // path params
        if ($indexName !== null) {
            $resourcePath = str_replace(
                '{indexName}',
                ObjectSerializer::toPathValue($indexName),
                $resourcePath
            );
        }

        return $this->sendRequest(
            'POST',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * Clear Rules.
     *
     * @param string $indexName The index in which to perform the request. (required)
     * @param bool $forwardToReplicas When true, changes are also propagated to replicas of the given indexName. (optional)
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\UpdatedAtResponse
     */
    public function clearRules(
        $indexName,
        $forwardToReplicas = null,
        $requestOptions = []
    ) {
        // verify the required parameter 'indexName' is set
        if ($indexName === null) {
            throw new \InvalidArgumentException(
                'Parameter `indexName` is required when calling `clearRules`.'
            );
        }

        $resourcePath = '/1/indexes/{indexName}/rules/clear';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        if ($forwardToReplicas !== null) {
            $queryParameters['forwardToReplicas'] = $forwardToReplicas;
        }

        // path params
        if ($indexName !== null) {
            $resourcePath = str_replace(
                '{indexName}',
                ObjectSerializer::toPathValue($indexName),
                $resourcePath
            );
        }

        return $this->sendRequest(
            'POST',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * Send requests to the Algolia REST API.
     *
     * @param string $path The path of the API endpoint to target, anything after the /1 needs to be specified. (required)
     * @param array $parameters Query parameters to be applied to the current query. (optional)
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|object
     */
    public function del($path, $parameters = null, $requestOptions = [])
    {
        // verify the required parameter 'path' is set
        if ($path === null) {
            throw new \InvalidArgumentException(
                'Parameter `path` is required when calling `del`.'
            );
        }

        $resourcePath = '/1{path}';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        if ($parameters !== null) {
            $queryParameters = $parameters;
        }

        // path params
        if ($path !== null) {
            $resourcePath = str_replace('{path}', $path, $resourcePath);
        }

        return $this->sendRequest(
            'DELETE',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * Delete an API key.
     *
     * @param string $key API Key string. (required)
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\DeleteApiKeyResponse
     */
    public function deleteApiKey($key, $requestOptions = [])
    {
        // verify the required parameter 'key' is set
        if ($key === null) {
            throw new \InvalidArgumentException(
                'Parameter `key` is required when calling `deleteApiKey`.'
            );
        }

        $resourcePath = '/1/keys/{key}';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        // path params
        if ($key !== null) {
            $resourcePath = str_replace(
                '{key}',
                ObjectSerializer::toPathValue($key),
                $resourcePath
            );
        }

        return $this->sendRequest(
            'DELETE',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * Delete all records matching the query.
     *
     * @param string $indexName The index in which to perform the request. (required)
     * @param array $searchParams searchParams (required)
     *
     * @see \Algolia\AlgoliaSearch\Model\Search\SearchParams
     *
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\DeletedAtResponse
     */
    public function deleteBy($indexName, $searchParams, $requestOptions = [])
    {
        // verify the required parameter 'indexName' is set
        if ($indexName === null) {
            throw new \InvalidArgumentException(
                'Parameter `indexName` is required when calling `deleteBy`.'
            );
        }
        // verify the required parameter 'searchParams' is set
        if ($searchParams === null) {
            throw new \InvalidArgumentException(
                'Parameter `searchParams` is required when calling `deleteBy`.'
            );
        }

        $resourcePath = '/1/indexes/{indexName}/deleteByQuery';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        // path params
        if ($indexName !== null) {
            $resourcePath = str_replace(
                '{indexName}',
                ObjectSerializer::toPathValue($indexName),
                $resourcePath
            );
        }

        if (isset($searchParams)) {
            $httpBody = $searchParams;
        }

        return $this->sendRequest(
            'POST',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * Delete index.
     *
     * @param string $indexName The index in which to perform the request. (required)
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\DeletedAtResponse
     */
    public function deleteIndex($indexName, $requestOptions = [])
    {
        // verify the required parameter 'indexName' is set
        if ($indexName === null) {
            throw new \InvalidArgumentException(
                'Parameter `indexName` is required when calling `deleteIndex`.'
            );
        }

        $resourcePath = '/1/indexes/{indexName}';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        // path params
        if ($indexName !== null) {
            $resourcePath = str_replace(
                '{indexName}',
                ObjectSerializer::toPathValue($indexName),
                $resourcePath
            );
        }

        return $this->sendRequest(
            'DELETE',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * Delete an object.
     *
     * @param string $indexName The index in which to perform the request. (required)
     * @param string $objectID Unique identifier of an object. (required)
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\DeletedAtResponse
     */
    public function deleteObject($indexName, $objectID, $requestOptions = [])
    {
        // verify the required parameter 'indexName' is set
        if ($indexName === null) {
            throw new \InvalidArgumentException(
                'Parameter `indexName` is required when calling `deleteObject`.'
            );
        }
        // verify the required parameter 'objectID' is set
        if ($objectID === null) {
            throw new \InvalidArgumentException(
                'Parameter `objectID` is required when calling `deleteObject`.'
            );
        }

        $resourcePath = '/1/indexes/{indexName}/{objectID}';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        // path params
        if ($indexName !== null) {
            $resourcePath = str_replace(
                '{indexName}',
                ObjectSerializer::toPathValue($indexName),
                $resourcePath
            );
        }

        // path params
        if ($objectID !== null) {
            $resourcePath = str_replace(
                '{objectID}',
                ObjectSerializer::toPathValue($objectID),
                $resourcePath
            );
        }

        return $this->sendRequest(
            'DELETE',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * Delete a rule.
     *
     * @param string $indexName The index in which to perform the request. (required)
     * @param string $objectID Unique identifier of an object. (required)
     * @param bool $forwardToReplicas When true, changes are also propagated to replicas of the given indexName. (optional)
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\UpdatedAtResponse
     */
    public function deleteRule(
        $indexName,
        $objectID,
        $forwardToReplicas = null,
        $requestOptions = []
    ) {
        // verify the required parameter 'indexName' is set
        if ($indexName === null) {
            throw new \InvalidArgumentException(
                'Parameter `indexName` is required when calling `deleteRule`.'
            );
        }
        // verify the required parameter 'objectID' is set
        if ($objectID === null) {
            throw new \InvalidArgumentException(
                'Parameter `objectID` is required when calling `deleteRule`.'
            );
        }

        $resourcePath = '/1/indexes/{indexName}/rules/{objectID}';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        if ($forwardToReplicas !== null) {
            $queryParameters['forwardToReplicas'] = $forwardToReplicas;
        }

        // path params
        if ($indexName !== null) {
            $resourcePath = str_replace(
                '{indexName}',
                ObjectSerializer::toPathValue($indexName),
                $resourcePath
            );
        }

        // path params
        if ($objectID !== null) {
            $resourcePath = str_replace(
                '{objectID}',
                ObjectSerializer::toPathValue($objectID),
                $resourcePath
            );
        }

        return $this->sendRequest(
            'DELETE',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * Remove a single source.
     *
     * @param string $source The IP range of the source. (required)
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\DeleteSourceResponse
     */
    public function deleteSource($source, $requestOptions = [])
    {
        // verify the required parameter 'source' is set
        if ($source === null) {
            throw new \InvalidArgumentException(
                'Parameter `source` is required when calling `deleteSource`.'
            );
        }

        $resourcePath = '/1/security/sources/{source}';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        // path params
        if ($source !== null) {
            $resourcePath = str_replace(
                '{source}',
                ObjectSerializer::toPathValue($source),
                $resourcePath
            );
        }

        return $this->sendRequest(
            'DELETE',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * Delete synonym.
     *
     * @param string $indexName The index in which to perform the request. (required)
     * @param string $objectID Unique identifier of an object. (required)
     * @param bool $forwardToReplicas When true, changes are also propagated to replicas of the given indexName. (optional)
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\DeletedAtResponse
     */
    public function deleteSynonym(
        $indexName,
        $objectID,
        $forwardToReplicas = null,
        $requestOptions = []
    ) {
        // verify the required parameter 'indexName' is set
        if ($indexName === null) {
            throw new \InvalidArgumentException(
                'Parameter `indexName` is required when calling `deleteSynonym`.'
            );
        }
        // verify the required parameter 'objectID' is set
        if ($objectID === null) {
            throw new \InvalidArgumentException(
                'Parameter `objectID` is required when calling `deleteSynonym`.'
            );
        }

        $resourcePath = '/1/indexes/{indexName}/synonyms/{objectID}';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        if ($forwardToReplicas !== null) {
            $queryParameters['forwardToReplicas'] = $forwardToReplicas;
        }

        // path params
        if ($indexName !== null) {
            $resourcePath = str_replace(
                '{indexName}',
                ObjectSerializer::toPathValue($indexName),
                $resourcePath
            );
        }

        // path params
        if ($objectID !== null) {
            $resourcePath = str_replace(
                '{objectID}',
                ObjectSerializer::toPathValue($objectID),
                $resourcePath
            );
        }

        return $this->sendRequest(
            'DELETE',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * Send requests to the Algolia REST API.
     *
     * @param string $path The path of the API endpoint to target, anything after the /1 needs to be specified. (required)
     * @param array $parameters Query parameters to be applied to the current query. (optional)
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|object
     */
    public function get($path, $parameters = null, $requestOptions = [])
    {
        // verify the required parameter 'path' is set
        if ($path === null) {
            throw new \InvalidArgumentException(
                'Parameter `path` is required when calling `get`.'
            );
        }

        $resourcePath = '/1{path}';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        if ($parameters !== null) {
            $queryParameters = $parameters;
        }

        // path params
        if ($path !== null) {
            $resourcePath = str_replace('{path}', $path, $resourcePath);
        }

        return $this->sendRequest(
            'GET',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * Get an API key.
     *
     * @param string $key API Key string. (required)
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\Key
     */
    public function getApiKey($key, $requestOptions = [])
    {
        // verify the required parameter 'key' is set
        if ($key === null) {
            throw new \InvalidArgumentException(
                'Parameter `key` is required when calling `getApiKey`.'
            );
        }

        $resourcePath = '/1/keys/{key}';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        // path params
        if ($key !== null) {
            $resourcePath = str_replace(
                '{key}',
                ObjectSerializer::toPathValue($key),
                $resourcePath
            );
        }

        return $this->sendRequest(
            'GET',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * List available languages.
     *
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|array<string,\Algolia\AlgoliaSearch\Model\Search\Languages>
     */
    public function getDictionaryLanguages($requestOptions = [])
    {
        $resourcePath = '/1/dictionaries/*/languages';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        return $this->sendRequest(
            'GET',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * Retrieve dictionaries settings.
     *
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\GetDictionarySettingsResponse
     */
    public function getDictionarySettings($requestOptions = [])
    {
        $resourcePath = '/1/dictionaries/*/settings';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        return $this->sendRequest(
            'GET',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * Return the latest log entries.
     *
     * @param int $offset First entry to retrieve (zero-based). Log entries are sorted by decreasing date, therefore 0 designates the most recent log entry. (optional, default to 0)
     * @param int $length Maximum number of entries to retrieve. The maximum allowed value is 1000. (optional, default to 10)
     * @param string $indexName Index for which log entries should be retrieved. When omitted, log entries are retrieved across all indices. (optional)
     * @param array $type Type of log entries to retrieve. When omitted, all log entries are retrieved. (optional)
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\GetLogsResponse
     */
    public function getLogs(
        $offset = null,
        $length = null,
        $indexName = null,
        $type = null,
        $requestOptions = []
    ) {
        if ($length !== null && $length > 1000) {
            throw new \InvalidArgumentException(
                'invalid value for "$length" when calling SearchClient.getLogs, must be smaller than or equal to 1000.'
            );
        }

        $resourcePath = '/1/logs';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        if ($offset !== null) {
            $queryParameters['offset'] = $offset;
        }

        if ($length !== null) {
            $queryParameters['length'] = $length;
        }

        if ($indexName !== null) {
            $queryParameters['indexName'] = $indexName;
        }

        if ($type !== null) {
            $queryParameters['type'] = $type;
        }

        return $this->sendRequest(
            'GET',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * Retrieve an object.
     *
     * @param string $indexName The index in which to perform the request. (required)
     * @param string $objectID Unique identifier of an object. (required)
     * @param array $attributesToRetrieve List of attributes to retrieve. If not specified, all retrievable attributes are returned. (optional)
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|array<string,string>
     */
    public function getObject(
        $indexName,
        $objectID,
        $attributesToRetrieve = null,
        $requestOptions = []
    ) {
        // verify the required parameter 'indexName' is set
        if ($indexName === null) {
            throw new \InvalidArgumentException(
                'Parameter `indexName` is required when calling `getObject`.'
            );
        }
        // verify the required parameter 'objectID' is set
        if ($objectID === null) {
            throw new \InvalidArgumentException(
                'Parameter `objectID` is required when calling `getObject`.'
            );
        }

        $resourcePath = '/1/indexes/{indexName}/{objectID}';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        if ($attributesToRetrieve !== null) {
            $queryParameters['attributesToRetrieve'] = $attributesToRetrieve;
        }

        // path params
        if ($indexName !== null) {
            $resourcePath = str_replace(
                '{indexName}',
                ObjectSerializer::toPathValue($indexName),
                $resourcePath
            );
        }

        // path params
        if ($objectID !== null) {
            $resourcePath = str_replace(
                '{objectID}',
                ObjectSerializer::toPathValue($objectID),
                $resourcePath
            );
        }

        return $this->sendRequest(
            'GET',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * Retrieve one or more objects.
     *
     * @param array $getObjectsParams getObjectsParams (required)
     * - $getObjectsParams['requests'] => (array)
     *
     * @see \Algolia\AlgoliaSearch\Model\Search\GetObjectsParams
     *
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\GetObjectsResponse
     */
    public function getObjects($getObjectsParams, $requestOptions = [])
    {
        // verify the required parameter 'getObjectsParams' is set
        if ($getObjectsParams === null) {
            throw new \InvalidArgumentException(
                'Parameter `getObjectsParams` is required when calling `getObjects`.'
            );
        }

        $resourcePath = '/1/indexes/*/objects';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        if (isset($getObjectsParams)) {
            $httpBody = $getObjectsParams;
        }

        return $this->sendRequest(
            'POST',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions,
            true
        );
    }

    /**
     * Get a rule.
     *
     * @param string $indexName The index in which to perform the request. (required)
     * @param string $objectID Unique identifier of an object. (required)
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\Rule
     */
    public function getRule($indexName, $objectID, $requestOptions = [])
    {
        // verify the required parameter 'indexName' is set
        if ($indexName === null) {
            throw new \InvalidArgumentException(
                'Parameter `indexName` is required when calling `getRule`.'
            );
        }
        // verify the required parameter 'objectID' is set
        if ($objectID === null) {
            throw new \InvalidArgumentException(
                'Parameter `objectID` is required when calling `getRule`.'
            );
        }

        $resourcePath = '/1/indexes/{indexName}/rules/{objectID}';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        // path params
        if ($indexName !== null) {
            $resourcePath = str_replace(
                '{indexName}',
                ObjectSerializer::toPathValue($indexName),
                $resourcePath
            );
        }

        // path params
        if ($objectID !== null) {
            $resourcePath = str_replace(
                '{objectID}',
                ObjectSerializer::toPathValue($objectID),
                $resourcePath
            );
        }

        return $this->sendRequest(
            'GET',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * Retrieve settings of an index.
     *
     * @param string $indexName The index in which to perform the request. (required)
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\IndexSettings
     */
    public function getSettings($indexName, $requestOptions = [])
    {
        // verify the required parameter 'indexName' is set
        if ($indexName === null) {
            throw new \InvalidArgumentException(
                'Parameter `indexName` is required when calling `getSettings`.'
            );
        }

        $resourcePath = '/1/indexes/{indexName}/settings';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        // path params
        if ($indexName !== null) {
            $resourcePath = str_replace(
                '{indexName}',
                ObjectSerializer::toPathValue($indexName),
                $resourcePath
            );
        }

        return $this->sendRequest(
            'GET',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * List all allowed sources.
     *
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\Source[]
     */
    public function getSources($requestOptions = [])
    {
        $resourcePath = '/1/security/sources';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        return $this->sendRequest(
            'GET',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * Get synonym.
     *
     * @param string $indexName The index in which to perform the request. (required)
     * @param string $objectID Unique identifier of an object. (required)
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\SynonymHit
     */
    public function getSynonym($indexName, $objectID, $requestOptions = [])
    {
        // verify the required parameter 'indexName' is set
        if ($indexName === null) {
            throw new \InvalidArgumentException(
                'Parameter `indexName` is required when calling `getSynonym`.'
            );
        }
        // verify the required parameter 'objectID' is set
        if ($objectID === null) {
            throw new \InvalidArgumentException(
                'Parameter `objectID` is required when calling `getSynonym`.'
            );
        }

        $resourcePath = '/1/indexes/{indexName}/synonyms/{objectID}';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        // path params
        if ($indexName !== null) {
            $resourcePath = str_replace(
                '{indexName}',
                ObjectSerializer::toPathValue($indexName),
                $resourcePath
            );
        }

        // path params
        if ($objectID !== null) {
            $resourcePath = str_replace(
                '{objectID}',
                ObjectSerializer::toPathValue($objectID),
                $resourcePath
            );
        }

        return $this->sendRequest(
            'GET',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * Check the status of a task.
     *
     * @param string $indexName The index in which to perform the request. (required)
     * @param int $taskID Unique identifier of an task. Numeric value (up to 64bits). (required)
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\GetTaskResponse
     */
    public function getTask($indexName, $taskID, $requestOptions = [])
    {
        // verify the required parameter 'indexName' is set
        if ($indexName === null) {
            throw new \InvalidArgumentException(
                'Parameter `indexName` is required when calling `getTask`.'
            );
        }
        // verify the required parameter 'taskID' is set
        if ($taskID === null) {
            throw new \InvalidArgumentException(
                'Parameter `taskID` is required when calling `getTask`.'
            );
        }

        $resourcePath = '/1/indexes/{indexName}/task/{taskID}';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        // path params
        if ($indexName !== null) {
            $resourcePath = str_replace(
                '{indexName}',
                ObjectSerializer::toPathValue($indexName),
                $resourcePath
            );
        }

        // path params
        if ($taskID !== null) {
            $resourcePath = str_replace(
                '{taskID}',
                ObjectSerializer::toPathValue($taskID),
                $resourcePath
            );
        }

        return $this->sendRequest(
            'GET',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * Get top userID.
     *
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\GetTopUserIdsResponse
     */
    public function getTopUserIds($requestOptions = [])
    {
        $resourcePath = '/1/clusters/mapping/top';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        return $this->sendRequest(
            'GET',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * Get userID.
     *
     * @param string $userID userID to assign. (required)
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\UserId
     */
    public function getUserId($userID, $requestOptions = [])
    {
        // verify the required parameter 'userID' is set
        if ($userID === null) {
            throw new \InvalidArgumentException(
                'Parameter `userID` is required when calling `getUserId`.'
            );
        }
        if (!preg_match('/^[a-zA-Z0-9 \\-*.]+$/', $userID)) {
            throw new \InvalidArgumentException(
                'invalid value for "userID" when calling SearchClient.getUserId, must conform to the pattern /^[a-zA-Z0-9 \\-*.]+$/.'
            );
        }

        $resourcePath = '/1/clusters/mapping/{userID}';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        // path params
        if ($userID !== null) {
            $resourcePath = str_replace(
                '{userID}',
                ObjectSerializer::toPathValue($userID),
                $resourcePath
            );
        }

        return $this->sendRequest(
            'GET',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * Get migration status.
     *
     * @param bool $getClusters Whether to get clusters or not. (optional)
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\CreatedAtResponse
     */
    public function hasPendingMappings(
        $getClusters = null,
        $requestOptions = []
    ) {
        $resourcePath = '/1/clusters/mapping/pending';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        if ($getClusters !== null) {
            $queryParameters['getClusters'] = $getClusters;
        }

        return $this->sendRequest(
            'GET',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * List API Keys.
     *
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\ListApiKeysResponse
     */
    public function listApiKeys($requestOptions = [])
    {
        $resourcePath = '/1/keys';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        return $this->sendRequest(
            'GET',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * List clusters.
     *
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\ListClustersResponse
     */
    public function listClusters($requestOptions = [])
    {
        $resourcePath = '/1/clusters';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        return $this->sendRequest(
            'GET',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * List existing indexes.
     *
     * @param int $page Requested page (zero-based). When specified, will retrieve a specific page; the page size is implicitly set to 100. When null, will retrieve all indices (no pagination). (optional)
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\ListIndicesResponse
     */
    public function listIndices($page = null, $requestOptions = [])
    {
        $resourcePath = '/1/indexes';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        if ($page !== null) {
            $queryParameters['page'] = $page;
        }

        return $this->sendRequest(
            'GET',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * List userIDs.
     *
     * @param int $page Requested page (zero-based). When specified, will retrieve a specific page; the page size is implicitly set to 100. When null, will retrieve all indices (no pagination). (optional)
     * @param int $hitsPerPage Maximum number of objects to retrieve. (optional, default to 100)
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\ListUserIdsResponse
     */
    public function listUserIds(
        $page = null,
        $hitsPerPage = null,
        $requestOptions = []
    ) {
        $resourcePath = '/1/clusters/mapping';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        if ($page !== null) {
            $queryParameters['page'] = $page;
        }

        if ($hitsPerPage !== null) {
            $queryParameters['hitsPerPage'] = $hitsPerPage;
        }

        return $this->sendRequest(
            'GET',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * Batch operations to many indices.
     *
     * @param array $batchParams batchParams (required)
     * - $batchParams['requests'] => (array)
     *
     * @see \Algolia\AlgoliaSearch\Model\Search\BatchParams
     *
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\MultipleBatchResponse
     */
    public function multipleBatch($batchParams, $requestOptions = [])
    {
        // verify the required parameter 'batchParams' is set
        if ($batchParams === null) {
            throw new \InvalidArgumentException(
                'Parameter `batchParams` is required when calling `multipleBatch`.'
            );
        }

        $resourcePath = '/1/indexes/*/batch';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        if (isset($batchParams)) {
            $httpBody = $batchParams;
        }

        return $this->sendRequest(
            'POST',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * Copy/move index.
     *
     * @param string $indexName The index in which to perform the request. (required)
     * @param array $operationIndexParams operationIndexParams (required)
     * - $operationIndexParams['operation'] => (array)  (required)
     * - $operationIndexParams['destination'] => (string) The Algolia index name. (required)
     * - $operationIndexParams['scope'] => (array) Scope of the data to copy. When absent, a full copy is performed. When present, only the selected scopes are copied.
     *
     * @see \Algolia\AlgoliaSearch\Model\Search\OperationIndexParams
     *
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\UpdatedAtResponse
     */
    public function operationIndex(
        $indexName,
        $operationIndexParams,
        $requestOptions = []
    ) {
        // verify the required parameter 'indexName' is set
        if ($indexName === null) {
            throw new \InvalidArgumentException(
                'Parameter `indexName` is required when calling `operationIndex`.'
            );
        }
        // verify the required parameter 'operationIndexParams' is set
        if ($operationIndexParams === null) {
            throw new \InvalidArgumentException(
                'Parameter `operationIndexParams` is required when calling `operationIndex`.'
            );
        }

        $resourcePath = '/1/indexes/{indexName}/operation';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        // path params
        if ($indexName !== null) {
            $resourcePath = str_replace(
                '{indexName}',
                ObjectSerializer::toPathValue($indexName),
                $resourcePath
            );
        }

        if (isset($operationIndexParams)) {
            $httpBody = $operationIndexParams;
        }

        return $this->sendRequest(
            'POST',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * Partially update an object.
     *
     * @param string $indexName The index in which to perform the request. (required)
     * @param string $objectID Unique identifier of an object. (required)
     * @param array $attributeOrBuiltInOperation List of attributes to update. (required)
     * @param bool $createIfNotExists Creates the record if it does not exist yet. (optional, default to true)
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\UpdatedAtWithObjectIdResponse
     */
    public function partialUpdateObject(
        $indexName,
        $objectID,
        $attributeOrBuiltInOperation,
        $createIfNotExists = null,
        $requestOptions = []
    ) {
        // verify the required parameter 'indexName' is set
        if ($indexName === null) {
            throw new \InvalidArgumentException(
                'Parameter `indexName` is required when calling `partialUpdateObject`.'
            );
        }
        // verify the required parameter 'objectID' is set
        if ($objectID === null) {
            throw new \InvalidArgumentException(
                'Parameter `objectID` is required when calling `partialUpdateObject`.'
            );
        }
        // verify the required parameter 'attributeOrBuiltInOperation' is set
        if ($attributeOrBuiltInOperation === null) {
            throw new \InvalidArgumentException(
                'Parameter `attributeOrBuiltInOperation` is required when calling `partialUpdateObject`.'
            );
        }

        $resourcePath = '/1/indexes/{indexName}/{objectID}/partial';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        if ($createIfNotExists !== null) {
            $queryParameters['createIfNotExists'] = $createIfNotExists;
        }

        // path params
        if ($indexName !== null) {
            $resourcePath = str_replace(
                '{indexName}',
                ObjectSerializer::toPathValue($indexName),
                $resourcePath
            );
        }

        // path params
        if ($objectID !== null) {
            $resourcePath = str_replace(
                '{objectID}',
                ObjectSerializer::toPathValue($objectID),
                $resourcePath
            );
        }

        if (isset($attributeOrBuiltInOperation)) {
            $httpBody = $attributeOrBuiltInOperation;
        }

        return $this->sendRequest(
            'POST',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * Send requests to the Algolia REST API.
     *
     * @param string $path The path of the API endpoint to target, anything after the /1 needs to be specified. (required)
     * @param array $parameters Query parameters to be applied to the current query. (optional)
     * @param array $body The parameters to send with the custom request. (optional)
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|object
     */
    public function post(
        $path,
        $parameters = null,
        $body = null,
        $requestOptions = []
    ) {
        // verify the required parameter 'path' is set
        if ($path === null) {
            throw new \InvalidArgumentException(
                'Parameter `path` is required when calling `post`.'
            );
        }

        $resourcePath = '/1{path}';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        if ($parameters !== null) {
            $queryParameters = $parameters;
        }

        // path params
        if ($path !== null) {
            $resourcePath = str_replace('{path}', $path, $resourcePath);
        }

        if (isset($body)) {
            $httpBody = $body;
        }

        return $this->sendRequest(
            'POST',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * Send requests to the Algolia REST API.
     *
     * @param string $path The path of the API endpoint to target, anything after the /1 needs to be specified. (required)
     * @param array $parameters Query parameters to be applied to the current query. (optional)
     * @param array $body The parameters to send with the custom request. (optional)
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|object
     */
    public function put(
        $path,
        $parameters = null,
        $body = null,
        $requestOptions = []
    ) {
        // verify the required parameter 'path' is set
        if ($path === null) {
            throw new \InvalidArgumentException(
                'Parameter `path` is required when calling `put`.'
            );
        }

        $resourcePath = '/1{path}';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        if ($parameters !== null) {
            $queryParameters = $parameters;
        }

        // path params
        if ($path !== null) {
            $resourcePath = str_replace('{path}', $path, $resourcePath);
        }

        if (isset($body)) {
            $httpBody = $body;
        }

        return $this->sendRequest(
            'PUT',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * Remove userID.
     *
     * @param string $userID userID to assign. (required)
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\RemoveUserIdResponse
     */
    public function removeUserId($userID, $requestOptions = [])
    {
        // verify the required parameter 'userID' is set
        if ($userID === null) {
            throw new \InvalidArgumentException(
                'Parameter `userID` is required when calling `removeUserId`.'
            );
        }
        if (!preg_match('/^[a-zA-Z0-9 \\-*.]+$/', $userID)) {
            throw new \InvalidArgumentException(
                'invalid value for "userID" when calling SearchClient.removeUserId, must conform to the pattern /^[a-zA-Z0-9 \\-*.]+$/.'
            );
        }

        $resourcePath = '/1/clusters/mapping/{userID}';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        // path params
        if ($userID !== null) {
            $resourcePath = str_replace(
                '{userID}',
                ObjectSerializer::toPathValue($userID),
                $resourcePath
            );
        }

        return $this->sendRequest(
            'DELETE',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * Replace all allowed sources.
     *
     * @param array $source The sources to allow. (required)
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\ReplaceSourceResponse
     */
    public function replaceSources($source, $requestOptions = [])
    {
        // verify the required parameter 'source' is set
        if ($source === null) {
            throw new \InvalidArgumentException(
                'Parameter `source` is required when calling `replaceSources`.'
            );
        }

        $resourcePath = '/1/security/sources';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        if (isset($source)) {
            $httpBody = $source;
        }

        return $this->sendRequest(
            'PUT',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * Restore an API key.
     *
     * @param string $key API Key string. (required)
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\AddApiKeyResponse
     */
    public function restoreApiKey($key, $requestOptions = [])
    {
        // verify the required parameter 'key' is set
        if ($key === null) {
            throw new \InvalidArgumentException(
                'Parameter `key` is required when calling `restoreApiKey`.'
            );
        }

        $resourcePath = '/1/keys/{key}/restore';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        // path params
        if ($key !== null) {
            $resourcePath = str_replace(
                '{key}',
                ObjectSerializer::toPathValue($key),
                $resourcePath
            );
        }

        return $this->sendRequest(
            'POST',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * Add an object to the index.
     *
     * @param string $indexName The index in which to perform the request. (required)
     * @param array $body The Algolia record. (required)
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\SaveObjectResponse
     */
    public function saveObject($indexName, $body, $requestOptions = [])
    {
        // verify the required parameter 'indexName' is set
        if ($indexName === null) {
            throw new \InvalidArgumentException(
                'Parameter `indexName` is required when calling `saveObject`.'
            );
        }
        // verify the required parameter 'body' is set
        if ($body === null) {
            throw new \InvalidArgumentException(
                'Parameter `body` is required when calling `saveObject`.'
            );
        }

        $resourcePath = '/1/indexes/{indexName}';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        // path params
        if ($indexName !== null) {
            $resourcePath = str_replace(
                '{indexName}',
                ObjectSerializer::toPathValue($indexName),
                $resourcePath
            );
        }

        if (isset($body)) {
            $httpBody = $body;
        }

        return $this->sendRequest(
            'POST',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * Save/Update a rule.
     *
     * @param string $indexName The index in which to perform the request. (required)
     * @param string $objectID Unique identifier of an object. (required)
     * @param array $rule rule (required)
     * - $rule['objectID'] => (string) Unique identifier of the object. (required)
     * - $rule['conditions'] => (array) A list of conditions that should apply to activate a Rule. You can use up to 25 conditions per Rule.
     * - $rule['consequence'] => (array)  (required)
     * - $rule['description'] => (string) This field is intended for Rule management purposes, in particular to ease searching for Rules and presenting them to human readers. It's not interpreted by the API.
     * - $rule['enabled'] => (bool) Whether the Rule is enabled. Disabled Rules remain in the index, but aren't applied at query time.
     * - $rule['validity'] => (array) By default, Rules are permanently valid. When validity periods are specified, the Rule applies only during those periods; it's ignored the rest of the time. The list must not be empty.
     *
     * @see \Algolia\AlgoliaSearch\Model\Search\Rule
     *
     * @param bool $forwardToReplicas When true, changes are also propagated to replicas of the given indexName. (optional)
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\UpdatedRuleResponse
     */
    public function saveRule(
        $indexName,
        $objectID,
        $rule,
        $forwardToReplicas = null,
        $requestOptions = []
    ) {
        // verify the required parameter 'indexName' is set
        if ($indexName === null) {
            throw new \InvalidArgumentException(
                'Parameter `indexName` is required when calling `saveRule`.'
            );
        }
        // verify the required parameter 'objectID' is set
        if ($objectID === null) {
            throw new \InvalidArgumentException(
                'Parameter `objectID` is required when calling `saveRule`.'
            );
        }
        // verify the required parameter 'rule' is set
        if ($rule === null) {
            throw new \InvalidArgumentException(
                'Parameter `rule` is required when calling `saveRule`.'
            );
        }

        $resourcePath = '/1/indexes/{indexName}/rules/{objectID}';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        if ($forwardToReplicas !== null) {
            $queryParameters['forwardToReplicas'] = $forwardToReplicas;
        }

        // path params
        if ($indexName !== null) {
            $resourcePath = str_replace(
                '{indexName}',
                ObjectSerializer::toPathValue($indexName),
                $resourcePath
            );
        }

        // path params
        if ($objectID !== null) {
            $resourcePath = str_replace(
                '{objectID}',
                ObjectSerializer::toPathValue($objectID),
                $resourcePath
            );
        }

        if (isset($rule)) {
            $httpBody = $rule;
        }

        return $this->sendRequest(
            'PUT',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * Save a batch of rules.
     *
     * @param string $indexName The index in which to perform the request. (required)
     * @param array $rule rule (required)
     * @param bool $forwardToReplicas When true, changes are also propagated to replicas of the given indexName. (optional)
     * @param bool $clearExistingRules When true, existing Rules are cleared before adding this batch. When false, existing Rules are kept. (optional)
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\UpdatedAtResponse
     */
    public function saveRules(
        $indexName,
        $rule,
        $forwardToReplicas = null,
        $clearExistingRules = null,
        $requestOptions = []
    ) {
        // verify the required parameter 'indexName' is set
        if ($indexName === null) {
            throw new \InvalidArgumentException(
                'Parameter `indexName` is required when calling `saveRules`.'
            );
        }
        // verify the required parameter 'rule' is set
        if ($rule === null) {
            throw new \InvalidArgumentException(
                'Parameter `rule` is required when calling `saveRules`.'
            );
        }

        $resourcePath = '/1/indexes/{indexName}/rules/batch';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        if ($forwardToReplicas !== null) {
            $queryParameters['forwardToReplicas'] = $forwardToReplicas;
        }

        if ($clearExistingRules !== null) {
            $queryParameters['clearExistingRules'] = $clearExistingRules;
        }

        // path params
        if ($indexName !== null) {
            $resourcePath = str_replace(
                '{indexName}',
                ObjectSerializer::toPathValue($indexName),
                $resourcePath
            );
        }

        if (isset($rule)) {
            $httpBody = $rule;
        }

        return $this->sendRequest(
            'POST',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * Save synonym.
     *
     * @param string $indexName The index in which to perform the request. (required)
     * @param string $objectID Unique identifier of an object. (required)
     * @param array $synonymHit synonymHit (required)
     * - $synonymHit['objectID'] => (string) Unique identifier of the synonym object to be created or updated. (required)
     * - $synonymHit['type'] => (array)
     * - $synonymHit['synonyms'] => (array) Words or phrases to be considered equivalent.
     * - $synonymHit['input'] => (string) Word or phrase to appear in query strings (for onewaysynonym).
     * - $synonymHit['word'] => (string) Word or phrase to appear in query strings (for altcorrection1 and altcorrection2).
     * - $synonymHit['corrections'] => (array) Words to be matched in records.
     * - $synonymHit['placeholder'] => (string) Token to be put inside records.
     * - $synonymHit['replacements'] => (array) List of query words that will match the token.
     * - $synonymHit['_highlightResult'] => (array)
     *
     * @see \Algolia\AlgoliaSearch\Model\Search\SynonymHit
     *
     * @param bool $forwardToReplicas When true, changes are also propagated to replicas of the given indexName. (optional)
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\SaveSynonymResponse
     */
    public function saveSynonym(
        $indexName,
        $objectID,
        $synonymHit,
        $forwardToReplicas = null,
        $requestOptions = []
    ) {
        // verify the required parameter 'indexName' is set
        if ($indexName === null) {
            throw new \InvalidArgumentException(
                'Parameter `indexName` is required when calling `saveSynonym`.'
            );
        }
        // verify the required parameter 'objectID' is set
        if ($objectID === null) {
            throw new \InvalidArgumentException(
                'Parameter `objectID` is required when calling `saveSynonym`.'
            );
        }
        // verify the required parameter 'synonymHit' is set
        if ($synonymHit === null) {
            throw new \InvalidArgumentException(
                'Parameter `synonymHit` is required when calling `saveSynonym`.'
            );
        }

        $resourcePath = '/1/indexes/{indexName}/synonyms/{objectID}';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        if ($forwardToReplicas !== null) {
            $queryParameters['forwardToReplicas'] = $forwardToReplicas;
        }

        // path params
        if ($indexName !== null) {
            $resourcePath = str_replace(
                '{indexName}',
                ObjectSerializer::toPathValue($indexName),
                $resourcePath
            );
        }

        // path params
        if ($objectID !== null) {
            $resourcePath = str_replace(
                '{objectID}',
                ObjectSerializer::toPathValue($objectID),
                $resourcePath
            );
        }

        if (isset($synonymHit)) {
            $httpBody = $synonymHit;
        }

        return $this->sendRequest(
            'PUT',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * Save a batch of synonyms.
     *
     * @param string $indexName The index in which to perform the request. (required)
     * @param array $synonymHit synonymHit (required)
     * @param bool $forwardToReplicas When true, changes are also propagated to replicas of the given indexName. (optional)
     * @param bool $replaceExistingSynonyms Replace all synonyms of the index with the ones sent with this request. (optional)
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\UpdatedAtResponse
     */
    public function saveSynonyms(
        $indexName,
        $synonymHit,
        $forwardToReplicas = null,
        $replaceExistingSynonyms = null,
        $requestOptions = []
    ) {
        // verify the required parameter 'indexName' is set
        if ($indexName === null) {
            throw new \InvalidArgumentException(
                'Parameter `indexName` is required when calling `saveSynonyms`.'
            );
        }
        // verify the required parameter 'synonymHit' is set
        if ($synonymHit === null) {
            throw new \InvalidArgumentException(
                'Parameter `synonymHit` is required when calling `saveSynonyms`.'
            );
        }

        $resourcePath = '/1/indexes/{indexName}/synonyms/batch';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        if ($forwardToReplicas !== null) {
            $queryParameters['forwardToReplicas'] = $forwardToReplicas;
        }

        if ($replaceExistingSynonyms !== null) {
            $queryParameters[
                'replaceExistingSynonyms'
            ] = $replaceExistingSynonyms;
        }

        // path params
        if ($indexName !== null) {
            $resourcePath = str_replace(
                '{indexName}',
                ObjectSerializer::toPathValue($indexName),
                $resourcePath
            );
        }

        if (isset($synonymHit)) {
            $httpBody = $synonymHit;
        }

        return $this->sendRequest(
            'POST',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * Search multiple indices.
     *
     * @param array $searchMethodParams searchMethodParams (required)
     * - $searchMethodParams['requests'] => (array)  (required)
     * - $searchMethodParams['strategy'] => (array)
     *
     * @see \Algolia\AlgoliaSearch\Model\Search\SearchMethodParams
     *
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\SearchResponses
     */
    public function search($searchMethodParams, $requestOptions = [])
    {
        // verify the required parameter 'searchMethodParams' is set
        if ($searchMethodParams === null) {
            throw new \InvalidArgumentException(
                'Parameter `searchMethodParams` is required when calling `search`.'
            );
        }

        $resourcePath = '/1/indexes/*/queries';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        if (isset($searchMethodParams)) {
            $httpBody = $searchMethodParams;
        }

        return $this->sendRequest(
            'POST',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions,
            true
        );
    }

    /**
     * Search a dictionary entries.
     *
     * @param array $dictionaryName The dictionary to search in. (required)
     * @param array $searchDictionaryEntriesParams searchDictionaryEntriesParams (required)
     * - $searchDictionaryEntriesParams['query'] => (string) The text to search in the index. (required)
     * - $searchDictionaryEntriesParams['page'] => (int) Specify the page to retrieve.
     * - $searchDictionaryEntriesParams['hitsPerPage'] => (int) Set the number of hits per page.
     * - $searchDictionaryEntriesParams['language'] => (string) Language ISO code supported by the dictionary (e.g., \"en\" for English).
     *
     * @see \Algolia\AlgoliaSearch\Model\Search\SearchDictionaryEntriesParams
     *
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\UpdatedAtResponse
     */
    public function searchDictionaryEntries(
        $dictionaryName,
        $searchDictionaryEntriesParams,
        $requestOptions = []
    ) {
        // verify the required parameter 'dictionaryName' is set
        if ($dictionaryName === null) {
            throw new \InvalidArgumentException(
                'Parameter `dictionaryName` is required when calling `searchDictionaryEntries`.'
            );
        }
        // verify the required parameter 'searchDictionaryEntriesParams' is set
        if ($searchDictionaryEntriesParams === null) {
            throw new \InvalidArgumentException(
                'Parameter `searchDictionaryEntriesParams` is required when calling `searchDictionaryEntries`.'
            );
        }

        $resourcePath = '/1/dictionaries/{dictionaryName}/search';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        // path params
        if ($dictionaryName !== null) {
            $resourcePath = str_replace(
                '{dictionaryName}',
                ObjectSerializer::toPathValue($dictionaryName),
                $resourcePath
            );
        }

        if (isset($searchDictionaryEntriesParams)) {
            $httpBody = $searchDictionaryEntriesParams;
        }

        return $this->sendRequest(
            'POST',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions,
            true
        );
    }

    /**
     * Search for values of a given facet.
     *
     * @param string $indexName The index in which to perform the request. (required)
     * @param string $facetName The facet name. (required)
     * @param array $searchForFacetValuesRequest searchForFacetValuesRequest (optional)
     * - $searchForFacetValuesRequest['params'] => (string) Search parameters as URL-encoded query string.
     * - $searchForFacetValuesRequest['facetQuery'] => (string) Text to search inside the facet's values.
     * - $searchForFacetValuesRequest['maxFacetHits'] => (int) Maximum number of facet hits to return during a search for facet values. For performance reasons, the maximum allowed number of returned values is 100.
     *
     * @see \Algolia\AlgoliaSearch\Model\Search\SearchForFacetValuesRequest
     *
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\SearchForFacetValuesResponse
     */
    public function searchForFacetValues(
        $indexName,
        $facetName,
        $searchForFacetValuesRequest = null,
        $requestOptions = []
    ) {
        // verify the required parameter 'indexName' is set
        if ($indexName === null) {
            throw new \InvalidArgumentException(
                'Parameter `indexName` is required when calling `searchForFacetValues`.'
            );
        }
        // verify the required parameter 'facetName' is set
        if ($facetName === null) {
            throw new \InvalidArgumentException(
                'Parameter `facetName` is required when calling `searchForFacetValues`.'
            );
        }

        $resourcePath = '/1/indexes/{indexName}/facets/{facetName}/query';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        // path params
        if ($indexName !== null) {
            $resourcePath = str_replace(
                '{indexName}',
                ObjectSerializer::toPathValue($indexName),
                $resourcePath
            );
        }

        // path params
        if ($facetName !== null) {
            $resourcePath = str_replace(
                '{facetName}',
                ObjectSerializer::toPathValue($facetName),
                $resourcePath
            );
        }

        if (isset($searchForFacetValuesRequest)) {
            $httpBody = $searchForFacetValuesRequest;
        }

        return $this->sendRequest(
            'POST',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions,
            true
        );
    }

    /**
     * Search for rules.
     *
     * @param string $indexName The index in which to perform the request. (required)
     * @param array $searchRulesParams searchRulesParams (required)
     * - $searchRulesParams['query'] => (string) Full text query.
     * - $searchRulesParams['anchoring'] => (array)
     * - $searchRulesParams['context'] => (string) Restricts matches to contextual rules with a specific context (exact match).
     * - $searchRulesParams['page'] => (int) Requested page (zero-based).
     * - $searchRulesParams['hitsPerPage'] => (int) Maximum number of hits in a page. Minimum is 1, maximum is 1000.
     * - $searchRulesParams['enabled'] => (bool) When specified, restricts matches to rules with a specific enabled status. When absent (default), all rules are retrieved, regardless of their enabled status.
     * - $searchRulesParams['requestOptions'] => (array) A mapping of requestOptions to send along with the request.
     *
     * @see \Algolia\AlgoliaSearch\Model\Search\SearchRulesParams
     *
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\SearchRulesResponse
     */
    public function searchRules(
        $indexName,
        $searchRulesParams,
        $requestOptions = []
    ) {
        // verify the required parameter 'indexName' is set
        if ($indexName === null) {
            throw new \InvalidArgumentException(
                'Parameter `indexName` is required when calling `searchRules`.'
            );
        }
        // verify the required parameter 'searchRulesParams' is set
        if ($searchRulesParams === null) {
            throw new \InvalidArgumentException(
                'Parameter `searchRulesParams` is required when calling `searchRules`.'
            );
        }

        $resourcePath = '/1/indexes/{indexName}/rules/search';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        // path params
        if ($indexName !== null) {
            $resourcePath = str_replace(
                '{indexName}',
                ObjectSerializer::toPathValue($indexName),
                $resourcePath
            );
        }

        if (isset($searchRulesParams)) {
            $httpBody = $searchRulesParams;
        }

        return $this->sendRequest(
            'POST',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions,
            true
        );
    }

    /**
     * Search in a single index.
     *
     * @param string $indexName The index in which to perform the request. (required)
     * @param array $searchParams searchParams (required)
     *
     * @see \Algolia\AlgoliaSearch\Model\Search\SearchParams
     *
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\SearchResponse
     */
    public function searchSingleIndex(
        $indexName,
        $searchParams,
        $requestOptions = []
    ) {
        // verify the required parameter 'indexName' is set
        if ($indexName === null) {
            throw new \InvalidArgumentException(
                'Parameter `indexName` is required when calling `searchSingleIndex`.'
            );
        }
        // verify the required parameter 'searchParams' is set
        if ($searchParams === null) {
            throw new \InvalidArgumentException(
                'Parameter `searchParams` is required when calling `searchSingleIndex`.'
            );
        }

        $resourcePath = '/1/indexes/{indexName}/query';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        // path params
        if ($indexName !== null) {
            $resourcePath = str_replace(
                '{indexName}',
                ObjectSerializer::toPathValue($indexName),
                $resourcePath
            );
        }

        if (isset($searchParams)) {
            $httpBody = $searchParams;
        }

        return $this->sendRequest(
            'POST',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions,
            true
        );
    }

    /**
     * Search synonyms.
     *
     * @param string $indexName The index in which to perform the request. (required)
     * @param string $query Search for specific synonyms matching this string. (optional, default to '')
     * @param array $type Only search for specific types of synonyms. (optional)
     * @param int $page Requested page (zero-based). When specified, will retrieve a specific page; the page size is implicitly set to 100. When null, will retrieve all indices (no pagination). (optional, default to 0)
     * @param int $hitsPerPage Maximum number of objects to retrieve. (optional, default to 100)
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\SearchSynonymsResponse
     */
    public function searchSynonyms(
        $indexName,
        $query = null,
        $type = null,
        $page = null,
        $hitsPerPage = null,
        $requestOptions = []
    ) {
        // verify the required parameter 'indexName' is set
        if ($indexName === null) {
            throw new \InvalidArgumentException(
                'Parameter `indexName` is required when calling `searchSynonyms`.'
            );
        }

        $resourcePath = '/1/indexes/{indexName}/synonyms/search';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        if ($query !== null) {
            $queryParameters['query'] = $query;
        }

        if ($type !== null) {
            $queryParameters['type'] = $type;
        }

        if ($page !== null) {
            $queryParameters['page'] = $page;
        }

        if ($hitsPerPage !== null) {
            $queryParameters['hitsPerPage'] = $hitsPerPage;
        }

        // path params
        if ($indexName !== null) {
            $resourcePath = str_replace(
                '{indexName}',
                ObjectSerializer::toPathValue($indexName),
                $resourcePath
            );
        }

        return $this->sendRequest(
            'POST',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions,
            true
        );
    }

    /**
     * Search userID.
     *
     * @param array $searchUserIdsParams searchUserIdsParams (required)
     * - $searchUserIdsParams['query'] => (string) Query to search. The search is a prefix search with typoTolerance. Use empty query to retrieve all users. (required)
     * - $searchUserIdsParams['clusterName'] => (string) Name of the cluster.
     * - $searchUserIdsParams['page'] => (int) Specify the page to retrieve.
     * - $searchUserIdsParams['hitsPerPage'] => (int) Set the number of hits per page.
     *
     * @see \Algolia\AlgoliaSearch\Model\Search\SearchUserIdsParams
     *
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\SearchUserIdsResponse
     */
    public function searchUserIds($searchUserIdsParams, $requestOptions = [])
    {
        // verify the required parameter 'searchUserIdsParams' is set
        if ($searchUserIdsParams === null) {
            throw new \InvalidArgumentException(
                'Parameter `searchUserIdsParams` is required when calling `searchUserIds`.'
            );
        }

        $resourcePath = '/1/clusters/mapping/search';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        if (isset($searchUserIdsParams)) {
            $httpBody = $searchUserIdsParams;
        }

        return $this->sendRequest(
            'POST',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions,
            true
        );
    }

    /**
     * Set dictionaries settings.
     *
     * @param array $dictionarySettingsParams dictionarySettingsParams (required)
     * - $dictionarySettingsParams['disableStandardEntries'] => (array)  (required)
     *
     * @see \Algolia\AlgoliaSearch\Model\Search\DictionarySettingsParams
     *
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\UpdatedAtResponse
     */
    public function setDictionarySettings(
        $dictionarySettingsParams,
        $requestOptions = []
    ) {
        // verify the required parameter 'dictionarySettingsParams' is set
        if ($dictionarySettingsParams === null) {
            throw new \InvalidArgumentException(
                'Parameter `dictionarySettingsParams` is required when calling `setDictionarySettings`.'
            );
        }

        $resourcePath = '/1/dictionaries/*/settings';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        if (isset($dictionarySettingsParams)) {
            $httpBody = $dictionarySettingsParams;
        }

        return $this->sendRequest(
            'PUT',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * Update settings of an index.
     *
     * @param string $indexName The index in which to perform the request. (required)
     * @param array $indexSettings indexSettings (required)
     *
     * @see \Algolia\AlgoliaSearch\Model\Search\IndexSettings
     *
     * @param bool $forwardToReplicas When true, changes are also propagated to replicas of the given indexName. (optional)
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\UpdatedAtResponse
     */
    public function setSettings(
        $indexName,
        $indexSettings,
        $forwardToReplicas = null,
        $requestOptions = []
    ) {
        // verify the required parameter 'indexName' is set
        if ($indexName === null) {
            throw new \InvalidArgumentException(
                'Parameter `indexName` is required when calling `setSettings`.'
            );
        }
        // verify the required parameter 'indexSettings' is set
        if ($indexSettings === null) {
            throw new \InvalidArgumentException(
                'Parameter `indexSettings` is required when calling `setSettings`.'
            );
        }

        $resourcePath = '/1/indexes/{indexName}/settings';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        if ($forwardToReplicas !== null) {
            $queryParameters['forwardToReplicas'] = $forwardToReplicas;
        }

        // path params
        if ($indexName !== null) {
            $resourcePath = str_replace(
                '{indexName}',
                ObjectSerializer::toPathValue($indexName),
                $resourcePath
            );
        }

        if (isset($indexSettings)) {
            $httpBody = $indexSettings;
        }

        return $this->sendRequest(
            'PUT',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * Update an API key.
     *
     * @param string $key API Key string. (required)
     * @param array $apiKey apiKey (required)
     * - $apiKey['acl'] => (array) Set of permissions associated with the key. (required)
     * - $apiKey['description'] => (string) A comment used to identify a key more easily in the dashboard. It is not interpreted by the API.
     * - $apiKey['indexes'] => (array) Restrict this new API key to a list of indices or index patterns. If the list is empty, all indices are allowed.
     * - $apiKey['maxHitsPerQuery'] => (int) Maximum number of hits this API key can retrieve in one query. If zero, no limit is enforced.
     * - $apiKey['maxQueriesPerIPPerHour'] => (int) Maximum number of API calls per hour allowed from a given IP address or a user token.
     * - $apiKey['queryParameters'] => (string) URL-encoded query string. Force some query parameters to be applied for each query made with this API key.
     * - $apiKey['referers'] => (array) Restrict this new API key to specific referers. If empty or blank, defaults to all referers.
     * - $apiKey['validity'] => (int) Validity limit for this key in seconds. The key will automatically be removed after this period of time.
     *
     * @see \Algolia\AlgoliaSearch\Model\Search\ApiKey
     *
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     *
     * @return array<string, mixed>|\Algolia\AlgoliaSearch\Model\Search\UpdateApiKeyResponse
     */
    public function updateApiKey($key, $apiKey, $requestOptions = [])
    {
        // verify the required parameter 'key' is set
        if ($key === null) {
            throw new \InvalidArgumentException(
                'Parameter `key` is required when calling `updateApiKey`.'
            );
        }
        // verify the required parameter 'apiKey' is set
        if ($apiKey === null) {
            throw new \InvalidArgumentException(
                'Parameter `apiKey` is required when calling `updateApiKey`.'
            );
        }

        $resourcePath = '/1/keys/{key}';
        $queryParameters = [];
        $headers = [];
        $httpBody = [];

        // path params
        if ($key !== null) {
            $resourcePath = str_replace(
                '{key}',
                ObjectSerializer::toPathValue($key),
                $resourcePath
            );
        }

        if (isset($apiKey)) {
            $httpBody = $apiKey;
        }

        return $this->sendRequest(
            'PUT',
            $resourcePath,
            $headers,
            $queryParameters,
            $httpBody,
            $requestOptions
        );
    }

    /**
     * Wait for a task to complete with `indexName` and `taskID`.
     *
     * @param string $indexName Index name
     * @param int $taskId Task Id
     * @param array $requestOptions the requestOptions to send along with the query, they will be merged with the transporter requestOptions
     * @param int|null $maxRetries Maximum number of retries
     * @param int|null $timeout Timeout
     *
     * @throws ExceededRetriesException
     *
     * @return void
     */
    public function waitForTask(
        $indexName,
        $taskId,
        $requestOptions = [],
        $maxRetries = null,
        $timeout = null
    ) {
        if ($timeout === null) {
            $timeout = $this->config->getWaitTaskTimeBeforeRetry();
        }

        if ($maxRetries === null) {
            $maxRetries = $this->config->getDefaultMaxRetries();
        }

        Helpers::retryUntil(
            $this,
            'getTask',
            [$indexName, $taskId, $requestOptions],
            function ($res) {
                return 'published' === $res['status'];
            },
            $maxRetries,
            $timeout
        );
    }

    private function sendRequest(
        $method,
        $resourcePath,
        $headers,
        $queryParameters,
        $httpBody,
        $requestOptions,
        $useReadTransporter = false
    ) {
        if (!isset($requestOptions['headers'])) {
            $requestOptions['headers'] = [];
        }
        if (!isset($requestOptions['queryParameters'])) {
            $requestOptions['queryParameters'] = [];
        }

        $requestOptions['headers'] = array_merge(
            $headers,
            $requestOptions['headers']
        );
        $requestOptions['queryParameters'] = array_merge(
            $queryParameters,
            $requestOptions['queryParameters']
        );
        $query = \GuzzleHttp\Psr7\Query::build(
            $requestOptions['queryParameters']
        );

        return $this->api->sendRequest(
            $method,
            $resourcePath . ($query ? "?{$query}" : ''),
            $httpBody,
            $requestOptions,
            $useReadTransporter
        );
    }
}
