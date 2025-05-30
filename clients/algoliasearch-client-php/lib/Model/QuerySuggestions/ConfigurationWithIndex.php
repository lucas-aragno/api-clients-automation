<?php

// Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT.

namespace Algolia\AlgoliaSearch\Model\QuerySuggestions;

use Algolia\AlgoliaSearch\Model\AbstractModel;
use Algolia\AlgoliaSearch\Model\ModelInterface;

/**
 * ConfigurationWithIndex Class Doc Comment.
 *
 * @category Class
 *
 * @description Query Suggestions configuration.
 */
class ConfigurationWithIndex extends AbstractModel implements ModelInterface, \ArrayAccess, \JsonSerializable
{
    /**
     * Array of property to type mappings. Used for (de)serialization.
     *
     * @var string[]
     */
    protected static $modelTypes = [
        'sourceIndices' => '\Algolia\AlgoliaSearch\Model\QuerySuggestions\SourceIndex[]',
        'languages' => '\Algolia\AlgoliaSearch\Model\QuerySuggestions\Languages',
        'exclude' => 'string[]',
        'enablePersonalization' => 'bool',
        'allowSpecialCharacters' => 'bool',
        'indexName' => 'string',
    ];

    /**
     * Array of property to format mappings. Used for (de)serialization.
     *
     * @var string[]
     */
    protected static $modelFormats = [
        'sourceIndices' => null,
        'languages' => null,
        'exclude' => null,
        'enablePersonalization' => null,
        'allowSpecialCharacters' => null,
        'indexName' => null,
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name.
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'sourceIndices' => 'sourceIndices',
        'languages' => 'languages',
        'exclude' => 'exclude',
        'enablePersonalization' => 'enablePersonalization',
        'allowSpecialCharacters' => 'allowSpecialCharacters',
        'indexName' => 'indexName',
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses).
     *
     * @var string[]
     */
    protected static $setters = [
        'sourceIndices' => 'setSourceIndices',
        'languages' => 'setLanguages',
        'exclude' => 'setExclude',
        'enablePersonalization' => 'setEnablePersonalization',
        'allowSpecialCharacters' => 'setAllowSpecialCharacters',
        'indexName' => 'setIndexName',
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests).
     *
     * @var string[]
     */
    protected static $getters = [
        'sourceIndices' => 'getSourceIndices',
        'languages' => 'getLanguages',
        'exclude' => 'getExclude',
        'enablePersonalization' => 'getEnablePersonalization',
        'allowSpecialCharacters' => 'getAllowSpecialCharacters',
        'indexName' => 'getIndexName',
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
        if (isset($data['sourceIndices'])) {
            $this->container['sourceIndices'] = $data['sourceIndices'];
        }
        if (isset($data['languages'])) {
            $this->container['languages'] = $data['languages'];
        }
        if (isset($data['exclude'])) {
            $this->container['exclude'] = $data['exclude'];
        }
        if (isset($data['enablePersonalization'])) {
            $this->container['enablePersonalization'] = $data['enablePersonalization'];
        }
        if (isset($data['allowSpecialCharacters'])) {
            $this->container['allowSpecialCharacters'] = $data['allowSpecialCharacters'];
        }
        if (isset($data['indexName'])) {
            $this->container['indexName'] = $data['indexName'];
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
        $invalidProperties = [];

        if (!isset($this->container['sourceIndices']) || null === $this->container['sourceIndices']) {
            $invalidProperties[] = "'sourceIndices' can't be null";
        }
        if (!isset($this->container['indexName']) || null === $this->container['indexName']) {
            $invalidProperties[] = "'indexName' can't be null";
        }

        return $invalidProperties;
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
     * Gets sourceIndices.
     *
     * @return SourceIndex[]
     */
    public function getSourceIndices()
    {
        return $this->container['sourceIndices'] ?? null;
    }

    /**
     * Sets sourceIndices.
     *
     * @param SourceIndex[] $sourceIndices algolia indices from which to get the popular searches for query suggestions
     *
     * @return self
     */
    public function setSourceIndices($sourceIndices)
    {
        $this->container['sourceIndices'] = $sourceIndices;

        return $this;
    }

    /**
     * Gets languages.
     *
     * @return null|Languages
     */
    public function getLanguages()
    {
        return $this->container['languages'] ?? null;
    }

    /**
     * Sets languages.
     *
     * @param null|Languages $languages languages
     *
     * @return self
     */
    public function setLanguages($languages)
    {
        $this->container['languages'] = $languages;

        return $this;
    }

    /**
     * Gets exclude.
     *
     * @return null|string[]
     */
    public function getExclude()
    {
        return $this->container['exclude'] ?? null;
    }

    /**
     * Sets exclude.
     *
     * @param null|string[] $exclude exclude
     *
     * @return self
     */
    public function setExclude($exclude)
    {
        $this->container['exclude'] = $exclude;

        return $this;
    }

    /**
     * Gets enablePersonalization.
     *
     * @return null|bool
     */
    public function getEnablePersonalization()
    {
        return $this->container['enablePersonalization'] ?? null;
    }

    /**
     * Sets enablePersonalization.
     *
     * @param null|bool $enablePersonalization whether to turn on personalized query suggestions
     *
     * @return self
     */
    public function setEnablePersonalization($enablePersonalization)
    {
        $this->container['enablePersonalization'] = $enablePersonalization;

        return $this;
    }

    /**
     * Gets allowSpecialCharacters.
     *
     * @return null|bool
     */
    public function getAllowSpecialCharacters()
    {
        return $this->container['allowSpecialCharacters'] ?? null;
    }

    /**
     * Sets allowSpecialCharacters.
     *
     * @param null|bool $allowSpecialCharacters whether to include suggestions with special characters
     *
     * @return self
     */
    public function setAllowSpecialCharacters($allowSpecialCharacters)
    {
        $this->container['allowSpecialCharacters'] = $allowSpecialCharacters;

        return $this;
    }

    /**
     * Gets indexName.
     *
     * @return string
     */
    public function getIndexName()
    {
        return $this->container['indexName'] ?? null;
    }

    /**
     * Sets indexName.
     *
     * @param string $indexName name of the Query Suggestions index (case-sensitive)
     *
     * @return self
     */
    public function setIndexName($indexName)
    {
        $this->container['indexName'] = $indexName;

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
