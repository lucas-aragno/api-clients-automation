// Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT.
package algoliasearch.methods.snippets

import scala.concurrent.duration.Duration

// >IMPORT
import algoliasearch.api.QuerySuggestionsClient
import algoliasearch.config.*

// IMPORT<
import algoliasearch.querysuggestions.*

import org.json4s.*
import org.json4s.native.JsonParser.*
import scala.concurrent.{Await, ExecutionContextExecutor}

class SnippetQuerySuggestionsClient {
  implicit val ec: ExecutionContextExecutor = scala.concurrent.ExecutionContext.global
  implicit val formats: Formats = JsonSupport.format

  /** Snippet for the createConfig method.
    *
    * createConfig
    */
  def snippetForQuerySuggestionsClientCreateConfig(): Unit = {
    // >SEPARATOR createConfig default
    // Initialize the client
    val client = QuerySuggestionsClient(
      appId = "ALGOLIA_APPLICATION_ID",
      apiKey = "ALGOLIA_API_KEY",
      region = "ALGOLIA_APPLICATION_REGION"
    )

    // Call the API
    val response = Await.result(
      client.createConfig(
        configurationWithIndex = ConfigurationWithIndex(
          indexName = "<YOUR_INDEX_NAME>",
          sourceIndices = Seq(
            SourceIndex(
              indexName = "<YOUR_INDEX_NAME>",
              facets = Some(
                Seq(
                  Facet(
                    attribute = Some("test")
                  )
                )
              ),
              generate = Some(Seq(Seq("facetA", "facetB"), Seq("facetC")))
            )
          ),
          languages = Some(Languages(Seq("french"))),
          exclude = Some(Seq("test"))
        )
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
  def snippetForQuerySuggestionsClientCustomDelete(): Unit = {
    // >SEPARATOR customDelete allow del method for a custom path with minimal parameters
    // Initialize the client
    val client = QuerySuggestionsClient(
      appId = "ALGOLIA_APPLICATION_ID",
      apiKey = "ALGOLIA_API_KEY",
      region = "ALGOLIA_APPLICATION_REGION"
    )

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
  def snippetForQuerySuggestionsClientCustomDelete1(): Unit = {
    // >SEPARATOR customDelete allow del method for a custom path with all parameters
    // Initialize the client
    val client = QuerySuggestionsClient(
      appId = "ALGOLIA_APPLICATION_ID",
      apiKey = "ALGOLIA_API_KEY",
      region = "ALGOLIA_APPLICATION_REGION"
    )

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
  def snippetForQuerySuggestionsClientCustomGet(): Unit = {
    // >SEPARATOR customGet allow get method for a custom path with minimal parameters
    // Initialize the client
    val client = QuerySuggestionsClient(
      appId = "ALGOLIA_APPLICATION_ID",
      apiKey = "ALGOLIA_API_KEY",
      region = "ALGOLIA_APPLICATION_REGION"
    )

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
  def snippetForQuerySuggestionsClientCustomGet1(): Unit = {
    // >SEPARATOR customGet allow get method for a custom path with all parameters
    // Initialize the client
    val client = QuerySuggestionsClient(
      appId = "ALGOLIA_APPLICATION_ID",
      apiKey = "ALGOLIA_API_KEY",
      region = "ALGOLIA_APPLICATION_REGION"
    )

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
  def snippetForQuerySuggestionsClientCustomGet2(): Unit = {
    // >SEPARATOR customGet requestOptions should be escaped too
    // Initialize the client
    val client = QuerySuggestionsClient(
      appId = "ALGOLIA_APPLICATION_ID",
      apiKey = "ALGOLIA_API_KEY",
      region = "ALGOLIA_APPLICATION_REGION"
    )

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
  def snippetForQuerySuggestionsClientCustomPost(): Unit = {
    // >SEPARATOR customPost allow post method for a custom path with minimal parameters
    // Initialize the client
    val client = QuerySuggestionsClient(
      appId = "ALGOLIA_APPLICATION_ID",
      apiKey = "ALGOLIA_API_KEY",
      region = "ALGOLIA_APPLICATION_REGION"
    )

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
  def snippetForQuerySuggestionsClientCustomPost1(): Unit = {
    // >SEPARATOR customPost allow post method for a custom path with all parameters
    // Initialize the client
    val client = QuerySuggestionsClient(
      appId = "ALGOLIA_APPLICATION_ID",
      apiKey = "ALGOLIA_API_KEY",
      region = "ALGOLIA_APPLICATION_REGION"
    )

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
  def snippetForQuerySuggestionsClientCustomPost2(): Unit = {
    // >SEPARATOR customPost requestOptions can override default query parameters
    // Initialize the client
    val client = QuerySuggestionsClient(
      appId = "ALGOLIA_APPLICATION_ID",
      apiKey = "ALGOLIA_API_KEY",
      region = "ALGOLIA_APPLICATION_REGION"
    )

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
  def snippetForQuerySuggestionsClientCustomPost3(): Unit = {
    // >SEPARATOR customPost requestOptions merges query parameters with default ones
    // Initialize the client
    val client = QuerySuggestionsClient(
      appId = "ALGOLIA_APPLICATION_ID",
      apiKey = "ALGOLIA_API_KEY",
      region = "ALGOLIA_APPLICATION_REGION"
    )

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
  def snippetForQuerySuggestionsClientCustomPost4(): Unit = {
    // >SEPARATOR customPost requestOptions can override default headers
    // Initialize the client
    val client = QuerySuggestionsClient(
      appId = "ALGOLIA_APPLICATION_ID",
      apiKey = "ALGOLIA_API_KEY",
      region = "ALGOLIA_APPLICATION_REGION"
    )

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
  def snippetForQuerySuggestionsClientCustomPost5(): Unit = {
    // >SEPARATOR customPost requestOptions merges headers with default ones
    // Initialize the client
    val client = QuerySuggestionsClient(
      appId = "ALGOLIA_APPLICATION_ID",
      apiKey = "ALGOLIA_API_KEY",
      region = "ALGOLIA_APPLICATION_REGION"
    )

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
  def snippetForQuerySuggestionsClientCustomPost6(): Unit = {
    // >SEPARATOR customPost requestOptions queryParameters accepts booleans
    // Initialize the client
    val client = QuerySuggestionsClient(
      appId = "ALGOLIA_APPLICATION_ID",
      apiKey = "ALGOLIA_API_KEY",
      region = "ALGOLIA_APPLICATION_REGION"
    )

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
  def snippetForQuerySuggestionsClientCustomPost7(): Unit = {
    // >SEPARATOR customPost requestOptions queryParameters accepts integers
    // Initialize the client
    val client = QuerySuggestionsClient(
      appId = "ALGOLIA_APPLICATION_ID",
      apiKey = "ALGOLIA_API_KEY",
      region = "ALGOLIA_APPLICATION_REGION"
    )

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
  def snippetForQuerySuggestionsClientCustomPost8(): Unit = {
    // >SEPARATOR customPost requestOptions queryParameters accepts list of string
    // Initialize the client
    val client = QuerySuggestionsClient(
      appId = "ALGOLIA_APPLICATION_ID",
      apiKey = "ALGOLIA_API_KEY",
      region = "ALGOLIA_APPLICATION_REGION"
    )

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
  def snippetForQuerySuggestionsClientCustomPost9(): Unit = {
    // >SEPARATOR customPost requestOptions queryParameters accepts list of booleans
    // Initialize the client
    val client = QuerySuggestionsClient(
      appId = "ALGOLIA_APPLICATION_ID",
      apiKey = "ALGOLIA_API_KEY",
      region = "ALGOLIA_APPLICATION_REGION"
    )

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
  def snippetForQuerySuggestionsClientCustomPost10(): Unit = {
    // >SEPARATOR customPost requestOptions queryParameters accepts list of integers
    // Initialize the client
    val client = QuerySuggestionsClient(
      appId = "ALGOLIA_APPLICATION_ID",
      apiKey = "ALGOLIA_API_KEY",
      region = "ALGOLIA_APPLICATION_REGION"
    )

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
  def snippetForQuerySuggestionsClientCustomPut(): Unit = {
    // >SEPARATOR customPut allow put method for a custom path with minimal parameters
    // Initialize the client
    val client = QuerySuggestionsClient(
      appId = "ALGOLIA_APPLICATION_ID",
      apiKey = "ALGOLIA_API_KEY",
      region = "ALGOLIA_APPLICATION_REGION"
    )

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
  def snippetForQuerySuggestionsClientCustomPut1(): Unit = {
    // >SEPARATOR customPut allow put method for a custom path with all parameters
    // Initialize the client
    val client = QuerySuggestionsClient(
      appId = "ALGOLIA_APPLICATION_ID",
      apiKey = "ALGOLIA_API_KEY",
      region = "ALGOLIA_APPLICATION_REGION"
    )

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

  /** Snippet for the deleteConfig method.
    *
    * deleteConfig
    */
  def snippetForQuerySuggestionsClientDeleteConfig(): Unit = {
    // >SEPARATOR deleteConfig default
    // Initialize the client
    val client = QuerySuggestionsClient(
      appId = "ALGOLIA_APPLICATION_ID",
      apiKey = "ALGOLIA_API_KEY",
      region = "ALGOLIA_APPLICATION_REGION"
    )

    // Call the API
    val response = Await.result(
      client.deleteConfig(
        indexName = "<YOUR_INDEX_NAME>"
      ),
      Duration(100, "sec")
    )
    // >LOG
    // SEPARATOR<
  }

  /** Snippet for the getAllConfigs method.
    *
    * getAllConfigs
    */
  def snippetForQuerySuggestionsClientGetAllConfigs(): Unit = {
    // >SEPARATOR getAllConfigs default
    // Initialize the client
    val client = QuerySuggestionsClient(
      appId = "ALGOLIA_APPLICATION_ID",
      apiKey = "ALGOLIA_API_KEY",
      region = "ALGOLIA_APPLICATION_REGION"
    )

    // Call the API
    val response = Await.result(
      client.getAllConfigs(
      ),
      Duration(100, "sec")
    )
    // >LOG
    // SEPARATOR<
  }

  /** Snippet for the getConfig method.
    *
    * Retrieve QS config e2e
    */
  def snippetForQuerySuggestionsClientGetConfig(): Unit = {
    // >SEPARATOR getConfig default
    // Initialize the client
    val client = QuerySuggestionsClient(
      appId = "ALGOLIA_APPLICATION_ID",
      apiKey = "ALGOLIA_API_KEY",
      region = "ALGOLIA_APPLICATION_REGION"
    )

    // Call the API
    val response = Await.result(
      client.getConfig(
        indexName = "<YOUR_INDEX_NAME>"
      ),
      Duration(100, "sec")
    )
    // >LOG
    // SEPARATOR<
  }

  /** Snippet for the getConfigStatus method.
    *
    * getConfigStatus
    */
  def snippetForQuerySuggestionsClientGetConfigStatus(): Unit = {
    // >SEPARATOR getConfigStatus default
    // Initialize the client
    val client = QuerySuggestionsClient(
      appId = "ALGOLIA_APPLICATION_ID",
      apiKey = "ALGOLIA_API_KEY",
      region = "ALGOLIA_APPLICATION_REGION"
    )

    // Call the API
    val response = Await.result(
      client.getConfigStatus(
        indexName = "<YOUR_INDEX_NAME>"
      ),
      Duration(100, "sec")
    )
    // >LOG
    // SEPARATOR<
  }

  /** Snippet for the getLogFile method.
    *
    * getLogFile
    */
  def snippetForQuerySuggestionsClientGetLogFile(): Unit = {
    // >SEPARATOR getLogFile default
    // Initialize the client
    val client = QuerySuggestionsClient(
      appId = "ALGOLIA_APPLICATION_ID",
      apiKey = "ALGOLIA_API_KEY",
      region = "ALGOLIA_APPLICATION_REGION"
    )

    // Call the API
    val response = Await.result(
      client.getLogFile(
        indexName = "<YOUR_INDEX_NAME>"
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
  def snippetForQuerySuggestionsClientSetClientApiKey(): Unit = {
    // >SEPARATOR setClientApiKey default
    // Initialize the client
    val client = QuerySuggestionsClient(
      appId = "ALGOLIA_APPLICATION_ID",
      apiKey = "ALGOLIA_API_KEY",
      region = "ALGOLIA_APPLICATION_REGION"
    )

    // Call the API
    client.setClientApiKey(
      apiKey = "updated-api-key"
    ) // >LOG
    // SEPARATOR<
  }

  /** Snippet for the updateConfig method.
    *
    * updateConfig
    */
  def snippetForQuerySuggestionsClientUpdateConfig(): Unit = {
    // >SEPARATOR updateConfig default
    // Initialize the client
    val client = QuerySuggestionsClient(
      appId = "ALGOLIA_APPLICATION_ID",
      apiKey = "ALGOLIA_API_KEY",
      region = "ALGOLIA_APPLICATION_REGION"
    )

    // Call the API
    val response = Await.result(
      client.updateConfig(
        indexName = "<YOUR_INDEX_NAME>",
        configuration = Configuration(
          sourceIndices = Seq(
            SourceIndex(
              indexName = "<YOUR_INDEX_NAME>",
              facets = Some(
                Seq(
                  Facet(
                    attribute = Some("test")
                  )
                )
              ),
              generate = Some(Seq(Seq("facetA", "facetB"), Seq("facetC")))
            )
          ),
          languages = Some(Languages(Seq("french"))),
          exclude = Some(Seq("test"))
        )
      ),
      Duration(100, "sec")
    )
    // >LOG
    // SEPARATOR<
  }

}
