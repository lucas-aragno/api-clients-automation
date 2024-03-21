/** Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT. */
package com.algolia.client.model.analytics

import kotlinx.serialization.*
import kotlinx.serialization.json.*

/**
 * GetUsersCountResponse
 *
 * @param count Number of unique users.
 * @param dates Daily number of unique users.
 */
@Serializable
public data class GetUsersCountResponse(

  /** Number of unique users. */
  @SerialName(value = "count") val count: Int,

  /** Daily number of unique users. */
  @SerialName(value = "dates") val dates: List<DailyUsers>,
)
