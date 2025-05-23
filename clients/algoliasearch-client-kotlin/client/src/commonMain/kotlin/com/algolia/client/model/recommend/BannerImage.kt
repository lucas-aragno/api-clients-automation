/** Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT. */
package com.algolia.client.model.recommend

import kotlinx.serialization.*
import kotlinx.serialization.json.*

/**
 * Image to show inside a banner.
 *
 * @param urls
 * @param title
 */
@Serializable
public data class BannerImage(

  @SerialName(value = "urls") val urls: List<BannerImageUrl>? = null,

  @SerialName(value = "title") val title: String? = null,
)
