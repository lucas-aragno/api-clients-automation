//
// Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT.
//

using System;
using System.Collections.Generic;
using System.Net.Http;
using System.Threading;
using System.Threading.Tasks;
using Algolia.Search.Clients;
using Algolia.Search.Models;
using Algolia.Search.Models.Personalization;
using Algolia.Search.Transport;
using Algolia.Search.Http;

namespace Algolia.Search.Clients
{
  /// <summary>
  /// Represents a collection of functions to interact with the API endpoints
  /// </summary>
  public interface IPersonalizationClient
  {
    /// <summary>
    /// Send requests to the Algolia REST API.
    /// </summary>
    /// <remarks>
    /// This method allow you to send requests to the Algolia REST API.
    /// </remarks>
    /// <exception cref="Algolia.Search.Personalization.Client.ApiException">Thrown when fails to make API call</exception>
    /// <param name="path">Path of the endpoint, anything after \"/1\" must be specified.</param>
    /// <param name="parameters">Query parameters to apply to the current query. (optional)</param>
    /// <param name="options">Add extra http header or query parameters to Algolia.</param>
    /// <param name="cancellationToken">Cancellation Token to cancel the request.</param>
    /// <returns>Task of Object</returns>
    Task<Object> CustomDeleteAsync(string path, Dictionary<string, Object> parameters = default, RequestOptions options = null, CancellationToken cancellationToken = default);
    /// <summary>
    /// Send requests to the Algolia REST API.
    /// </summary>
    /// <remarks>
    /// This method allow you to send requests to the Algolia REST API.
    /// </remarks>
    /// <exception cref="Algolia.Search.Personalization.Client.ApiException">Thrown when fails to make API call</exception>
    /// <param name="path">Path of the endpoint, anything after \"/1\" must be specified.</param>
    /// <param name="parameters">Query parameters to apply to the current query. (optional)</param>
    /// <param name="options">Add extra http header or query parameters to Algolia.</param>
    /// <param name="cancellationToken">Cancellation Token to cancel the request.</param>
    /// <returns>Task of Object</returns>
    Task<Object> CustomGetAsync(string path, Dictionary<string, Object> parameters = default, RequestOptions options = null, CancellationToken cancellationToken = default);
    /// <summary>
    /// Send requests to the Algolia REST API.
    /// </summary>
    /// <remarks>
    /// This method allow you to send requests to the Algolia REST API.
    /// </remarks>
    /// <exception cref="Algolia.Search.Personalization.Client.ApiException">Thrown when fails to make API call</exception>
    /// <param name="path">Path of the endpoint, anything after \"/1\" must be specified.</param>
    /// <param name="parameters">Query parameters to apply to the current query. (optional)</param>
    /// <param name="body">Parameters to send with the custom request. (optional)</param>
    /// <param name="options">Add extra http header or query parameters to Algolia.</param>
    /// <param name="cancellationToken">Cancellation Token to cancel the request.</param>
    /// <returns>Task of Object</returns>
    Task<Object> CustomPostAsync(string path, Dictionary<string, Object> parameters = default, Object body = default, RequestOptions options = null, CancellationToken cancellationToken = default);
    /// <summary>
    /// Send requests to the Algolia REST API.
    /// </summary>
    /// <remarks>
    /// This method allow you to send requests to the Algolia REST API.
    /// </remarks>
    /// <exception cref="Algolia.Search.Personalization.Client.ApiException">Thrown when fails to make API call</exception>
    /// <param name="path">Path of the endpoint, anything after \"/1\" must be specified.</param>
    /// <param name="parameters">Query parameters to apply to the current query. (optional)</param>
    /// <param name="body">Parameters to send with the custom request. (optional)</param>
    /// <param name="options">Add extra http header or query parameters to Algolia.</param>
    /// <param name="cancellationToken">Cancellation Token to cancel the request.</param>
    /// <returns>Task of Object</returns>
    Task<Object> CustomPutAsync(string path, Dictionary<string, Object> parameters = default, Object body = default, RequestOptions options = null, CancellationToken cancellationToken = default);
    /// <summary>
    /// Delete a user profile.
    /// </summary>
    /// <remarks>
    /// Delete the user profile and all its associated data.  Returns, as part of the response, a date until which the data can safely be considered as deleted for the given user. This means if you send events for the given user before this date, they will be ignored. Any data received after the deletedUntil date will start building a new user profile.  It might take a couple hours for the deletion request to be fully processed. 
    /// </remarks>
    /// <exception cref="Algolia.Search.Personalization.Client.ApiException">Thrown when fails to make API call</exception>
    /// <param name="userToken">userToken representing the user for which to fetch the Personalization profile.</param>
    /// <param name="options">Add extra http header or query parameters to Algolia.</param>
    /// <param name="cancellationToken">Cancellation Token to cancel the request.</param>
    /// <returns>Task of DeleteUserProfileResponse</returns>
    Task<DeleteUserProfileResponse> DeleteUserProfileAsync(string userToken, RequestOptions options = null, CancellationToken cancellationToken = default);
    /// <summary>
    /// Get the current strategy.
    /// </summary>
    /// <remarks>
    /// The strategy contains information on the events and facets that impact user profiles and personalized search results.
    /// </remarks>
    /// <exception cref="Algolia.Search.Personalization.Client.ApiException">Thrown when fails to make API call</exception>
    /// <param name="options">Add extra http header or query parameters to Algolia.</param>
    /// <param name="cancellationToken">Cancellation Token to cancel the request.</param>
    /// <returns>Task of PersonalizationStrategyParams</returns>
    Task<PersonalizationStrategyParams> GetPersonalizationStrategyAsync(RequestOptions options = null, CancellationToken cancellationToken = default);
    /// <summary>
    /// Get a user profile.
    /// </summary>
    /// <remarks>
    /// Get the user profile built from Personalization strategy.  The profile is structured by facet name used in the strategy. Each facet value is mapped to its score. Each score represents the user affinity for a specific facet value given the userToken past events and the Personalization strategy defined. Scores are bounded to 20. The last processed event timestamp is provided using the ISO 8601 format for debugging purposes. 
    /// </remarks>
    /// <exception cref="Algolia.Search.Personalization.Client.ApiException">Thrown when fails to make API call</exception>
    /// <param name="userToken">userToken representing the user for which to fetch the Personalization profile.</param>
    /// <param name="options">Add extra http header or query parameters to Algolia.</param>
    /// <param name="cancellationToken">Cancellation Token to cancel the request.</param>
    /// <returns>Task of GetUserTokenResponse</returns>
    Task<GetUserTokenResponse> GetUserTokenProfileAsync(string userToken, RequestOptions options = null, CancellationToken cancellationToken = default);
    /// <summary>
    /// Set a new strategy.
    /// </summary>
    /// <remarks>
    /// A strategy defines the events and facets that impact user profiles and personalized search results.
    /// </remarks>
    /// <exception cref="Algolia.Search.Personalization.Client.ApiException">Thrown when fails to make API call</exception>
    /// <param name="personalizationStrategyParams"></param>
    /// <param name="options">Add extra http header or query parameters to Algolia.</param>
    /// <param name="cancellationToken">Cancellation Token to cancel the request.</param>
    /// <returns>Task of SetPersonalizationStrategyResponse</returns>
    Task<SetPersonalizationStrategyResponse> SetPersonalizationStrategyAsync(PersonalizationStrategyParams personalizationStrategyParams, RequestOptions options = null, CancellationToken cancellationToken = default);
  }


