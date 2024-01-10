//
// Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT.
//

using System;
using System.Collections.Generic;
using Algolia.Search.Models;
using Algolia.Search.Transport;
using Algolia.Search.Utils;

namespace Algolia.Search.Clients
{
  /// <summary>
  /// Ingestion client configuration
  /// </summary>
  public sealed class IngestionConfig : AlgoliaConfig
  {
    /// <summary>
    /// The configuration of the Ingestion client
    /// A client should have it's own configuration ie on configuration per client instance
    /// </summary>
    /// <param name="applicationId">Your application ID</param>
    /// <param name="apiKey">Your API Key</param>
    /// <param name="region">Targeted region </param>
    public IngestionConfig(string applicationId, string apiKey, string region) : base(applicationId, apiKey)
    {
      DefaultHosts = GetDefaultHosts(region);
      Compression = CompressionType.NONE;
    }
    private static List<StatefulHost> GetDefaultHosts(string region)
    {
      var regions = new List<string> { "eu", "us" };
      if (region != null && !regions.Contains(region))
      {
        throw new ArgumentException($"`region` must be one of the following {regions}");
      }

      var selectedRegion = "data.{region}.algolia.com".Replace("{region}", region);

      List<StatefulHost> hosts = new List<StatefulHost>
    {
      new StatefulHost
      {
        Url = selectedRegion, Accept = CallType.Read | CallType.Write
      }
    };
      return hosts;
    }
  }
}
