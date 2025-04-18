/** Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT. */
package com.algolia.client.model.composition

import kotlinx.serialization.*
import kotlinx.serialization.json.*

/**
 * Whether certain properties of the search response are calculated exhaustive (exact) or approximated.
 *
 * @param facetsCount Whether the facet count is exhaustive (`true`) or approximate (`false`). See the [related discussion](https://support.algolia.com/hc/en-us/articles/4406975248145-Why-are-my-facet-and-hit-counts-not-accurate-).
 * @param facetValues The value is `false` if not all facet values are retrieved.
 * @param nbHits Whether the `nbHits` is exhaustive (`true`) or approximate (`false`). When the query takes more than 50ms to be processed, the engine makes an approximation. This can happen when using complex filters on millions of records, when typo-tolerance was not exhaustive, or when enough hits have been retrieved (for example, after the engine finds 10,000 exact matches). `nbHits` is reported as non-exhaustive whenever an approximation is made, even if the approximation didn’t, in the end, impact the exhaustivity of the query.
 * @param rulesMatch Rules matching exhaustivity. The value is `false` if rules were enable for this query, and could not be fully processed due a timeout. This is generally caused by the number of alternatives (such as typos) which is too large.
 * @param typo Whether the typo search was exhaustive (`true`) or approximate (`false`). An approximation is done when the typo search query part takes more than 10% of the query budget (ie. 5ms by default) to be processed (this can happen when a lot of typo alternatives exist for the query). This field will not be included when typo-tolerance is entirely disabled.
 */
@Serializable
public data class Exhaustive(

  /** Whether the facet count is exhaustive (`true`) or approximate (`false`). See the [related discussion](https://support.algolia.com/hc/en-us/articles/4406975248145-Why-are-my-facet-and-hit-counts-not-accurate-). */
  @SerialName(value = "facetsCount") val facetsCount: Boolean? = null,

  /** The value is `false` if not all facet values are retrieved. */
  @SerialName(value = "facetValues") val facetValues: Boolean? = null,

  /** Whether the `nbHits` is exhaustive (`true`) or approximate (`false`). When the query takes more than 50ms to be processed, the engine makes an approximation. This can happen when using complex filters on millions of records, when typo-tolerance was not exhaustive, or when enough hits have been retrieved (for example, after the engine finds 10,000 exact matches). `nbHits` is reported as non-exhaustive whenever an approximation is made, even if the approximation didn’t, in the end, impact the exhaustivity of the query. */
  @SerialName(value = "nbHits") val nbHits: Boolean? = null,

  /** Rules matching exhaustivity. The value is `false` if rules were enable for this query, and could not be fully processed due a timeout. This is generally caused by the number of alternatives (such as typos) which is too large. */
  @SerialName(value = "rulesMatch") val rulesMatch: Boolean? = null,

  /** Whether the typo search was exhaustive (`true`) or approximate (`false`). An approximation is done when the typo search query part takes more than 10% of the query budget (ie. 5ms by default) to be processed (this can happen when a lot of typo alternatives exist for the query). This field will not be included when typo-tolerance is entirely disabled. */
  @SerialName(value = "typo") val typo: Boolean? = null,
)