  /// <summary>
  /// Represents a collection of functions to interact with the API endpoints
  /// </summary>
  public partial class PersonalizationClient : IPersonalizationClient
  {
    private readonly HttpTransport _transport;
    private readonly AlgoliaConfig _config;

    /// <summary>
    /// Create a new Personalization client for the given appID and apiKey.
    /// </summary>
    /// <param name="applicationId">Your application</param>
    /// <param name="apiKey">Your API key</param>
    /// <param name="region">The targeted region</param>
    public PersonalizationClient(string applicationId, string apiKey, string region) : this(new PersonalizationConfig(applicationId, apiKey, region), new AlgoliaHttpRequester())
    {
    }

    /// <summary>
    /// Initialize a client with custom config
    /// </summary>
    /// <param name="config">Algolia configuration</param>
    public PersonalizationClient(PersonalizationConfig config) : this(config, new AlgoliaHttpRequester())
    {
    }

    /// <summary>
    /// Initialize the client with custom config and custom Requester
    /// </summary>
    /// <param name="config">Algolia Config</param>
    /// <param name="httpRequester">Your Http requester implementation of <see cref="IHttpRequester"/></param>
    public PersonalizationClient(PersonalizationConfig config, IHttpRequester httpRequester)
    {
      if (httpRequester == null)
      {
        throw new ArgumentNullException(nameof(httpRequester), "An httpRequester is required");
      }
      if (config == null)
      {
        throw new ArgumentNullException(nameof(config), "A config is required");
      }
      if (string.IsNullOrWhiteSpace(config.AppId))
      {
        throw new ArgumentNullException(nameof(config.AppId), "Application ID is required");
      }
      if (string.IsNullOrWhiteSpace(config.ApiKey))
      {
        throw new ArgumentNullException(nameof(config.ApiKey), "An API key is required");
      }

      _config = config;
      _transport = new HttpTransport(config, httpRequester);
    }


