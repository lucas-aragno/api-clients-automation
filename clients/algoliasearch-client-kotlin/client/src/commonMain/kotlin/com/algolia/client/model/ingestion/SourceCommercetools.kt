/** Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT. */
package com.algolia.client.model.ingestion

import kotlinx.serialization.*
import kotlinx.serialization.json.*

/**
 * SourceCommercetools
 *
 * @param url
 * @param projectKey
 * @param storeKeys
 * @param locales Array of locales that must match the following pattern: ^[a-z]{2}(-[A-Z]{2})?$. For example [\"fr-FR\", \"en\"].
 * @param fallbackIsInStockValue Determines the value that will be stored in the Algolia record if there's no inventory information on the product.
 * @param customFields
 */
@Serializable
public data class SourceCommercetools(

  @SerialName(value = "url") val url: String,

  @SerialName(value = "projectKey") val projectKey: String,

  @SerialName(value = "storeKeys") val storeKeys: List<String>? = null,

  /** Array of locales that must match the following pattern: ^[a-z]{2}(-[A-Z]{2})?$. For example [\"fr-FR\", \"en\"].  */
  @SerialName(value = "locales") val locales: List<String>? = null,

  /** Determines the value that will be stored in the Algolia record if there's no inventory information on the product.  */
  @SerialName(value = "fallbackIsInStockValue") val fallbackIsInStockValue: Boolean? = null,

  @SerialName(value = "customFields") val customFields: CommercetoolsCustomFields? = null,
) : SourceInput
