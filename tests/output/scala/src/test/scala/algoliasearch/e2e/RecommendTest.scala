// Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT.
package algoliasearch.e2e

import algoliasearch.api.RecommendClient
import algoliasearch.config.*
import algoliasearch.recommend.*
import org.json4s.*
import org.json4s.native.JsonParser.*
import org.scalatest.funsuite.AnyFunSuite
import io.github.cdimascio.dotenv.Dotenv
import org.skyscreamer.jsonassert.JSONCompare.compareJSON
import org.skyscreamer.jsonassert.JSONCompareMode
import org.json4s.native.Serialization
import org.json4s.native.Serialization.write

import scala.concurrent.duration.Duration
import scala.concurrent.{Await, ExecutionContextExecutor}

class RecommendTestE2E extends AnyFunSuite {
  implicit val ec: ExecutionContextExecutor = scala.concurrent.ExecutionContext.global
  implicit val formats: Formats = org.json4s.DefaultFormats

  def testClient(): RecommendClient = {
    if (System.getenv("CI") == "true") {
      RecommendClient(
        appId = System.getenv("ALGOLIA_APPLICATION_ID"),
        apiKey = System.getenv("ALGOLIA_ADMIN_KEY")
      )
    } else {
      val dotenv = Dotenv.configure.directory("../../").load
      RecommendClient(
        appId = dotenv.get("ALGOLIA_APPLICATION_ID"),
        apiKey = dotenv.get("ALGOLIA_ADMIN_KEY")
      )
    }
  }

  test("get recommendations with e2e to check oneOf model1") {
    val client = testClient()
    val future = client.getRecommendations(
      getRecommendationsParams = GetRecommendationsParams(
        requests = Seq(
          RelatedQuery(
            indexName = "cts_e2e_browse",
            objectID = "Æon Flux",
            model = RelatedModel.withName("related-products"),
            threshold = 20.0,
            maxRecommendations = Some(2)
          )
        )
      )
    )

    val response = Await.result(future, Duration.Inf)
    compareJSON(
      """{"results":[{"exhaustive":{"nbHits":true,"typo":true},"exhaustiveNbHits":true,"exhaustiveTypo":true,"index":"cts_e2e_browse","page":0,"nbHits":2,"nbPages":1,"hitsPerPage":2,"hits":[{"objectID":"The Transformers: The Movie","_highlightResult":{"genres":[{"matchLevel":"none","matchedWords":[],"value":"Animated"},{"matchLevel":"none","matchedWords":[],"value":"Action"},{"matchLevel":"none","matchedWords":[],"value":"Science Fiction"}],"href":{"matchLevel":"none","matchedWords":[],"value":"The_Transformers:_The_Movie"}},"_score":100.0,"cast":["Judd Nelson","Leonard Nimoy","Robert Stack","Orson Welles","Michael Bell","Eric Idle","Chris Latta","Peter Cullen","Frank Welker","Neil Ross","Paul Eiding"],"extract":"The Transformers: The Movie is a 1986 animated science fiction action film based on the Transformers television series. It was released in North America on August 8, 1986, and in the United Kingdom on December 12, 1986. It was co-produced and directed by Nelson Shin, who also produced the television series. The screenplay was written by Ron Friedman, who created Bionic Six a year later.","title":"The Transformers: The Movie","year":1986},{"objectID":"Treasure Planet","_score":90.56,"title":"Treasure Planet","year":2002}]}]}""",
      write(response),
      JSONCompareMode.LENIENT
    )
  }

}
