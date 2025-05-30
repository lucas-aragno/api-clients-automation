<?php

// Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT.

namespace Algolia\AlgoliaSearch\Model\Recommend;

use Algolia\AlgoliaSearch\Model\AbstractModel;
use Algolia\AlgoliaSearch\Model\ModelInterface;

/**
 * SearchRecommendRulesParams Class Doc Comment.
 *
 * @category Class
 *
 * @description Recommend rules parameters.
 */
class SearchRecommendRulesParams extends AbstractModel implements ModelInterface, \ArrayAccess, \JsonSerializable
{
    /**
     * Array of property to type mappings. Used for (de)serialization.
     *
     * @var string[]
     */
    protected static $modelTypes = [
        'query' => 'string',
        'context' => 'string',
        'page' => 'int',
        'hitsPerPage' => 'int',
        'enabled' => 'bool',
        'filters' => 'string',
        'facets' => 'string[]',
        'maxValuesPerFacet' => 'int',
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization.
     *
     * @var string[]
     */
    protected static $modelFormats = [
        'query' => null,
        'context' => null,
        'page' => null,
        'hitsPerPage' => null,
        'enabled' => null,
        'filters' => null,
        'facets' => null,
        'maxValuesPerFacet' => null,
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name.
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'query' => 'query',
        'context' => 'context',
        'page' => 'page',
        'hitsPerPage' => 'hitsPerPage',
        'enabled' => 'enabled',
        'filters' => 'filters',
        'facets' => 'facets',
        'maxValuesPerFacet' => 'maxValuesPerFacet',
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses).
     *
     * @var string[]
     */
    protected static $setters = [
        'query' => 'setQuery',
        'context' => 'setContext',
        'page' => 'setPage',
        'hitsPerPage' => 'setHitsPerPage',
        'enabled' => 'setEnabled',
        'filters' => 'setFilters',
        'facets' => 'setFacets',
        'maxValuesPerFacet' => 'setMaxValuesPerFacet',
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests).
     *
     * @var string[]
     */
    protected static $getters = [
        'query' => 'getQuery',
        'context' => 'getContext',
        'page' => 'getPage',
        'hitsPerPage' => 'getHitsPerPage',
        'enabled' => 'getEnabled',
        'filters' => 'getFilters',
        'facets' => 'getFacets',
        'maxValuesPerFacet' => 'getMaxValuesPerFacet',
    ];

    /**
     * Associative array for storing property values.
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor.
     *
     * @param mixed[] $data Associated array of property values
     */
    public function __construct(?array $data = null)
    {
        if (isset($data['query'])) {
            $this->container['query'] = $data['query'];
        }
        if (isset($data['context'])) {
            $this->container['context'] = $data['context'];
        }
        if (isset($data['page'])) {
            $this->container['page'] = $data['page'];
        }
        if (isset($data['hitsPerPage'])) {
            $this->container['hitsPerPage'] = $data['hitsPerPage'];
        }
        if (isset($data['enabled'])) {
            $this->container['enabled'] = $data['enabled'];
        }
        if (isset($data['filters'])) {
            $this->container['filters'] = $data['filters'];
        }
        if (isset($data['facets'])) {
            $this->container['facets'] = $data['facets'];
        }
        if (isset($data['maxValuesPerFacet'])) {
            $this->container['maxValuesPerFacet'] = $data['maxValuesPerFacet'];
        }
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name.
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of property to type mappings. Used for (de)serialization.
     *
     * @return array
     */
    public static function modelTypes()
    {
        return self::$modelTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization.
     *
     * @return array
     */
    public static function modelFormats()
    {
        return self::$modelFormats;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses).
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests).
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        return [];
    }

    /**
     * Validate all the properties in the model
     * return true if all passed.
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return 0 === count($this->listInvalidProperties());
    }

    /**
     * Gets query.
     *
     * @return null|string
     */
    public function getQuery()
    {
        return $this->container['query'] ?? null;
    }

    /**
     * Sets query.
     *
     * @param null|string $query search query
     *
     * @return self
     */
    public function setQuery($query)
    {
        $this->container['query'] = $query;

        return $this;
    }

    /**
     * Gets context.
     *
     * @return null|string
     */
    public function getContext()
    {
        return $this->container['context'] ?? null;
    }

    /**
     * Sets context.
     *
     * @param null|string $context only search for rules with matching context
     *
     * @return self
     */
    public function setContext($context)
    {
        $this->container['context'] = $context;

        return $this;
    }

    /**
     * Gets page.
     *
     * @return null|int
     */
    public function getPage()
    {
        return $this->container['page'] ?? null;
    }

    /**
     * Sets page.
     *
     * @param null|int $page Requested page of the API response.  Algolia uses `page` and `hitsPerPage` to control how search results are displayed ([paginated](https://www.algolia.com/doc/guides/building-search-ui/ui-and-ux-patterns/pagination/js/)).  - `hitsPerPage`: sets the number of search results (_hits_) displayed per page. - `page`: specifies the page number of the search results you want to retrieve. Page numbering starts at 0, so the first page is `page=0`, the second is `page=1`, and so on.  For example, to display 10 results per page starting from the third page, set `hitsPerPage` to 10 and `page` to 2.
     *
     * @return self
     */
    public function setPage($page)
    {
        $this->container['page'] = $page;

        return $this;
    }

    /**
     * Gets hitsPerPage.
     *
     * @return null|int
     */
    public function getHitsPerPage()
    {
        return $this->container['hitsPerPage'] ?? null;
    }

    /**
     * Sets hitsPerPage.
     *
     * @param null|int $hitsPerPage Maximum number of hits per page.  Algolia uses `page` and `hitsPerPage` to control how search results are displayed ([paginated](https://www.algolia.com/doc/guides/building-search-ui/ui-and-ux-patterns/pagination/js/)).  - `hitsPerPage`: sets the number of search results (_hits_) displayed per page. - `page`: specifies the page number of the search results you want to retrieve. Page numbering starts at 0, so the first page is `page=0`, the second is `page=1`, and so on.  For example, to display 10 results per page starting from the third page, set `hitsPerPage` to 10 and `page` to 2.
     *
     * @return self
     */
    public function setHitsPerPage($hitsPerPage)
    {
        $this->container['hitsPerPage'] = $hitsPerPage;

        return $this;
    }

    /**
     * Gets enabled.
     *
     * @return null|bool
     */
    public function getEnabled()
    {
        return $this->container['enabled'] ?? null;
    }

    /**
     * Sets enabled.
     *
     * @param null|bool $enabled Whether to only show rules where the value of their `enabled` property matches this parameter. If absent, show all rules, regardless of their `enabled` property.
     *
     * @return self
     */
    public function setEnabled($enabled)
    {
        $this->container['enabled'] = $enabled;

        return $this;
    }

    /**
     * Gets filters.
     *
     * @return null|string
     */
    public function getFilters()
    {
        return $this->container['filters'] ?? null;
    }

    /**
     * Sets filters.
     *
     * @param null|string $filters Filter expression. This only searches for rules matching the filter expression.
     *
     * @return self
     */
    public function setFilters($filters)
    {
        $this->container['filters'] = $filters;

        return $this;
    }

    /**
     * Gets facets.
     *
     * @return null|string[]
     */
    public function getFacets()
    {
        return $this->container['facets'] ?? null;
    }

    /**
     * Sets facets.
     *
     * @param null|string[] $facets Include facets and facet values in the response. Use `['*']` to include all facets.
     *
     * @return self
     */
    public function setFacets($facets)
    {
        $this->container['facets'] = $facets;

        return $this;
    }

    /**
     * Gets maxValuesPerFacet.
     *
     * @return null|int
     */
    public function getMaxValuesPerFacet()
    {
        return $this->container['maxValuesPerFacet'] ?? null;
    }

    /**
     * Sets maxValuesPerFacet.
     *
     * @param null|int $maxValuesPerFacet maximum number of values to return for each facet
     *
     * @return self
     */
    public function setMaxValuesPerFacet($maxValuesPerFacet)
    {
        $this->container['maxValuesPerFacet'] = $maxValuesPerFacet;

        return $this;
    }

    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param int $offset Offset
     */
    public function offsetExists($offset): bool
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param int $offset Offset
     *
     * @return null|mixed
     */
    public function offsetGet($offset): mixed
    {
        return $this->container[$offset] ?? null;
    }

    /**
     * Sets value based on offset.
     *
     * @param null|int $offset Offset
     * @param mixed    $value  Value to be set
     */
    public function offsetSet($offset, $value): void
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param int $offset Offset
     */
    public function offsetUnset($offset): void
    {
        unset($this->container[$offset]);
    }
}
