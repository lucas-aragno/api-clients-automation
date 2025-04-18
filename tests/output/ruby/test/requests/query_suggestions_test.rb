# Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT.
require "algolia"
require "test/unit"

class TestQuerySuggestionsClient < Test::Unit::TestCase
  def setup
    @client = Algolia::QuerySuggestionsClient.create(
      "APP_ID",
      "API_KEY",
      "us",
      {requester: Algolia::Transport::EchoRequester.new}
    )
  end

  # createConfig
  def test_create_config
    req = @client.create_config_with_http_info(
      Algolia::QuerySuggestions::ConfigurationWithIndex.new(
        index_name: "theIndexName",
        source_indices: [
          Algolia::QuerySuggestions::SourceIndex.new(
            index_name: "testIndex",
            facets: [Algolia::QuerySuggestions::Facet.new(attribute: "test")],
            generate: [["facetA", "facetB"], ["facetC"]]
          )
        ],
        languages: ["french"],
        exclude: ["test"]
      )
    )

    assert_equal(:post, req.method)
    assert_equal("/1/configs", req.path)
    assert_equal({}.to_a, req.query_params.to_a)
    assert(({}.to_a - req.headers.to_a).empty?, req.headers.to_s)
    assert_equal(
      JSON.parse(
        "{\"indexName\":\"theIndexName\",\"sourceIndices\":[{\"indexName\":\"testIndex\",\"facets\":[{\"attribute\":\"test\"}],\"generate\":[[\"facetA\",\"facetB\"],[\"facetC\"]]}],\"languages\":[\"french\"],\"exclude\":[\"test\"]}"
      ),
      JSON.parse(req.body)
    )
  end

  # allow del method for a custom path with minimal parameters
  def test_custom_delete
    req = @client.custom_delete_with_http_info("test/minimal")

    assert_equal(:delete, req.method)
    assert_equal("/test/minimal", req.path)
    assert_equal({}.to_a, req.query_params.to_a)
    assert(({}.to_a - req.headers.to_a).empty?, req.headers.to_s)

    assert(req.body.nil?, "body is not nil")
  end

  # allow del method for a custom path with all parameters
  def test_custom_delete1
    req = @client.custom_delete_with_http_info("test/all", {query: "parameters"})

    assert_equal(:delete, req.method)
    assert_equal("/test/all", req.path)
    assert_equal({:"query" => "parameters"}.to_a, req.query_params.to_a)
    assert(({}.to_a - req.headers.to_a).empty?, req.headers.to_s)

    assert(req.body.nil?, "body is not nil")
  end

  # allow get method for a custom path with minimal parameters
  def test_custom_get
    req = @client.custom_get_with_http_info("test/minimal")

    assert_equal(:get, req.method)
    assert_equal("/test/minimal", req.path)
    assert_equal({}.to_a, req.query_params.to_a)
    assert(({}.to_a - req.headers.to_a).empty?, req.headers.to_s)

    assert(req.body.nil?, "body is not nil")
  end

  # allow get method for a custom path with all parameters
  def test_custom_get1
    req = @client.custom_get_with_http_info("test/all", {query: "parameters with space"})

    assert_equal(:get, req.method)
    assert_equal("/test/all", req.path)
    assert_equal({:"query" => "parameters%20with%20space"}.to_a, req.query_params.to_a)
    assert(({}.to_a - req.headers.to_a).empty?, req.headers.to_s)

    assert(req.body.nil?, "body is not nil")
  end

  # requestOptions should be escaped too
  def test_custom_get2
    req = @client.custom_get_with_http_info(
      "test/all",
      {query: "to be overriden"},
      {
        :header_params => {"x-header-1" => "spaces are left alone"},
        :query_params => JSON.parse(
          "{\"query\":\"parameters with space\",\"and an array\":[\"array\",\"with spaces\"]}",
          :symbolize_names => true
        )
      }
    )

    assert_equal(:get, req.method)
    assert_equal("/test/all", req.path)
    assert_equal(
      {:"query" => "parameters%20with%20space", :"and%20an%20array" => "array%2Cwith%20spaces"}.to_a,
      req.query_params.to_a
    )
    assert(
      ({:"x-header-1" => "spaces are left alone"}.transform_keys(&:to_s).to_a - req.headers.to_a).empty?,
      req.headers.to_s
    )

    assert(req.body.nil?, "body is not nil")
  end

  # allow post method for a custom path with minimal parameters
  def test_custom_post
    req = @client.custom_post_with_http_info("test/minimal")

    assert_equal(:post, req.method)
    assert_equal("/test/minimal", req.path)
    assert_equal({}.to_a, req.query_params.to_a)
    assert(({}.to_a - req.headers.to_a).empty?, req.headers.to_s)
    assert_equal(JSON.parse("{}"), JSON.parse(req.body))
  end

  # allow post method for a custom path with all parameters
  def test_custom_post1
    req = @client.custom_post_with_http_info("test/all", {query: "parameters"}, {body: "parameters"})

    assert_equal(:post, req.method)
    assert_equal("/test/all", req.path)
    assert_equal({:"query" => "parameters"}.to_a, req.query_params.to_a)
    assert(({}.to_a - req.headers.to_a).empty?, req.headers.to_s)
    assert_equal(JSON.parse("{\"body\":\"parameters\"}"), JSON.parse(req.body))
  end

  # requestOptions can override default query parameters
  def test_custom_post2
    req = @client.custom_post_with_http_info(
      "test/requestOptions",
      {query: "parameters"},
      {facet: "filters"},
      {:query_params => JSON.parse("{\"query\":\"myQueryParameter\"}", :symbolize_names => true)}
    )

    assert_equal(:post, req.method)
    assert_equal("/test/requestOptions", req.path)
    assert_equal({:"query" => "myQueryParameter"}.to_a, req.query_params.to_a)
    assert(({}.to_a - req.headers.to_a).empty?, req.headers.to_s)
    assert_equal(JSON.parse("{\"facet\":\"filters\"}"), JSON.parse(req.body))
  end

  # requestOptions merges query parameters with default ones
  def test_custom_post3
    req = @client.custom_post_with_http_info(
      "test/requestOptions",
      {query: "parameters"},
      {facet: "filters"},
      {:query_params => JSON.parse("{\"query2\":\"myQueryParameter\"}", :symbolize_names => true)}
    )

    assert_equal(:post, req.method)
    assert_equal("/test/requestOptions", req.path)
    assert_equal({:"query" => "parameters", :"query2" => "myQueryParameter"}.to_a, req.query_params.to_a)
    assert(({}.to_a - req.headers.to_a).empty?, req.headers.to_s)
    assert_equal(JSON.parse("{\"facet\":\"filters\"}"), JSON.parse(req.body))
  end

  # requestOptions can override default headers
  def test_custom_post4
    req = @client.custom_post_with_http_info(
      "test/requestOptions",
      {query: "parameters"},
      {facet: "filters"},
      {:header_params => {"x-algolia-api-key" => "ALGOLIA_API_KEY"}}
    )

    assert_equal(:post, req.method)
    assert_equal("/test/requestOptions", req.path)
    assert_equal({:"query" => "parameters"}.to_a, req.query_params.to_a)
    assert(
      ({:"x-algolia-api-key" => "ALGOLIA_API_KEY"}.transform_keys(&:to_s).to_a - req.headers.to_a).empty?,
      req.headers.to_s
    )
    assert_equal(JSON.parse("{\"facet\":\"filters\"}"), JSON.parse(req.body))
  end

  # requestOptions merges headers with default ones
  def test_custom_post5
    req = @client.custom_post_with_http_info(
      "test/requestOptions",
      {query: "parameters"},
      {facet: "filters"},
      {:header_params => {"x-algolia-api-key" => "ALGOLIA_API_KEY"}}
    )

    assert_equal(:post, req.method)
    assert_equal("/test/requestOptions", req.path)
    assert_equal({:"query" => "parameters"}.to_a, req.query_params.to_a)
    assert(
      ({:"x-algolia-api-key" => "ALGOLIA_API_KEY"}.transform_keys(&:to_s).to_a - req.headers.to_a).empty?,
      req.headers.to_s
    )
    assert_equal(JSON.parse("{\"facet\":\"filters\"}"), JSON.parse(req.body))
  end

  # requestOptions queryParameters accepts booleans
  def test_custom_post6
    req = @client.custom_post_with_http_info(
      "test/requestOptions",
      {query: "parameters"},
      {facet: "filters"},
      {:query_params => JSON.parse("{\"isItWorking\":true}", :symbolize_names => true)}
    )

    assert_equal(:post, req.method)
    assert_equal("/test/requestOptions", req.path)
    assert_equal({:"query" => "parameters", :"isItWorking" => "true"}.to_a, req.query_params.to_a)
    assert(({}.to_a - req.headers.to_a).empty?, req.headers.to_s)
    assert_equal(JSON.parse("{\"facet\":\"filters\"}"), JSON.parse(req.body))
  end

  # requestOptions queryParameters accepts integers
  def test_custom_post7
    req = @client.custom_post_with_http_info(
      "test/requestOptions",
      {query: "parameters"},
      {facet: "filters"},
      {:query_params => JSON.parse("{\"myParam\":2}", :symbolize_names => true)}
    )

    assert_equal(:post, req.method)
    assert_equal("/test/requestOptions", req.path)
    assert_equal({:"query" => "parameters", :"myParam" => "2"}.to_a, req.query_params.to_a)
    assert(({}.to_a - req.headers.to_a).empty?, req.headers.to_s)
    assert_equal(JSON.parse("{\"facet\":\"filters\"}"), JSON.parse(req.body))
  end

  # requestOptions queryParameters accepts list of string
  def test_custom_post8
    req = @client.custom_post_with_http_info(
      "test/requestOptions",
      {query: "parameters"},
      {facet: "filters"},
      {:query_params => JSON.parse("{\"myParam\":[\"b and c\",\"d\"]}", :symbolize_names => true)}
    )

    assert_equal(:post, req.method)
    assert_equal("/test/requestOptions", req.path)
    assert_equal({:"query" => "parameters", :"myParam" => "b%20and%20c%2Cd"}.to_a, req.query_params.to_a)
    assert(({}.to_a - req.headers.to_a).empty?, req.headers.to_s)
    assert_equal(JSON.parse("{\"facet\":\"filters\"}"), JSON.parse(req.body))
  end

  # requestOptions queryParameters accepts list of booleans
  def test_custom_post9
    req = @client.custom_post_with_http_info(
      "test/requestOptions",
      {query: "parameters"},
      {facet: "filters"},
      {:query_params => JSON.parse("{\"myParam\":[true,true,false]}", :symbolize_names => true)}
    )

    assert_equal(:post, req.method)
    assert_equal("/test/requestOptions", req.path)
    assert_equal({:"query" => "parameters", :"myParam" => "true%2Ctrue%2Cfalse"}.to_a, req.query_params.to_a)
    assert(({}.to_a - req.headers.to_a).empty?, req.headers.to_s)
    assert_equal(JSON.parse("{\"facet\":\"filters\"}"), JSON.parse(req.body))
  end

  # requestOptions queryParameters accepts list of integers
  def test_custom_post10
    req = @client.custom_post_with_http_info(
      "test/requestOptions",
      {query: "parameters"},
      {facet: "filters"},
      {:query_params => JSON.parse("{\"myParam\":[1,2]}", :symbolize_names => true)}
    )

    assert_equal(:post, req.method)
    assert_equal("/test/requestOptions", req.path)
    assert_equal({:"query" => "parameters", :"myParam" => "1%2C2"}.to_a, req.query_params.to_a)
    assert(({}.to_a - req.headers.to_a).empty?, req.headers.to_s)
    assert_equal(JSON.parse("{\"facet\":\"filters\"}"), JSON.parse(req.body))
  end

  # allow put method for a custom path with minimal parameters
  def test_custom_put
    req = @client.custom_put_with_http_info("test/minimal")

    assert_equal(:put, req.method)
    assert_equal("/test/minimal", req.path)
    assert_equal({}.to_a, req.query_params.to_a)
    assert(({}.to_a - req.headers.to_a).empty?, req.headers.to_s)
    assert_equal(JSON.parse("{}"), JSON.parse(req.body))
  end

  # allow put method for a custom path with all parameters
  def test_custom_put1
    req = @client.custom_put_with_http_info("test/all", {query: "parameters"}, {body: "parameters"})

    assert_equal(:put, req.method)
    assert_equal("/test/all", req.path)
    assert_equal({:"query" => "parameters"}.to_a, req.query_params.to_a)
    assert(({}.to_a - req.headers.to_a).empty?, req.headers.to_s)
    assert_equal(JSON.parse("{\"body\":\"parameters\"}"), JSON.parse(req.body))
  end

  # deleteConfig
  def test_delete_config
    req = @client.delete_config_with_http_info("theIndexName")

    assert_equal(:delete, req.method)
    assert_equal("/1/configs/theIndexName", req.path)
    assert_equal({}.to_a, req.query_params.to_a)
    assert(({}.to_a - req.headers.to_a).empty?, req.headers.to_s)

    assert(req.body.nil?, "body is not nil")
  end

  # getAllConfigs
  def test_get_all_configs
    req = @client.get_all_configs_with_http_info

    assert_equal(:get, req.method)
    assert_equal("/1/configs", req.path)
    assert_equal({}.to_a, req.query_params.to_a)
    assert(({}.to_a - req.headers.to_a).empty?, req.headers.to_s)

    assert(req.body.nil?, "body is not nil")
  end

  # Retrieve QS config e2e
  def test_get_config
    req = @client.get_config_with_http_info("cts_e2e_browse_query_suggestions")

    assert_equal(:get, req.method)
    assert_equal("/1/configs/cts_e2e_browse_query_suggestions", req.path)
    assert_equal({}.to_a, req.query_params.to_a)
    assert(({}.to_a - req.headers.to_a).empty?, req.headers.to_s)

    assert(req.body.nil?, "body is not nil")
  end

  # getConfigStatus
  def test_get_config_status
    req = @client.get_config_status_with_http_info("theIndexName")

    assert_equal(:get, req.method)
    assert_equal("/1/configs/theIndexName/status", req.path)
    assert_equal({}.to_a, req.query_params.to_a)
    assert(({}.to_a - req.headers.to_a).empty?, req.headers.to_s)

    assert(req.body.nil?, "body is not nil")
  end

  # getLogFile
  def test_get_log_file
    req = @client.get_log_file_with_http_info("theIndexName")

    assert_equal(:get, req.method)
    assert_equal("/1/logs/theIndexName", req.path)
    assert_equal({}.to_a, req.query_params.to_a)
    assert(({}.to_a - req.headers.to_a).empty?, req.headers.to_s)

    assert(req.body.nil?, "body is not nil")
  end

  # updateConfig
  def test_update_config
    req = @client.update_config_with_http_info(
      "theIndexName",
      Algolia::QuerySuggestions::Configuration.new(
        source_indices: [
          Algolia::QuerySuggestions::SourceIndex.new(
            index_name: "testIndex",
            facets: [Algolia::QuerySuggestions::Facet.new(attribute: "test")],
            generate: [["facetA", "facetB"], ["facetC"]]
          )
        ],
        languages: ["french"],
        exclude: ["test"]
      )
    )

    assert_equal(:put, req.method)
    assert_equal("/1/configs/theIndexName", req.path)
    assert_equal({}.to_a, req.query_params.to_a)
    assert(({}.to_a - req.headers.to_a).empty?, req.headers.to_s)
    assert_equal(
      JSON.parse(
        "{\"sourceIndices\":[{\"indexName\":\"testIndex\",\"facets\":[{\"attribute\":\"test\"}],\"generate\":[[\"facetA\",\"facetB\"],[\"facetC\"]]}],\"languages\":[\"french\"],\"exclude\":[\"test\"]}"
      ),
      JSON.parse(req.body)
    )
  end

end
