/** Ingestion API The Ingestion API lets you connect third-party services and platforms with Algolia and schedule tasks
  * to ingest your data. The Ingestion API powers the no-code [data
  * connectors](https://dashboard.algolia.com/connectors). ## Base URLs The base URLs for requests to the Ingestion API
  * are: - `https://data.us.algolia.com` - `https://data.eu.algolia.com` Use the URL that matches your [analytics
  * region](https://dashboard.algolia.com/account/infrastructure/analytics). **All requests must use HTTPS.** ##
  * Authentication To authenticate your API requests, add these headers: - `x-algolia-application-id`. Your Algolia
  * application ID. - `x-algolia-api-key`. An API key with the necessary permissions to make the request. The required
  * access control list (ACL) to make a request is listed in each endpoint's reference. You can find your application ID
  * and API key in the [Algolia dashboard](https://dashboard.algolia.com/account). ## Request format Request bodies must
  * be JSON objects. ## Response status and errors Response bodies are JSON objects. Successful responses return a `2xx`
  * status. Client errors return a `4xx` status. Server errors are indicated by a `5xx` status. Error responses have a
  * `message` property with more information. ## Version The current version of the Ingestion API is version 1, as
  * indicated by the `/1/` in each endpoint's URL.
  *
  * The version of the OpenAPI document: 1.0.0
  *
  * NOTE: This class is auto generated by OpenAPI Generator (https://openapi-generator.tech).
  * https://openapi-generator.tech Do not edit the class manually.
  */
package algoliasearch.ingestion

/** Paginated API response.
  *
  * @param nbPages
  *   Number of pages in the API response.
  * @param page
  *   Page of the API response to retrieve.
  * @param nbItems
  *   Number of items in the API response.
  * @param itemsPerPage
  *   Number of items per page.
  */
case class Pagination(
    nbPages: Int,
    page: Int,
    nbItems: Int,
    itemsPerPage: Int
)
