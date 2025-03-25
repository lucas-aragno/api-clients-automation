# Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT.
require "algolia"
require "test/unit"

class TestClientAnalyticsClient < Test::Unit::TestCase
  # calls api with correct user agent
  def test_common_api0
    client = Algolia::AnalyticsClient.create(
      "APP_ID",
      "API_KEY",
      "us",
      {requester: Algolia::Transport::EchoRequester.new}
    )
    req = client.custom_post_with_http_info("1/test")
    assert(
      req.headers["user-agent"].match(
        /^Algolia for Ruby \(\d+\.\d+\.\d+(-?.*)?\)(; [a-zA-Z. ]+ (\(\d+((\.\d+)?\.\d+)?(-?.*)?\))?)*(; Analytics (\(\d+\.\d+\.\d+(-?.*)?\)))(; [a-zA-Z. ]+ (\(\d+((\.\d+)?\.\d+)?(-?.*)?\))?)*$/
      )
    )
  end

  # the user agent contains the latest version
  def test_common_api1
    client = Algolia::AnalyticsClient.create(
      "APP_ID",
      "API_KEY",
      "us",
      {requester: Algolia::Transport::EchoRequester.new}
    )
    req = client.custom_post_with_http_info("1/test")
    assert(req.headers["user-agent"].match(/^Algolia for Ruby \(3.15.0\).*/))
  end

  # fallbacks to the alias when region is not given
  def test_parameters0

    client = Algolia::AnalyticsClient.create(
      "my-app-id",
      "my-api-key",

      {requester: Algolia::Transport::EchoRequester.new}
    )
    req = client.get_average_click_position_with_http_info("my-index")
    assert_equal("analytics.algolia.com", req.host.url)
  end

  # uses the correct region
  def test_parameters1

    client = Algolia::AnalyticsClient.create(
      "my-app-id",
      "my-api-key",
      "de",
      {requester: Algolia::Transport::EchoRequester.new}
    )
    req = client.custom_post_with_http_info("test")
    assert_equal("analytics.de.algolia.com", req.host.url)
  end

  # throws when incorrect region is given
  def test_parameters2
    begin

      Algolia::AnalyticsClient.create(
        "my-app-id",
        "my-api-key",
        "not_a_region",
        {requester: Algolia::Transport::EchoRequester.new}
      )
      assert(false, "An error should have been raised")
    rescue => e
      assert_equal(
        "`region` must be one of the following: de, us".sub(
          "%localhost%",
          ENV.fetch("CI", nil) == "true" ? "localhost" : "host.docker.internal"
        ),
        e.message
      )
    end
  end

  # getAverageClickPosition throws without index
  def test_parameters3
    client = Algolia::AnalyticsClient.create(
      "APP_ID",
      "API_KEY",
      "us",
      {requester: Algolia::Transport::EchoRequester.new}
    )
    begin
      client.get_click_positions_with_http_info(nil)
      assert(false, "An error should have been raised")
    rescue => e
      assert_equal(
        "Parameter `index` is required when calling `get_click_positions`.".sub(
          "%localhost%",
          ENV.fetch("CI", nil) == "true" ? "localhost" : "host.docker.internal"
        ),
        e.message
      )
    end
  end

  # switch API key
  def test_set_client_api_key0
    client = Algolia::AnalyticsClient.create_with_config(
      Algolia::Configuration.new(
        "test-app-id",
        "test-api-key",
        [
          Algolia::Transport::StatefulHost.new(
            ENV.fetch("CI", nil) == "true" ? "localhost" : "host.docker.internal",
            protocol: "http://",
            port: 6683,
            accept: CallType::READ | CallType::WRITE
          )
        ],
        "analyticsClient"
      )
    )
    req = client.custom_get("check-api-key/1")
    assert_equal({:"headerAPIKeyValue" => "test-api-key"}, req.is_a?(Array) ? req.map(&:to_hash) : req.to_hash)
    client.set_client_api_key("updated-api-key")
    req = client.custom_get("check-api-key/2")
    assert_equal({:"headerAPIKeyValue" => "updated-api-key"}, req.is_a?(Array) ? req.map(&:to_hash) : req.to_hash)
  end

end
