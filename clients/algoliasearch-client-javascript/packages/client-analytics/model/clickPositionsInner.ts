// Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT.

/**
 * Click position.
 */
export type ClickPositionsInner = {
  /**
   * Range of positions in the search results, using the pattern `[start,end]`.  For positions 11 and up, click events are summed over the specified range. `-1` indicates the end of the list of search results.
   */
  position?: number[];

  /**
   * Number of times this search has been clicked at that position.
   */
  clickCount?: number;
};
