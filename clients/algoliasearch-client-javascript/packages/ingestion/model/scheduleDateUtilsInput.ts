// Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT.

import type { MappingInput } from './mappingInput';

/**
 * The input for a `schedule` task whose source is of type `bigquery` and for which extracted data spans a fixed number of days.
 */
export type ScheduleDateUtilsInput = {
  /**
   * The timeframe of the extraction, in number of days from today.
   */
  timeframe: number;

  mapping?: MappingInput;
};
