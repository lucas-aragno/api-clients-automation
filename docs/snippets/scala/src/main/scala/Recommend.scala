// Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT.
package algoliasearch.methods.snippets

import scala.concurrent.duration.Duration

// >IMPORT
import algoliasearch.api.RecommendClient
import algoliasearch.config.*

// IMPORT<
import algoliasearch.recommend.*

import org.json4s.*
import org.json4s.native.JsonParser.*
import scala.concurrent.{Await, ExecutionContextExecutor}

class SnippetRecommendClient {
  implicit val ec: ExecutionContextExecutor = scala.concurrent.ExecutionContext.global
  implicit val formats: Formats = JsonSupport.format

  /** Snippet for the batchRecommendRules method.
    *
    * batch recommend rules
    */
  def snippetForRecommendClientBatchRecommendRules(): Unit = {
    // >SEPARATOR batchRecommendRules default
    // Initialize the client
    val client = RecommendClient(appId = "ALGOLIA_APPLICATION_ID", apiKey = "ALGOLIA_API_KEY")

    // Call the API
    val response = Await.result(
      client.batchRecommendRules(
        indexName = "<YOUR_INDEX_NAME>",
        model = RecommendModels.withName("related-products")
      ),
      Duration(100, "sec")
    )
    // >LOG
    // SEPARATOR<
  }

  /** Snippet for the customDelete method.
    *
    * allow del method for a custom path with minimal parameters
    */
  def snippetForRecommendClientCustomDelete(): Unit = {
    // >SEPARATOR customDelete allow del method for a custom path with minimal parameters
    // Initialize the client
    val client = RecommendClient(appId = "ALGOLIA_APPLICATION_ID", apiKey = "ALGOLIA_API_KEY")

    // Call the API
    val response = Await.result(
      client.customDelete[JObject](
        path = "test/minimal"
      ),
      Duration(100, "sec")
    )
    // >LOG
    // SEPARATOR<
  }

  /** Snippet for the customDelete method.
    *
    * allow del method for a custom path with all parameters
    */
  def snippetForRecommendClientCustomDelete1(): Unit = {
    // >SEPARATOR customDelete allow del method for a custom path with all parameters
    // Initialize the client
    val client = RecommendClient(appId = "ALGOLIA_APPLICATION_ID", apiKey = "ALGOLIA_API_KEY")

    // Call the API
    val response = Await.result(
      client.customDelete[JObject](
        path = "test/all",
        parameters = Some(Map("query" -> "parameters"))
      ),
      Duration(100, "sec")
    )
    // >LOG
    // SEPARATOR<
  }

  /** Snippet for the customGet method.
    *
    * allow get method for a custom path with minimal parameters
    */
  def snippetForRecommendClientCustomGet(): Unit = {
    // >SEPARATOR customGet allow get method for a custom path with minimal parameters
    // Initialize the client
    val client = RecommendClient(appId = "ALGOLIA_APPLICATION_ID", apiKey = "ALGOLIA_API_KEY")

    // Call the API
    val response = Await.result(
      client.customGet[JObject](
        path = "test/minimal"
      ),
      Duration(100, "sec")
    )
    // >LOG
    // SEPARATOR<
  }

  /** Snippet for the customGet method.
    *
    * allow get method for a custom path with all parameters
    */
  def snippetForRecommendClientCustomGet1(): Unit = {
    // >SEPARATOR customGet allow get method for a custom path with all parameters
    // Initialize the client
    val client = RecommendClient(appId = "ALGOLIA_APPLICATION_ID", apiKey = "ALGOLIA_API_KEY")

    // Call the API
    val response = Await.result(
      client.customGet[JObject](
        path = "test/all",
        parameters = Some(Map("query" -> "parameters with space"))
      ),
      Duration(100, "sec")
    )
    // >LOG
    // SEPARATOR<
  }

