# Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT.
# >IMPORT
require "algolia"

# IMPORT<

# Snippet for the addABTests method.
#
# addABTests with minimal parameters
def snippet_for_add_ab_tests
  # >SEPARATOR addABTests default
  # Initialize the client
  client = Algolia::AbtestingClient.create("ALGOLIA_APPLICATION_ID", "ALGOLIA_API_KEY", "ALGOLIA_APPLICATION_REGION")

  # Call the API
  response = client.add_ab_tests(
    Algolia::Abtesting::AddABTestsRequest.new(
      end_at: "2022-12-31T00:00:00.000Z",
      name: "myABTest",
      variants: [
        Algolia::Abtesting::AbTestsVariant.new(index: "AB_TEST_1", traffic_percentage: 30),
        Algolia::Abtesting::AbTestsVariant.new(index: "AB_TEST_2", traffic_percentage: 50)
      ]
    )
  )

  # >LOG
  # use the class directly
  puts(response)

  # print the JSON response
  puts(response.to_json)
  # SEPARATOR<
end

# Snippet for the customDelete method.
#
# allow del method for a custom path with minimal parameters
def snippet_for_custom_delete
  # >SEPARATOR customDelete allow del method for a custom path with minimal parameters
  # Initialize the client
  client = Algolia::AbtestingClient.create("ALGOLIA_APPLICATION_ID", "ALGOLIA_API_KEY", "ALGOLIA_APPLICATION_REGION")

  # Call the API
  response = client.custom_delete("test/minimal")

  # >LOG
  # use the class directly
  puts(response)

  # print the JSON response
  puts(response.to_json)
  # SEPARATOR<
end

# Snippet for the customDelete method.
#
# allow del method for a custom path with all parameters
def snippet_for_custom_delete1
  # >SEPARATOR customDelete allow del method for a custom path with all parameters
  # Initialize the client
  client = Algolia::AbtestingClient.create("ALGOLIA_APPLICATION_ID", "ALGOLIA_API_KEY", "ALGOLIA_APPLICATION_REGION")

  # Call the API
  response = client.custom_delete("test/all", {query: "parameters"})

  # >LOG
  # use the class directly
  puts(response)

  # print the JSON response
  puts(response.to_json)
  # SEPARATOR<
end

# Snippet for the customGet method.
#
# allow get method for a custom path with minimal parameters
def snippet_for_custom_get
  # >SEPARATOR customGet allow get method for a custom path with minimal parameters
  # Initialize the client
  client = Algolia::AbtestingClient.create("ALGOLIA_APPLICATION_ID", "ALGOLIA_API_KEY", "ALGOLIA_APPLICATION_REGION")

  # Call the API
  response = client.custom_get("test/minimal")

  # >LOG
  # use the class directly
  puts(response)

  # print the JSON response
  puts(response.to_json)
  # SEPARATOR<
end

# Snippet for the customGet method.
#
# allow get method for a custom path with all parameters
def snippet_for_custom_get1
  # >SEPARATOR customGet allow get method for a custom path with all parameters
  # Initialize the client
  client = Algolia::AbtestingClient.create("ALGOLIA_APPLICATION_ID", "ALGOLIA_API_KEY", "ALGOLIA_APPLICATION_REGION")

  # Call the API
  response = client.custom_get("test/all", {query: "parameters with space"})

  # >LOG
  # use the class directly
  puts(response)

  # print the JSON response
  puts(response.to_json)
  # SEPARATOR<
end

