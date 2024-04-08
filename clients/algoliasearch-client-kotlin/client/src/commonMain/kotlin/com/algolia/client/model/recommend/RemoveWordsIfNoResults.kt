/** Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT. */
package com.algolia.client.model.recommend

import kotlinx.serialization.*

/**
 * Strategy for removing words from the query when it doesn't return any results. This helps to avoid returning empty search results.  - `none`.   No words are removed when a query doesn't return results.  - `lastWords`.   Treat the last (then second to last, then third to last) word as optional,   until there are results or at most 5 words have been removed.  - `firstWords`.   Treat the first (then second, then third) word as optional,   until there are results or at most 5 words have been removed.  - `allOptional`.   Treat all words as optional.  For more information, see [Remove words to improve results](https://www.algolia.com/doc/guides/managing-results/optimize-search-results/empty-or-insufficient-results/in-depth/why-use-remove-words-if-no-results/).
 */
@Serializable
public enum class RemoveWordsIfNoResults(public val value: kotlin.String) {

  @SerialName(value = "none")
  None("none"),

  @SerialName(value = "lastWords")
  LastWords("lastWords"),

  @SerialName(value = "firstWords")
  FirstWords("firstWords"),

  @SerialName(value = "allOptional")
  AllOptional("allOptional");

  override fun toString(): kotlin.String = value
}