  /** Snippet for the customGet method.
    *
    * requestOptions should be escaped too
    */
  def snippetForRecommendClientCustomGet2(): Unit = {
    // >SEPARATOR customGet requestOptions should be escaped too
    // Initialize the client
    val client = RecommendClient(appId = "ALGOLIA_APPLICATION_ID", apiKey = "ALGOLIA_API_KEY")

    // Call the API
    val response = Await.result(
      client.customGet[JObject](
        path = "test/all",
        parameters = Some(Map("query" -> "to be overriden")),
        requestOptions = Some(
          RequestOptions
            .builder()
            .withQueryParameter("query", "parameters with space")
            .withQueryParameter("and an array", Seq("array", "with spaces"))
            .withHeader("x-header-1", "spaces are left alone")
            .build()
        )
      ),
      Duration(100, "sec")
    )
    // >LOG
    // SEPARATOR<
  }

  /** Snippet for the customPost method.
    *
    * allow post method for a custom path with minimal parameters
    */
  def snippetForRecommendClientCustomPost(): Unit = {
    // >SEPARATOR customPost allow post method for a custom path with minimal parameters
    // Initialize the client
    val client = RecommendClient(appId = "ALGOLIA_APPLICATION_ID", apiKey = "ALGOLIA_API_KEY")

    // Call the API
    val response = Await.result(
      client.customPost[JObject](
        path = "test/minimal"
      ),
      Duration(100, "sec")
    )
    // >LOG
    // SEPARATOR<
  }

  /** Snippet for the customPost method.
    *
    * allow post method for a custom path with all parameters
    */
  def snippetForRecommendClientCustomPost1(): Unit = {
    // >SEPARATOR customPost allow post method for a custom path with all parameters
    // Initialize the client
    val client = RecommendClient(appId = "ALGOLIA_APPLICATION_ID", apiKey = "ALGOLIA_API_KEY")

    // Call the API
    val response = Await.result(
      client.customPost[JObject](
        path = "test/all",
        parameters = Some(Map("query" -> "parameters")),
        body = Some(JObject(List(JField("body", JString("parameters")))))
      ),
      Duration(100, "sec")
    )
    // >LOG
    // SEPARATOR<
  }

  /** Snippet for the customPost method.
    *
    * requestOptions can override default query parameters
    */
  def snippetForRecommendClientCustomPost2(): Unit = {
    // >SEPARATOR customPost requestOptions can override default query parameters
    // Initialize the client
    val client = RecommendClient(appId = "ALGOLIA_APPLICATION_ID", apiKey = "ALGOLIA_API_KEY")

    // Call the API
    val response = Await.result(
      client.customPost[JObject](
        path = "test/requestOptions",
        parameters = Some(Map("query" -> "parameters")),
        body = Some(JObject(List(JField("facet", JString("filters"))))),
        requestOptions = Some(
          RequestOptions
            .builder()
            .withQueryParameter("query", "myQueryParameter")
            .build()
        )
      ),
      Duration(100, "sec")
    )
    // >LOG
    // SEPARATOR<
  }

  /** Snippet for the customPost method.
    *
    * requestOptions merges query parameters with default ones
    */
  def snippetForRecommendClientCustomPost3(): Unit = {
    // >SEPARATOR customPost requestOptions merges query parameters with default ones
    // Initialize the client
    val client = RecommendClient(appId = "ALGOLIA_APPLICATION_ID", apiKey = "ALGOLIA_API_KEY")

    // Call the API
    val response = Await.result(
      client.customPost[JObject](
        path = "test/requestOptions",
        parameters = Some(Map("query" -> "parameters")),
        body = Some(JObject(List(JField("facet", JString("filters"))))),
        requestOptions = Some(
          RequestOptions
            .builder()
            .withQueryParameter("query2", "myQueryParameter")
            .build()
        )
      ),
      Duration(100, "sec")
    )
    // >LOG
    // SEPARATOR<
  }

