/** Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT. */
package com.algolia.client.model.ingestion

import kotlinx.serialization.*

/**
 * Task trigger, describing when a task should run.  - `onDemand`.   Manually trigger the task with the `/run` endpoint.  - `schedule`.   Regularly trigger the task on a `cron` schedule.  - `subscription`.   Trigger the task after an event is received, such as, a webhook.  - `streaming`.   Run the task continuously.
 */
@Serializable
public enum class TriggerType(public val value: kotlin.String) {

  @SerialName(value = "onDemand")
  OnDemand("onDemand"),

  @SerialName(value = "schedule")
  Schedule("schedule"),

  @SerialName(value = "subscription")
  Subscription("subscription"),

  @SerialName(value = "streaming")
  Streaming("streaming");

  override fun toString(): kotlin.String = value
}
