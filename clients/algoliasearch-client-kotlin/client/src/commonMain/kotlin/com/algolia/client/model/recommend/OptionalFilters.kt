/** Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT. */
package com.algolia.client.model.recommend

import com.algolia.client.exception.AlgoliaClientException
import com.algolia.client.extensions.internal.*
import kotlinx.serialization.*
import kotlinx.serialization.builtins.*
import kotlinx.serialization.descriptors.*
import kotlinx.serialization.encoding.*
import kotlinx.serialization.json.*
import kotlin.jvm.JvmInline

/**
 * Filters to promote or demote records in the search results.  Optional filters work like facet filters, but they don't exclude records from the search results. Records that match the optional filter rank before records that don't match. If you're using a negative filter `facet:-value`, matching records rank after records that don't match.  - Optional filters don't work on virtual replicas. - Optional filters are applied _after_ sort-by attributes. - Optional filters are applied _before_ custom ranking attributes (in the default [ranking](https://www.algolia.com/doc/guides/managing-results/relevance-overview/in-depth/ranking-criteria/)). - Optional filters don't work with numeric attributes.
 *
 * Implementations:
 * - [List<OptionalFilters>] - *[OptionalFilters.of]*
 * - [String] - *[OptionalFilters.of]*
 */
@Serializable(OptionalFiltersSerializer::class)
public sealed interface OptionalFilters {
  @Serializable
  @JvmInline
  public value class ListOfOptionalFiltersValue(public val value: List<OptionalFilters>) : OptionalFilters

  @Serializable
  @JvmInline
  public value class StringValue(public val value: String) : OptionalFilters

  public companion object {

    public fun of(value: List<OptionalFilters>): OptionalFilters = ListOfOptionalFiltersValue(value)

    public fun of(value: String): OptionalFilters = StringValue(value)
  }
}

internal class OptionalFiltersSerializer : JsonContentPolymorphicSerializer<OptionalFilters>(OptionalFilters::class) {
  override fun selectDeserializer(element: JsonElement): DeserializationStrategy<OptionalFilters> = when {
    element is JsonArray -> OptionalFilters.ListOfOptionalFiltersValue.serializer()
    element.isString -> OptionalFilters.StringValue.serializer()
    else -> throw AlgoliaClientException("Failed to deserialize json element: $element")
  }
}