  /** Snippet for the customPost method.
    *
    * requestOptions can override default headers
    */
  def snippetForRecommendClientCustomPost4(): Unit = {
    // >SEPARATOR customPost requestOptions can override default headers
    // Initialize the client
    val client = RecommendClient(appId = "ALGOLIA_APPLICATION_ID", apiKey = "ALGOLIA_API_KEY")

    // Call the API
    val response = Await.result(
      client.customPost[JObject](
        path = "test/requestOptions",
        parameters = Some(Map("query" -> "parameters")),
        body = Some(JObject(List(JField("facet", JString("filters"))))),
        requestOptions = Some(
          RequestOptions
            .builder()
            .withHeader("x-algolia-api-key", "ALGOLIA_API_KEY")
            .build()
        )
      ),
      Duration(100, "sec")
    )
    // >LOG
    // SEPARATOR<
  }

  /** Snippet for the customPost method.
    *
    * requestOptions merges headers with default ones
    */
  def snippetForRecommendClientCustomPost5(): Unit = {
    // >SEPARATOR customPost requestOptions merges headers with default ones
    // Initialize the client
    val client = RecommendClient(appId = "ALGOLIA_APPLICATION_ID", apiKey = "ALGOLIA_API_KEY")

    // Call the API
    val response = Await.result(
      client.customPost[JObject](
        path = "test/requestOptions",
        parameters = Some(Map("query" -> "parameters")),
        body = Some(JObject(List(JField("facet", JString("filters"))))),
        requestOptions = Some(
          RequestOptions
            .builder()
            .withHeader("x-algolia-api-key", "ALGOLIA_API_KEY")
            .build()
        )
      ),
      Duration(100, "sec")
    )
    // >LOG
    // SEPARATOR<
  }

  /** Snippet for the customPost method.
    *
    * requestOptions queryParameters accepts booleans
    */
  def snippetForRecommendClientCustomPost6(): Unit = {
    // >SEPARATOR customPost requestOptions queryParameters accepts booleans
    // Initialize the client
    val client = RecommendClient(appId = "ALGOLIA_APPLICATION_ID", apiKey = "ALGOLIA_API_KEY")

    // Call the API
    val response = Await.result(
      client.customPost[JObject](
        path = "test/requestOptions",
        parameters = Some(Map("query" -> "parameters")),
        body = Some(JObject(List(JField("facet", JString("filters"))))),
        requestOptions = Some(
          RequestOptions
            .builder()
            .withQueryParameter("isItWorking", true)
            .build()
        )
      ),
      Duration(100, "sec")
    )
    // >LOG
    // SEPARATOR<
  }

  /** Snippet for the customPost method.
    *
    * requestOptions queryParameters accepts integers
    */
  def snippetForRecommendClientCustomPost7(): Unit = {
    // >SEPARATOR customPost requestOptions queryParameters accepts integers
    // Initialize the client
    val client = RecommendClient(appId = "ALGOLIA_APPLICATION_ID", apiKey = "ALGOLIA_API_KEY")

    // Call the API
    val response = Await.result(
      client.customPost[JObject](
        path = "test/requestOptions",
        parameters = Some(Map("query" -> "parameters")),
        body = Some(JObject(List(JField("facet", JString("filters"))))),
        requestOptions = Some(
          RequestOptions
            .builder()
            .withQueryParameter("myParam", 2)
            .build()
        )
      ),
      Duration(100, "sec")
    )
    // >LOG
    // SEPARATOR<
  }

  /** Snippet for the customPost method.
    *
    * requestOptions queryParameters accepts list of string
    */
  def snippetForRecommendClientCustomPost8(): Unit = {
    // >SEPARATOR customPost requestOptions queryParameters accepts list of string
    // Initialize the client
    val client = RecommendClient(appId = "ALGOLIA_APPLICATION_ID", apiKey = "ALGOLIA_API_KEY")

    // Call the API
    val response = Await.result(
      client.customPost[JObject](
        path = "test/requestOptions",
        parameters = Some(Map("query" -> "parameters")),
        body = Some(JObject(List(JField("facet", JString("filters"))))),
        requestOptions = Some(
          RequestOptions
            .builder()
            .withQueryParameter("myParam", Seq("b and c", "d"))
            .build()
        )
      ),
      Duration(100, "sec")
    )
    // >LOG
    // SEPARATOR<
  }

