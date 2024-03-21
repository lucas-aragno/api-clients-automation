/** Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT. */
package com.algolia.client.model.analytics

import kotlinx.serialization.*
import kotlinx.serialization.json.*

/**
 * DailyRevenue
 *
 * @param currencies Revenue associated with this search, broken-down by currencies.
 * @param date Date in the format YYYY-MM-DD.
 */
@Serializable
public data class DailyRevenue(

  /** Revenue associated with this search, broken-down by currencies. */
  @SerialName(value = "currencies") val currencies: Map<kotlin.String, CurrenciesValue>,

  /** Date in the format YYYY-MM-DD. */
  @SerialName(value = "date") val date: String,
)
