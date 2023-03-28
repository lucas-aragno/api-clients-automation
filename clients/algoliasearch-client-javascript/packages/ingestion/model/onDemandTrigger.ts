// Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT.

import type { OnDemandTriggerType } from './onDemandTriggerType';

/**
 * The trigger information of a task of type `onDemand`.
 */
export type OnDemandTrigger = {
  type: OnDemandTriggerType;

  /**
   * The last time the scheduled task ran (RFC3339 format).
   */
  lastRun?: string;
};