  /** Snippet for the customPost method.
    *
    * requestOptions queryParameters accepts list of booleans
    */
  def snippetForRecommendClientCustomPost9(): Unit = {
    // >SEPARATOR customPost requestOptions queryParameters accepts list of booleans
    // Initialize the client
    val client = RecommendClient(appId = "ALGOLIA_APPLICATION_ID", apiKey = "ALGOLIA_API_KEY")

    // Call the API
    val response = Await.result(
      client.customPost[JObject](
        path = "test/requestOptions",
        parameters = Some(Map("query" -> "parameters")),
        body = Some(JObject(List(JField("facet", JString("filters"))))),
        requestOptions = Some(
          RequestOptions
            .builder()
            .withQueryParameter("myParam", Seq(true, true, false))
            .build()
        )
      ),
      Duration(100, "sec")
    )
    // >LOG
    // SEPARATOR<
  }

  /** Snippet for the customPost method.
    *
    * requestOptions queryParameters accepts list of integers
    */
  def snippetForRecommendClientCustomPost10(): Unit = {
    // >SEPARATOR customPost requestOptions queryParameters accepts list of integers
    // Initialize the client
    val client = RecommendClient(appId = "ALGOLIA_APPLICATION_ID", apiKey = "ALGOLIA_API_KEY")

    // Call the API
    val response = Await.result(
      client.customPost[JObject](
        path = "test/requestOptions",
        parameters = Some(Map("query" -> "parameters")),
        body = Some(JObject(List(JField("facet", JString("filters"))))),
        requestOptions = Some(
          RequestOptions
            .builder()
            .withQueryParameter("myParam", Seq(1, 2))
            .build()
        )
      ),
      Duration(100, "sec")
    )
    // >LOG
    // SEPARATOR<
  }

  /** Snippet for the customPut method.
    *
    * allow put method for a custom path with minimal parameters
    */
  def snippetForRecommendClientCustomPut(): Unit = {
    // >SEPARATOR customPut allow put method for a custom path with minimal parameters
    // Initialize the client
    val client = RecommendClient(appId = "ALGOLIA_APPLICATION_ID", apiKey = "ALGOLIA_API_KEY")

    // Call the API
    val response = Await.result(
      client.customPut[JObject](
        path = "test/minimal"
      ),
      Duration(100, "sec")
    )
    // >LOG
    // SEPARATOR<
  }

  /** Snippet for the customPut method.
    *
    * allow put method for a custom path with all parameters
    */
  def snippetForRecommendClientCustomPut1(): Unit = {
    // >SEPARATOR customPut allow put method for a custom path with all parameters
    // Initialize the client
    val client = RecommendClient(appId = "ALGOLIA_APPLICATION_ID", apiKey = "ALGOLIA_API_KEY")

    // Call the API
    val response = Await.result(
      client.customPut[JObject](
        path = "test/all",
        parameters = Some(Map("query" -> "parameters")),
        body = Some(JObject(List(JField("body", JString("parameters")))))
      ),
      Duration(100, "sec")
    )
    // >LOG
    // SEPARATOR<
  }

  /** Snippet for the deleteRecommendRule method.
    *
    * deleteRecommendRule
    */
  def snippetForRecommendClientDeleteRecommendRule(): Unit = {
    // >SEPARATOR deleteRecommendRule default
    // Initialize the client
    val client = RecommendClient(appId = "ALGOLIA_APPLICATION_ID", apiKey = "ALGOLIA_API_KEY")

    // Call the API
    val response = Await.result(
      client.deleteRecommendRule(
        indexName = "<YOUR_INDEX_NAME>",
        model = RecommendModels.withName("related-products"),
        objectID = "objectID"
      ),
      Duration(100, "sec")
    )
    // >LOG
    // SEPARATOR<
  }

