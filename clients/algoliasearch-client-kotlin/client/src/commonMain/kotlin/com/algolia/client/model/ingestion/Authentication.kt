/** Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT. */
package com.algolia.client.model.ingestion

import kotlinx.serialization.*
import kotlinx.serialization.json.*

/**
 * Resource representing the information required to authenticate with a source or a destination.
 *
 * @param authenticationID Universally unique identifier (UUID) of an authentication resource.
 * @param type
 * @param name Descriptive name for the resource.
 * @param input
 * @param createdAt Date of creation in RFC 3339 format.
 * @param platform
 * @param owner Owner of the resource.
 * @param updatedAt Date of last update in RFC 3339 format.
 */
@Serializable
public data class Authentication(

  /** Universally unique identifier (UUID) of an authentication resource. */
  @SerialName(value = "authenticationID") val authenticationID: String,

  @SerialName(value = "type") val type: AuthenticationType,

  /** Descriptive name for the resource. */
  @SerialName(value = "name") val name: String,

  @SerialName(value = "input") val input: AuthInputPartial,

  /** Date of creation in RFC 3339 format. */
  @SerialName(value = "createdAt") val createdAt: String,

  @SerialName(value = "platform") val platform: Platform? = null,

  /** Owner of the resource. */
  @SerialName(value = "owner") val owner: String? = null,

  /** Date of last update in RFC 3339 format. */
  @SerialName(value = "updatedAt") val updatedAt: String? = null,
)