    /// <summary>
    /// Send requests to the Algolia REST API. This method allow you to send requests to the Algolia REST API.
    /// </summary>
    /// <exception cref="Algolia.Search.Personalization.Client.ApiException">Thrown when fails to make API call</exception>
    /// <param name="path">Path of the endpoint, anything after \&quot;/1\&quot; must be specified.</param>
    /// <param name="parameters">Query parameters to apply to the current query. (optional)</param>
    /// <param name="options">Add extra http header or query parameters to Algolia.</param>
    /// <param name="cancellationToken">Cancellation Token to cancel the request.</param>
    /// <returns>Task of Object</returns>
    public async Task<Object> CustomDeleteAsync(string path, Dictionary<string, Object> parameters = default, RequestOptions options = null, CancellationToken cancellationToken = default)
    {
      if (path == null)
        throw new ApiException(400, "Missing required parameter 'path' when calling PersonalizationClient->CustomDelete");

      var requestOptions = new InternalRequestOptions(options);
      requestOptions.CustomPathParameters.Add("path", ClientUtils.ParameterToString(path));

      requestOptions.AddCustomQueryParameters(parameters);
      return await _transport.ExecuteRequestAsync<Object>(new HttpMethod("DELETE"), "/1{path}", requestOptions, cancellationToken).ConfigureAwait(false);
    }

    /// <summary>
    /// Send requests to the Algolia REST API. This method allow you to send requests to the Algolia REST API.
    /// </summary>
    /// <exception cref="Algolia.Search.Personalization.Client.ApiException">Thrown when fails to make API call</exception>
    /// <param name="path">Path of the endpoint, anything after \&quot;/1\&quot; must be specified.</param>
    /// <param name="parameters">Query parameters to apply to the current query. (optional)</param>
    /// <param name="options">Add extra http header or query parameters to Algolia.</param>
    /// <param name="cancellationToken">Cancellation Token to cancel the request.</param>
    /// <returns>Task of Object</returns>
    public async Task<Object> CustomGetAsync(string path, Dictionary<string, Object> parameters = default, RequestOptions options = null, CancellationToken cancellationToken = default)
    {
      if (path == null)
        throw new ApiException(400, "Missing required parameter 'path' when calling PersonalizationClient->CustomGet");

      var requestOptions = new InternalRequestOptions(options);
      requestOptions.CustomPathParameters.Add("path", ClientUtils.ParameterToString(path));

      requestOptions.AddCustomQueryParameters(parameters);
      return await _transport.ExecuteRequestAsync<Object>(new HttpMethod("GET"), "/1{path}", requestOptions, cancellationToken).ConfigureAwait(false);
    }