  /** Snippet for the getRecommendRule method.
    *
    * getRecommendRule
    */
  def snippetForRecommendClientGetRecommendRule(): Unit = {
    // >SEPARATOR getRecommendRule default
    // Initialize the client
    val client = RecommendClient(appId = "ALGOLIA_APPLICATION_ID", apiKey = "ALGOLIA_API_KEY")

    // Call the API
    val response = Await.result(
      client.getRecommendRule(
        indexName = "<YOUR_INDEX_NAME>",
        model = RecommendModels.withName("related-products"),
        objectID = "objectID"
      ),
      Duration(100, "sec")
    )
    // >LOG
    // SEPARATOR<
  }

  /** Snippet for the getRecommendStatus method.
    *
    * getRecommendStatus
    */
  def snippetForRecommendClientGetRecommendStatus(): Unit = {
    // >SEPARATOR getRecommendStatus default
    // Initialize the client
    val client = RecommendClient(appId = "ALGOLIA_APPLICATION_ID", apiKey = "ALGOLIA_API_KEY")

    // Call the API
    val response = Await.result(
      client.getRecommendStatus(
        indexName = "<YOUR_INDEX_NAME>",
        model = RecommendModels.withName("related-products"),
        taskID = 12345L
      ),
      Duration(100, "sec")
    )
    // >LOG
    // SEPARATOR<
  }

  /** Snippet for the getRecommendations method.
    *
    * get recommendations for recommend model with minimal parameters
    */
  def snippetForRecommendClientGetRecommendations(): Unit = {
    // >SEPARATOR getRecommendations get recommendations for recommend model with minimal parameters
    // Initialize the client
    val client = RecommendClient(appId = "ALGOLIA_APPLICATION_ID", apiKey = "ALGOLIA_API_KEY")

    // Call the API
    val response = Await.result(
      client.getRecommendations(
        getRecommendationsParams = GetRecommendationsParams(
          requests = Seq(
            RelatedQuery(
              indexName = "<YOUR_INDEX_NAME>",
              objectID = "objectID",
              model = RelatedModel.withName("related-products"),
              threshold = 42.1
            )
          )
        )
      ),
      Duration(100, "sec")
    )
    // >LOG
    // SEPARATOR<
  }

  /** Snippet for the getRecommendations method.
    *
    * get recommendations with e2e to check oneOf model
    */
  def snippetForRecommendClientGetRecommendations1(): Unit = {
    // >SEPARATOR getRecommendations get recommendations with e2e to check oneOf model
    // Initialize the client
    val client = RecommendClient(appId = "ALGOLIA_APPLICATION_ID", apiKey = "ALGOLIA_API_KEY")

    // Call the API
    val response = Await.result(
      client.getRecommendations(
        getRecommendationsParams = GetRecommendationsParams(
          requests = Seq(
            RelatedQuery(
              indexName = "<YOUR_INDEX_NAME>",
              objectID = "Æon Flux",
              model = RelatedModel.withName("related-products"),
              threshold = 20.0,
              maxRecommendations = Some(2)
            )
          )
        )
      ),
      Duration(100, "sec")
    )
    // >LOG
    // SEPARATOR<
  }

  /** Snippet for the getRecommendations method.
    *
    * get recommendations for recommend model with all parameters
    */
  def snippetForRecommendClientGetRecommendations2(): Unit = {
    // >SEPARATOR getRecommendations get recommendations for recommend model with all parameters
    // Initialize the client
    val client = RecommendClient(appId = "ALGOLIA_APPLICATION_ID", apiKey = "ALGOLIA_API_KEY")

    // Call the API
    val response = Await.result(
      client.getRecommendations(
        getRecommendationsParams = GetRecommendationsParams(
          requests = Seq(
            RelatedQuery(
              indexName = "<YOUR_INDEX_NAME>",
              objectID = "objectID",
              model = RelatedModel.withName("related-products"),
              threshold = 42.1,
              maxRecommendations = Some(10),
              queryParameters = Some(
                RecommendSearchParams(
                  query = Some("myQuery"),
                  facetFilters = Some(FacetFilters(Seq(FacetFilters("query"))))
                )
              ),
              fallbackParameters = Some(
                FallbackParams(
                  query = Some("myQuery"),
                  facetFilters = Some(FacetFilters(Seq(FacetFilters("fallback"))))
                )
              )
            )
          )
        )
      ),
      Duration(100, "sec")
    )
    // >LOG
    // SEPARATOR<
  }

