//
// Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT.
//
using System;
using System.Text;
using System.Linq;
using System.Text.Json.Serialization;
using System.Collections.Generic;
using Algolia.Search.Serializer;
using System.Text.Json;

namespace Algolia.Search.Models.Ingestion;

/// <summary>
/// Image type.
/// </summary>
/// <value>Image type.</value>
[JsonConverter(typeof(Serializer.JsonStringEnumConverter<DockerImageType>))]
public enum DockerImageType
{
  /// <summary>
  /// Enum Singer for value: singer
  /// </summary>
  [JsonPropertyName("singer")]
  Singer = 1,

  /// <summary>
  /// Enum Custom for value: custom
  /// </summary>
  [JsonPropertyName("custom")]
  Custom = 2,

  /// <summary>
  /// Enum Airbyte for value: airbyte
  /// </summary>
  [JsonPropertyName("airbyte")]
  Airbyte = 3
}