# Snippet for the customGet method.
#
# requestOptions should be escaped too
def snippet_for_custom_get2
  # >SEPARATOR customGet requestOptions should be escaped too
  # Initialize the client
  client = Algolia::AbtestingClient.create("ALGOLIA_APPLICATION_ID", "ALGOLIA_API_KEY", "ALGOLIA_APPLICATION_REGION")

  # Call the API
  response = client.custom_get(
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

  # >LOG
  # use the class directly
  puts(response)

  # print the JSON response
  puts(response.to_json)
  # SEPARATOR<
end

# Snippet for the customPost method.
#
# allow post method for a custom path with minimal parameters
def snippet_for_custom_post
  # >SEPARATOR customPost allow post method for a custom path with minimal parameters
  # Initialize the client
  client = Algolia::AbtestingClient.create("ALGOLIA_APPLICATION_ID", "ALGOLIA_API_KEY", "ALGOLIA_APPLICATION_REGION")

  # Call the API
  response = client.custom_post("test/minimal")

  # >LOG
  # use the class directly
  puts(response)

  # print the JSON response
  puts(response.to_json)
  # SEPARATOR<
end

# Snippet for the customPost method.
#
# allow post method for a custom path with all parameters
def snippet_for_custom_post1
  # >SEPARATOR customPost allow post method for a custom path with all parameters
  # Initialize the client
  client = Algolia::AbtestingClient.create("ALGOLIA_APPLICATION_ID", "ALGOLIA_API_KEY", "ALGOLIA_APPLICATION_REGION")

  # Call the API
  response = client.custom_post("test/all", {query: "parameters"}, {body: "parameters"})

  # >LOG
  # use the class directly
  puts(response)

  # print the JSON response
  puts(response.to_json)
  # SEPARATOR<
end

# Snippet for the customPost method.
#
# requestOptions can override default query parameters
def snippet_for_custom_post2
  # >SEPARATOR customPost requestOptions can override default query parameters
  # Initialize the client
  client = Algolia::AbtestingClient.create("ALGOLIA_APPLICATION_ID", "ALGOLIA_API_KEY", "ALGOLIA_APPLICATION_REGION")

  # Call the API
  response = client.custom_post(
    "test/requestOptions",
    {query: "parameters"},
    {facet: "filters"},
    {:query_params => JSON.parse("{\"query\":\"myQueryParameter\"}", :symbolize_names => true)}
  )

  # >LOG
  # use the class directly
  puts(response)

  # print the JSON response
  puts(response.to_json)
  # SEPARATOR<
end

# Snippet for the customPost method.
#
# requestOptions merges query parameters with default ones
def snippet_for_custom_post3
  # >SEPARATOR customPost requestOptions merges query parameters with default ones
  # Initialize the client
  client = Algolia::AbtestingClient.create("ALGOLIA_APPLICATION_ID", "ALGOLIA_API_KEY", "ALGOLIA_APPLICATION_REGION")

  # Call the API
  response = client.custom_post(
    "test/requestOptions",
    {query: "parameters"},
    {facet: "filters"},
    {:query_params => JSON.parse("{\"query2\":\"myQueryParameter\"}", :symbolize_names => true)}
  )

  # >LOG
  # use the class directly
  puts(response)

  # print the JSON response
  puts(response.to_json)
  # SEPARATOR<
end

# Snippet for the customPost method.
#
# requestOptions can override default headers
def snippet_for_custom_post4
  # >SEPARATOR customPost requestOptions can override default headers
  # Initialize the client
  client = Algolia::AbtestingClient.create("ALGOLIA_APPLICATION_ID", "ALGOLIA_API_KEY", "ALGOLIA_APPLICATION_REGION")

  # Call the API
  response = client.custom_post(
    "test/requestOptions",
    {query: "parameters"},
    {facet: "filters"},
    {:header_params => {"x-algolia-api-key" => "ALGOLIA_API_KEY"}}
  )

  # >LOG
  # use the class directly
  puts(response)

  # print the JSON response
  puts(response.to_json)
  # SEPARATOR<
end

# Snippet for the customPost method.
#
# requestOptions merges headers with default ones
def snippet_for_custom_post5
  # >SEPARATOR customPost requestOptions merges headers with default ones
  # Initialize the client
  client = Algolia::AbtestingClient.create("ALGOLIA_APPLICATION_ID", "ALGOLIA_API_KEY", "ALGOLIA_APPLICATION_REGION")

  # Call the API
  response = client.custom_post(
    "test/requestOptions",
    {query: "parameters"},
    {facet: "filters"},
    {:header_params => {"x-algolia-api-key" => "ALGOLIA_API_KEY"}}
  )

  # >LOG
  # use the class directly
  puts(response)

  # print the JSON response
  puts(response.to_json)
  # SEPARATOR<
end

# Snippet for the customPost method.
#
# requestOptions queryParameters accepts booleans
def snippet_for_custom_post6
  # >SEPARATOR customPost requestOptions queryParameters accepts booleans
  # Initialize the client
  client = Algolia::AbtestingClient.create("ALGOLIA_APPLICATION_ID", "ALGOLIA_API_KEY", "ALGOLIA_APPLICATION_REGION")

  # Call the API
  response = client.custom_post(
    "test/requestOptions",
    {query: "parameters"},
    {facet: "filters"},
    {:query_params => JSON.parse("{\"isItWorking\":true}", :symbolize_names => true)}
  )

  # >LOG
  # use the class directly
  puts(response)

  # print the JSON response
  puts(response.to_json)
  # SEPARATOR<
end

# Snippet for the customPost method.
#
# requestOptions queryParameters accepts integers
def snippet_for_custom_post7
  # >SEPARATOR customPost requestOptions queryParameters accepts integers
  # Initialize the client
  client = Algolia::AbtestingClient.create("ALGOLIA_APPLICATION_ID", "ALGOLIA_API_KEY", "ALGOLIA_APPLICATION_REGION")

  # Call the API
  response = client.custom_post(
    "test/requestOptions",
    {query: "parameters"},
    {facet: "filters"},
    {:query_params => JSON.parse("{\"myParam\":2}", :symbolize_names => true)}
  )

  # >LOG
  # use the class directly
  puts(response)

  # print the JSON response
  puts(response.to_json)
  # SEPARATOR<
end

# Snippet for the customPost method.
#
# requestOptions queryParameters accepts list of string
def snippet_for_custom_post8
  # >SEPARATOR customPost requestOptions queryParameters accepts list of string
  # Initialize the client
  client = Algolia::AbtestingClient.create("ALGOLIA_APPLICATION_ID", "ALGOLIA_API_KEY", "ALGOLIA_APPLICATION_REGION")

  # Call the API
  response = client.custom_post(
    "test/requestOptions",
    {query: "parameters"},
    {facet: "filters"},
    {:query_params => JSON.parse("{\"myParam\":[\"b and c\",\"d\"]}", :symbolize_names => true)}
  )

  # >LOG
  # use the class directly
  puts(response)

  # print the JSON response
  puts(response.to_json)
  # SEPARATOR<
end

# Snippet for the customPost method.
#
# requestOptions queryParameters accepts list of booleans
def snippet_for_custom_post9
  # >SEPARATOR customPost requestOptions queryParameters accepts list of booleans
  # Initialize the client
  client = Algolia::AbtestingClient.create("ALGOLIA_APPLICATION_ID", "ALGOLIA_API_KEY", "ALGOLIA_APPLICATION_REGION")

  # Call the API
  response = client.custom_post(
    "test/requestOptions",
    {query: "parameters"},
    {facet: "filters"},
    {:query_params => JSON.parse("{\"myParam\":[true,true,false]}", :symbolize_names => true)}
  )

  # >LOG
  # use the class directly
  puts(response)

  # print the JSON response
  puts(response.to_json)
  # SEPARATOR<
end

# Snippet for the customPost method.
#
# requestOptions queryParameters accepts list of integers
def snippet_for_custom_post10
  # >SEPARATOR customPost requestOptions queryParameters accepts list of integers
  # Initialize the client
  client = Algolia::AbtestingClient.create("ALGOLIA_APPLICATION_ID", "ALGOLIA_API_KEY", "ALGOLIA_APPLICATION_REGION")

  # Call the API
  response = client.custom_post(
    "test/requestOptions",
    {query: "parameters"},
    {facet: "filters"},
    {:query_params => JSON.parse("{\"myParam\":[1,2]}", :symbolize_names => true)}
  )

  # >LOG
  # use the class directly
  puts(response)

  # print the JSON response
  puts(response.to_json)
  # SEPARATOR<
end

# Snippet for the customPut method.
#
# allow put method for a custom path with minimal parameters
def snippet_for_custom_put
  # >SEPARATOR customPut allow put method for a custom path with minimal parameters
  # Initialize the client
  client = Algolia::AbtestingClient.create("ALGOLIA_APPLICATION_ID", "ALGOLIA_API_KEY", "ALGOLIA_APPLICATION_REGION")

  # Call the API
  response = client.custom_put("test/minimal")

  # >LOG
  # use the class directly
  puts(response)

  # print the JSON response
  puts(response.to_json)
  # SEPARATOR<
end

# Snippet for the customPut method.
#
# allow put method for a custom path with all parameters
def snippet_for_custom_put1
  # >SEPARATOR customPut allow put method for a custom path with all parameters
  # Initialize the client
  client = Algolia::AbtestingClient.create("ALGOLIA_APPLICATION_ID", "ALGOLIA_API_KEY", "ALGOLIA_APPLICATION_REGION")

  # Call the API
  response = client.custom_put("test/all", {query: "parameters"}, {body: "parameters"})

  # >LOG
  # use the class directly
  puts(response)

  # print the JSON response
  puts(response.to_json)
  # SEPARATOR<
end

# Snippet for the deleteABTest method.
#
# deleteABTest
def snippet_for_delete_ab_test
  # >SEPARATOR deleteABTest default
  # Initialize the client
  client = Algolia::AbtestingClient.create("ALGOLIA_APPLICATION_ID", "ALGOLIA_API_KEY", "ALGOLIA_APPLICATION_REGION")

  # Call the API
  response = client.delete_ab_test(42)

  # >LOG
  # use the class directly
  puts(response)

  # print the JSON response
  puts(response.to_json)
  # SEPARATOR<
end

# Snippet for the estimateABTest method.
#
# estimate AB Test sample size
def snippet_for_estimate_ab_test
  # >SEPARATOR estimateABTest default
  # Initialize the client
  client = Algolia::AbtestingClient.create("ALGOLIA_APPLICATION_ID", "ALGOLIA_API_KEY", "ALGOLIA_APPLICATION_REGION")

  # Call the API
  response = client.estimate_ab_test(
    Algolia::Abtesting::EstimateABTestRequest.new(
      configuration: Algolia::Abtesting::EstimateConfiguration.new(
        empty_search: Algolia::Abtesting::EmptySearch.new(exclude: true),
        minimum_detectable_effect: Algolia::Abtesting::MinimumDetectableEffect.new(size: 0.03, metric: "conversionRate")
      ),
      variants: [
        Algolia::Abtesting::AbTestsVariant.new(index: "AB_TEST_1", traffic_percentage: 50),
        Algolia::Abtesting::AbTestsVariant.new(index: "AB_TEST_2", traffic_percentage: 50)
      ]
    )
  )

  # >LOG
  # use the class directly
  puts(response)

  # print the JSON response
  puts(response.to_json)
  # SEPARATOR<
end

# Snippet for the getABTest method.
#
# getABTest
def snippet_for_get_ab_test
  # >SEPARATOR getABTest default
  # Initialize the client
  client = Algolia::AbtestingClient.create("ALGOLIA_APPLICATION_ID", "ALGOLIA_API_KEY", "ALGOLIA_APPLICATION_REGION")

  # Call the API
  response = client.get_ab_test(42)

  # >LOG
  # use the class directly
  puts(response)

  # print the JSON response
  puts(response.to_json)
  # SEPARATOR<
end

# Snippet for the listABTests method.
#
# listABTests with minimal parameters
def snippet_for_list_ab_tests
  # >SEPARATOR listABTests listABTests with minimal parameters
  # Initialize the client
  client = Algolia::AbtestingClient.create("ALGOLIA_APPLICATION_ID", "ALGOLIA_API_KEY", "ALGOLIA_APPLICATION_REGION")

  # Call the API
  response = client.list_ab_tests

  # >LOG
  # use the class directly
  puts(response)

  # print the JSON response
  puts(response.to_json)
  # SEPARATOR<
end

# Snippet for the listABTests method.
#
# listABTests with parameters
def snippet_for_list_ab_tests1
  # >SEPARATOR listABTests listABTests with parameters
  # Initialize the client
  client = Algolia::AbtestingClient.create("ALGOLIA_APPLICATION_ID", "ALGOLIA_API_KEY", "ALGOLIA_APPLICATION_REGION")

  # Call the API
  response = client.list_ab_tests(0, 21, "cts_e2e ab", "t")

  # >LOG
  # use the class directly
  puts(response)

  # print the JSON response
  puts(response.to_json)
  # SEPARATOR<
end

# Snippet for the scheduleABTest method.
#
# scheduleABTest with minimal parameters
def snippet_for_schedule_ab_test
  # >SEPARATOR scheduleABTest default
  # Initialize the client
  client = Algolia::AbtestingClient.create("ALGOLIA_APPLICATION_ID", "ALGOLIA_API_KEY", "ALGOLIA_APPLICATION_REGION")

  # Call the API
  response = client.schedule_ab_test(
    Algolia::Abtesting::ScheduleABTestsRequest.new(
      end_at: "2022-12-31T00:00:00.000Z",
      scheduled_at: "2022-11-31T00:00:00.000Z",
      name: "myABTest",
      variants: [
        Algolia::Abtesting::AbTestsVariant.new(index: "AB_TEST_1", traffic_percentage: 30),
        Algolia::Abtesting::AbTestsVariant.new(index: "AB_TEST_2", traffic_percentage: 50)
      ]
    )
  )

  # >LOG
  # use the class directly
  puts(response)

  # print the JSON response
  puts(response.to_json)
  # SEPARATOR<
end

# Snippet for the setClientApiKey method.
#
# switch API key
def snippet_for_set_client_api_key
  # >SEPARATOR setClientApiKey default
  # Initialize the client
  client = Algolia::AbtestingClient.create("ALGOLIA_APPLICATION_ID", "ALGOLIA_API_KEY", "ALGOLIA_APPLICATION_REGION")

  # Call the API
  client.set_client_api_key("updated-api-key")
  # >LOG
  # SEPARATOR<
end

# Snippet for the stopABTest method.
#
# stopABTest
def snippet_for_stop_ab_test
  # >SEPARATOR stopABTest default
  # Initialize the client
  client = Algolia::AbtestingClient.create("ALGOLIA_APPLICATION_ID", "ALGOLIA_API_KEY", "ALGOLIA_APPLICATION_REGION")

  # Call the API
  response = client.stop_ab_test(42)

  # >LOG
  # use the class directly
  puts(response)

  # print the JSON response
  puts(response.to_json)
  # SEPARATOR<
end
