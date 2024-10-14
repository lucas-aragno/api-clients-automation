// Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT.

import type { UserHit } from './userHit';

/**
 * userIDs data.
 */
export type SearchUserIdsResponse = {
  /**
   * User objects that match the query.
   */
  hits: Array<UserHit>;

  /**
   * Number of results (hits).
   */
  nbHits: number;

  /**
   * Page of search results to retrieve.
   */
  page: number;

  /**
   * Maximum number of hits per page.  Algolia uses `page` and `hitsPerPage` to control how search results are displayed ([paginated](https://www.algolia.com/doc/guides/building-search-ui/ui-and-ux-patterns/pagination/js/)).  - `hitsPerPage`: sets the number of search results (_hits_) displayed per page. - `page`: specifies the page number of the search results you want to retrieve. Page numbering starts at 0, so the first page is `page=0`, the second is `page=1`, and so on.  For example, to display 10 results per page starting from the third page, set `hitsPerPage` to 10 and `page` to 2.
   */
  hitsPerPage: number;

  /**
   * Date and time when the object was updated, in RFC 3339 format.
   */
  updatedAt: string;
};