  /** Snippet for the getRecommendations method.
    *
    * get recommendations for trending model with minimal parameters
    */
  def snippetForRecommendClientGetRecommendations3(): Unit = {
    // >SEPARATOR getRecommendations get recommendations for trending model with minimal parameters
    // Initialize the client
    val client = RecommendClient(appId = "ALGOLIA_APPLICATION_ID", apiKey = "ALGOLIA_API_KEY")

    // Call the API
    val response = Await.result(
      client.getRecommendations(
        getRecommendationsParams = GetRecommendationsParams(
          requests = Seq(
            TrendingItemsQuery(
              indexName = "<YOUR_INDEX_NAME>",
              model = TrendingItemsModel.withName("trending-items"),
              threshold = 42.1,
              facetName = Some("facet"),
              facetValue = Some("value")
            )
          )
        )
      ),
      Duration(100, "sec")
    )
    // >LOG
    // SEPARATOR<
  }

  /** Snippet for the getRecommendations method.
    *
    * get recommendations for trending model with all parameters
    */
  def snippetForRecommendClientGetRecommendations4(): Unit = {
    // >SEPARATOR getRecommendations get recommendations for trending model with all parameters
    // Initialize the client
    val client = RecommendClient(appId = "ALGOLIA_APPLICATION_ID", apiKey = "ALGOLIA_API_KEY")

    // Call the API
    val response = Await.result(
      client.getRecommendations(
        getRecommendationsParams = GetRecommendationsParams(
          requests = Seq(
            TrendingItemsQuery(
              indexName = "<YOUR_INDEX_NAME>",
              model = TrendingItemsModel.withName("trending-items"),
              threshold = 42.1,
              maxRecommendations = Some(10),
              facetName = Some("myFacetName"),
              facetValue = Some("myFacetValue"),
              queryParameters = Some(
                RecommendSearchParams(
                  query = Some("myQuery"),
                  facetFilters = Some(FacetFilters(Seq(FacetFilters("query"))))
                )
              ),
              fallbackParameters = Some(
                FallbackParams(
                  query = Some("myQuery"),
                  facetFilters = Some(FacetFilters(Seq(FacetFilters("fallback"))))
                )
              )
            )
          )
        )
      ),
      Duration(100, "sec")
    )
    // >LOG
    // SEPARATOR<
  }

  /** Snippet for the getRecommendations method.
    *
    * get multiple recommendations with minimal parameters
    */
  def snippetForRecommendClientGetRecommendations5(): Unit = {
    // >SEPARATOR getRecommendations get multiple recommendations with minimal parameters
    // Initialize the client
    val client = RecommendClient(appId = "ALGOLIA_APPLICATION_ID", apiKey = "ALGOLIA_API_KEY")

    // Call the API
    val response = Await.result(
      client.getRecommendations(
        getRecommendationsParams = GetRecommendationsParams(
          requests = Seq(
            RelatedQuery(
              indexName = "<YOUR_INDEX_NAME>",
              objectID = "objectID1",
              model = RelatedModel.withName("related-products"),
              threshold = 21.7
            ),
            RelatedQuery(
              indexName = "<YOUR_INDEX_NAME>",
              objectID = "objectID2",
              model = RelatedModel.withName("related-products"),
              threshold = 21.7
            )
          )
        )
      ),
      Duration(100, "sec")
    )
    // >LOG
    // SEPARATOR<
  }

