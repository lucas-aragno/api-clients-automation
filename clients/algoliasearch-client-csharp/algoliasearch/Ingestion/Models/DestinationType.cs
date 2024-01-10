//
// Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT.
//

using System;
using System.Collections;
using System.Collections.Generic;
using System.Collections.ObjectModel;
using System.Linq;
using System.IO;
using System.Runtime.Serialization;
using System.Text;
using System.Text.RegularExpressions;
using Newtonsoft.Json;
using Newtonsoft.Json.Converters;
using Newtonsoft.Json.Linq;
using Algolia.Search.Models;

namespace Algolia.Search.Models.Ingestion
{
  /// <summary>
  /// Type of the Destination, defines in which Algolia product the data will be stored.
  /// </summary>
  /// <value>Type of the Destination, defines in which Algolia product the data will be stored.</value>
  [JsonConverter(typeof(StringEnumConverter))]
  public enum DestinationType
  {
    /// <summary>
    /// Enum Search for value: search
    /// </summary>
    [EnumMember(Value = "search")]
    Search = 1,

    /// <summary>
    /// Enum Insights for value: insights
    /// </summary>
    [EnumMember(Value = "insights")]
    Insights = 2,

    /// <summary>
    /// Enum Flow for value: flow
    /// </summary>
    [EnumMember(Value = "flow")]
    Flow = 3
  }

}
