<?php

namespace Algolia\AlgoliaSearch\Configuration;

use Algolia\AlgoliaSearch\Exceptions\AlgoliaException;

/**
 * Configuration Class Doc Comment
 * PHP version 7.3
 *
 * @category Class
 * @package  Algolia\AlgoliaSearch
 */
abstract class Configuration
{
    /**
     * Associate array to store auth(s)
     *
     * @var string[]
     */
    protected $auths = [];

    /**
     * Access token for OAuth/Bearer authentication
     *
     * @var string
     */
    protected $accessToken = '';

    /**
     * User agent of the HTTP request (by default it is autogenerated)
     *
     * @var string
     */
    protected $algoliaAgent = null;

    /**
     * Debug switch (default set to false)
     *
     * @var bool
     */
    protected $debug = false;

    /**
     * Debug file location (log to STDOUT by default)
     *
     * @var string
     */
    protected $debugFile = 'php://output';

    protected $config;

    protected $defaultReadTimeout = 5;

    protected $defaultWriteTimeout = 30;

    protected $defaultConnectTimeout = 2;

    protected $clientName;

    public function __construct(array $config = [])
    {
        if (!isset($config['appId']) || $config['appId'] === '') {
            throw new AlgoliaException('`appId` is missing.');
        }

        if (!isset($config['apiKey']) || $config['apiKey'] === '') {
            throw new AlgoliaException('`apiKey` is missing.');
        }

        $this->setAlgoliaApiKey($config['apiKey']);
        $this->setAuth('x-algolia-api-key', $config['apiKey']);

        $this->setAppId($config['appId']);
        $this->setAuth('x-algolia-application-id', $config['appId']);

        $config += $this->getDefaultConfiguration();
        $this->config = $config;
    }

    public static function create($appId, $apiKey)
    {
        $config = [
            'appId' => $appId,
            'apiKey' => $apiKey,
        ];

        return new static($config);
    }

    /**
     * Sets Auth
     *
     * @param string $authIdentifier API key identifier (authentication scheme)
     * @param string $key            API key or token
     *
     * @return $this
     */
    public function setAuth($authIdentifier, $key)
    {
        $this->auths[$authIdentifier] = $key;

        return $this;
    }

    /**
     * Gets Auth
     *
     * @param string $authIdentifier Auth identifier (authentication scheme)
     *
     * @return null|string API key or token
     */
    public function getAuth($authIdentifier)
    {
        return isset($this->auths[$authIdentifier])
            ? $this->auths[$authIdentifier]
            : null;
    }

    /**
     * Sets debug flag
     *
     * @param bool $debug Debug flag
     *
     * @return $this
     */
    public function setDebug($debug)
    {
        $this->debug = $debug;

        return $this;
    }

    /**
     * Gets the debug flag
     *
     * @return bool
     */
    public function getDebug()
    {
        return $this->debug;
    }

    /**
     * Sets the debug file
     *
     * @param string $debugFile Debug file
     *
     * @return $this
     */
    public function setDebugFile($debugFile)
    {
        $this->debugFile = $debugFile;

        return $this;
    }

    /**
     * Gets the debug file
     *
     * @return string
     */
    public function getDebugFile()
    {
        return $this->debugFile;
    }

    public function getDefaultConfiguration()
    {
        return [
            'appId' => '',
            'apiKey' => '',
            'hosts' => null,
            'readTimeout' => $this->defaultReadTimeout,
            'writeTimeout' => $this->defaultWriteTimeout,
            'connectTimeout' => $this->defaultConnectTimeout,
            'defaultHeaders' => [],
        ];
    }

    public function getAppId()
    {
        return $this->config['appId'];
    }

    public function setAppId($appId)
    {
        $this->config['appId'] = $appId;

        return $this;
    }

    public function getAlgoliaApiKey()
    {
        return $this->config['apiKey'];
    }

    public function setAlgoliaApiKey($apiKey)
    {
        $this->config['apiKey'] = $apiKey;

        return $this;
    }

    public function getHosts()
    {
        return $this->config['hosts'];
    }

    public function setHosts($hosts)
    {
        $this->config['hosts'] = $hosts;

        return $this;
    }

    public function getReadTimeout()
    {
        return $this->config['readTimeout'];
    }

    public function setReadTimeout($readTimeout)
    {
        $this->config['readTimeout'] = $readTimeout;

        return $this;
    }

    public function getWriteTimeout()
    {
        return $this->config['writeTimeout'];
    }

    public function setWriteTimeout($writeTimeout)
    {
        $this->config['writeTimeout'] = $writeTimeout;

        return $this;
    }

    public function getConnectTimeout()
    {
        return $this->config['connectTimeout'];
    }

    public function setConnectTimeout($connectTimeout)
    {
        $this->config['connectTimeout'] = $connectTimeout;

        return $this;
    }

    public function getDefaultHeaders()
    {
        return $this->config['defaultHeaders'];
    }

    public function setDefaultHeaders(array $defaultHeaders)
    {
        $this->config['defaultHeaders'] = $defaultHeaders;

        return $this;
    }

    /**
     * Sets the user agent of the api client
     *
     * @param string $algoliaAgent the user agent of the api client
     *
     * @throws \InvalidArgumentException
     *
     * @return $this
     */
    public function setAlgoliaAgent($algoliaAgent)
    {
        if (!is_string($algoliaAgent)) {
            throw new \InvalidArgumentException('User-agent must be a string.');
        }

        $this->algoliaAgent = $algoliaAgent;

        return $this;
    }

    /**
     * Gets the user agent of the api client
     *
     * @return string user agent
     */
    public function getAlgoliaAgent()
    {
        return $this->algoliaAgent;
    }

    /**
     * Gets the name of the client which the config belongs to
     *
     * @return string client name
     */
    public function getClientName()
    {
        return $this->clientName;
    }
}