  /** Snippet for the getRecommendations method.
    *
    * get multiple recommendations with all parameters
    */
  def snippetForRecommendClientGetRecommendations6(): Unit = {
    // >SEPARATOR getRecommendations get multiple recommendations with all parameters
    // Initialize the client
    val client = RecommendClient(appId = "ALGOLIA_APPLICATION_ID", apiKey = "ALGOLIA_API_KEY")

    // Call the API
    val response = Await.result(
      client.getRecommendations(
        getRecommendationsParams = GetRecommendationsParams(
          requests = Seq(
            RelatedQuery(
              indexName = "<YOUR_INDEX_NAME>",
              objectID = "objectID1",
              model = RelatedModel.withName("related-products"),
              threshold = 21.7,
              maxRecommendations = Some(10),
              queryParameters = Some(
                RecommendSearchParams(
                  query = Some("myQuery"),
                  facetFilters = Some(FacetFilters(Seq(FacetFilters("query1"))))
                )
              ),
              fallbackParameters = Some(
                FallbackParams(
                  query = Some("myQuery"),
                  facetFilters = Some(FacetFilters(Seq(FacetFilters("fallback1"))))
                )
              )
            ),
            RelatedQuery(
              indexName = "<YOUR_INDEX_NAME>",
              objectID = "objectID2",
              model = RelatedModel.withName("related-products"),
              threshold = 21.7,
              maxRecommendations = Some(10),
              queryParameters = Some(
                RecommendSearchParams(
                  query = Some("myQuery"),
                  facetFilters = Some(FacetFilters(Seq(FacetFilters("query2"))))
                )
              ),
              fallbackParameters = Some(
                FallbackParams(
                  query = Some("myQuery"),
                  facetFilters = Some(FacetFilters(Seq(FacetFilters("fallback2"))))
                )
              )
            )
          )
        )
      ),
      Duration(100, "sec")
    )
    // >LOG
    // SEPARATOR<
  }

  /** Snippet for the getRecommendations method.
    *
    * get frequently bought together recommendations
    */
  def snippetForRecommendClientGetRecommendations7(): Unit = {
    // >SEPARATOR getRecommendations get frequently bought together recommendations
    // Initialize the client
    val client = RecommendClient(appId = "ALGOLIA_APPLICATION_ID", apiKey = "ALGOLIA_API_KEY")

    // Call the API
    val response = Await.result(
      client.getRecommendations(
        getRecommendationsParams = GetRecommendationsParams(
          requests = Seq(
            BoughtTogetherQuery(
              indexName = "<YOUR_INDEX_NAME>",
              objectID = "objectID1",
              model = FbtModel.withName("bought-together"),
              threshold = 42.7
            )
          )
        )
      ),
      Duration(100, "sec")
    )
    // >LOG
    // SEPARATOR<
  }

  /** Snippet for the searchRecommendRules method.
    *
    * searchRecommendRules
    */
  def snippetForRecommendClientSearchRecommendRules(): Unit = {
    // >SEPARATOR searchRecommendRules default
    // Initialize the client
    val client = RecommendClient(appId = "ALGOLIA_APPLICATION_ID", apiKey = "ALGOLIA_API_KEY")

    // Call the API
    val response = Await.result(
      client.searchRecommendRules(
        indexName = "<YOUR_INDEX_NAME>",
        model = RecommendModels.withName("related-products")
      ),
      Duration(100, "sec")
    )
    // >LOG
    // SEPARATOR<
  }

  /** Snippet for the setClientApiKey method.
    *
    * switch API key
    */
  def snippetForRecommendClientSetClientApiKey(): Unit = {
    // >SEPARATOR setClientApiKey default
    // Initialize the client
    val client = RecommendClient(appId = "ALGOLIA_APPLICATION_ID", apiKey = "ALGOLIA_API_KEY")

    // Call the API
    client.setClientApiKey(
      apiKey = "updated-api-key"
    ) // >LOG
    // SEPARATOR<
  }

}