    /// <summary>
    /// Send requests to the Algolia REST API. This method allow you to send requests to the Algolia REST API.
    /// </summary>
    /// <exception cref="Algolia.Search.Personalization.Client.ApiException">Thrown when fails to make API call</exception>
    /// <param name="path">Path of the endpoint, anything after \&quot;/1\&quot; must be specified.</param>
    /// <param name="parameters">Query parameters to apply to the current query. (optional)</param>
    /// <param name="body">Parameters to send with the custom request. (optional)</param>
    /// <param name="options">Add extra http header or query parameters to Algolia.</param>
    /// <param name="cancellationToken">Cancellation Token to cancel the request.</param>
    /// <returns>Task of Object</returns>
    public async Task<Object> CustomPostAsync(string path, Dictionary<string, Object> parameters = default, Object body = default, RequestOptions options = null, CancellationToken cancellationToken = default)
    {
      if (path == null)
        throw new ApiException(400, "Missing required parameter 'path' when calling PersonalizationClient->CustomPost");

      var requestOptions = new InternalRequestOptions(options);
      requestOptions.CustomPathParameters.Add("path", ClientUtils.ParameterToString(path));

      requestOptions.AddCustomQueryParameters(parameters);
      requestOptions.Data = body;
      return await _transport.ExecuteRequestAsync<Object>(new HttpMethod("POST"), "/1{path}", requestOptions, cancellationToken).ConfigureAwait(false);
    }

    /// <summary>
    /// Send requests to the Algolia REST API. This method allow you to send requests to the Algolia REST API.
    /// </summary>
    /// <exception cref="Algolia.Search.Personalization.Client.ApiException">Thrown when fails to make API call</exception>
    /// <param name="path">Path of the endpoint, anything after \&quot;/1\&quot; must be specified.</param>
    /// <param name="parameters">Query parameters to apply to the current query. (optional)</param>
    /// <param name="body">Parameters to send with the custom request. (optional)</param>
    /// <param name="options">Add extra http header or query parameters to Algolia.</param>
    /// <param name="cancellationToken">Cancellation Token to cancel the request.</param>
    /// <returns>Task of Object</returns>
    public async Task<Object> CustomPutAsync(string path, Dictionary<string, Object> parameters = default, Object body = default, RequestOptions options = null, CancellationToken cancellationToken = default)
    {
      if (path == null)
        throw new ApiException(400, "Missing required parameter 'path' when calling PersonalizationClient->CustomPut");

      var requestOptions = new InternalRequestOptions(options);
      requestOptions.CustomPathParameters.Add("path", ClientUtils.ParameterToString(path));

      requestOptions.AddCustomQueryParameters(parameters);
      requestOptions.Data = body;
      return await _transport.ExecuteRequestAsync<Object>(new HttpMethod("PUT"), "/1{path}", requestOptions, cancellationToken).ConfigureAwait(false);
    }

    /// <summary>
    /// Delete a user profile. Delete the user profile and all its associated data.  Returns, as part of the response, a date until which the data can safely be considered as deleted for the given user. This means if you send events for the given user before this date, they will be ignored. Any data received after the deletedUntil date will start building a new user profile.  It might take a couple hours for the deletion request to be fully processed. 
    /// </summary>
    /// <exception cref="Algolia.Search.Personalization.Client.ApiException">Thrown when fails to make API call</exception>
    /// <param name="userToken">userToken representing the user for which to fetch the Personalization profile.</param>
    /// <param name="options">Add extra http header or query parameters to Algolia.</param>
    /// <param name="cancellationToken">Cancellation Token to cancel the request.</param>
    /// <returns>Task of DeleteUserProfileResponse</returns>
    public async Task<DeleteUserProfileResponse> DeleteUserProfileAsync(string userToken, RequestOptions options = null, CancellationToken cancellationToken = default)
    {
      if (userToken == null)
        throw new ApiException(400, "Missing required parameter 'userToken' when calling PersonalizationClient->DeleteUserProfile");

      var requestOptions = new InternalRequestOptions(options);

      requestOptions.PathParameters.Add("userToken", ClientUtils.ParameterToString(userToken));

      return await _transport.ExecuteRequestAsync<DeleteUserProfileResponse>(new HttpMethod("DELETE"), "/1/profiles/{userToken}", requestOptions, cancellationToken).ConfigureAwait(false);
    }

