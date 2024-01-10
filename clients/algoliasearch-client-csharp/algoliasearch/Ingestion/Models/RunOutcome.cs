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
  /// Defines RunOutcome
  /// </summary>
  [JsonConverter(typeof(StringEnumConverter))]
  public enum RunOutcome
  {
    /// <summary>
    /// Enum Success for value: success
    /// </summary>
    [EnumMember(Value = "success")]
    Success = 1,

    /// <summary>
    /// Enum Failure for value: failure
    /// </summary>
    [EnumMember(Value = "failure")]
    Failure = 2,

    /// <summary>
    /// Enum Processing for value: processing
    /// </summary>
    [EnumMember(Value = "processing")]
    Processing = 3
  }

}