    /// <summary>
    /// Get the current strategy. The strategy contains information on the events and facets that impact user profiles and personalized search results.
    /// </summary>
    /// <exception cref="Algolia.Search.Personalization.Client.ApiException">Thrown when fails to make API call</exception>
    /// <param name="options">Add extra http header or query parameters to Algolia.</param>
    /// <param name="cancellationToken">Cancellation Token to cancel the request.</param>
    /// <returns>Task of PersonalizationStrategyParams</returns>
    public async Task<PersonalizationStrategyParams> GetPersonalizationStrategyAsync(RequestOptions options = null, CancellationToken cancellationToken = default)
    {
      var requestOptions = new InternalRequestOptions(options);


      return await _transport.ExecuteRequestAsync<PersonalizationStrategyParams>(new HttpMethod("GET"), "/1/strategies/personalization", requestOptions, cancellationToken).ConfigureAwait(false);
    }

    /// <summary>
    /// Get a user profile. Get the user profile built from Personalization strategy.  The profile is structured by facet name used in the strategy. Each facet value is mapped to its score. Each score represents the user affinity for a specific facet value given the userToken past events and the Personalization strategy defined. Scores are bounded to 20. The last processed event timestamp is provided using the ISO 8601 format for debugging purposes. 
    /// </summary>
    /// <exception cref="Algolia.Search.Personalization.Client.ApiException">Thrown when fails to make API call</exception>
    /// <param name="userToken">userToken representing the user for which to fetch the Personalization profile.</param>
    /// <param name="options">Add extra http header or query parameters to Algolia.</param>
    /// <param name="cancellationToken">Cancellation Token to cancel the request.</param>
    /// <returns>Task of GetUserTokenResponse</returns>
    public async Task<GetUserTokenResponse> GetUserTokenProfileAsync(string userToken, RequestOptions options = null, CancellationToken cancellationToken = default)
    {
      if (userToken == null)
        throw new ApiException(400, "Missing required parameter 'userToken' when calling PersonalizationClient->GetUserTokenProfile");

      var requestOptions = new InternalRequestOptions(options);

      requestOptions.PathParameters.Add("userToken", ClientUtils.ParameterToString(userToken));

      return await _transport.ExecuteRequestAsync<GetUserTokenResponse>(new HttpMethod("GET"), "/1/profiles/personalization/{userToken}", requestOptions, cancellationToken).ConfigureAwait(false);
    }

    /// <summary>
    /// Set a new strategy. A strategy defines the events and facets that impact user profiles and personalized search results.
    /// </summary>
    /// <exception cref="Algolia.Search.Personalization.Client.ApiException">Thrown when fails to make API call</exception>
    /// <param name="personalizationStrategyParams"></param>
    /// <param name="options">Add extra http header or query parameters to Algolia.</param>
    /// <param name="cancellationToken">Cancellation Token to cancel the request.</param>
    /// <returns>Task of SetPersonalizationStrategyResponse</returns>
    public async Task<SetPersonalizationStrategyResponse> SetPersonalizationStrategyAsync(PersonalizationStrategyParams personalizationStrategyParams, RequestOptions options = null, CancellationToken cancellationToken = default)
    {
      if (personalizationStrategyParams == null)
        throw new ApiException(400, "Missing required parameter 'personalizationStrategyParams' when calling PersonalizationClient->SetPersonalizationStrategy");

      var requestOptions = new InternalRequestOptions(options);


      requestOptions.Data = personalizationStrategyParams;
      return await _transport.ExecuteRequestAsync<SetPersonalizationStrategyResponse>(new HttpMethod("POST"), "/1/strategies/personalization", requestOptions, cancellationToken).ConfigureAwait(false);
    }
  }
}
