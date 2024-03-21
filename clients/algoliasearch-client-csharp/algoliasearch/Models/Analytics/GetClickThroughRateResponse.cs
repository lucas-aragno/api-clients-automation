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

namespace Algolia.Search.Models.Analytics;

/// <summary>
/// GetClickThroughRateResponse
/// </summary>
public partial class GetClickThroughRateResponse
{
  /// <summary>
  /// Initializes a new instance of the GetClickThroughRateResponse class.
  /// </summary>
  [JsonConstructor]
  public GetClickThroughRateResponse() { }
  /// <summary>
  /// Initializes a new instance of the GetClickThroughRateResponse class.
  /// </summary>
  /// <param name="rate">Click-through rate, calculated as number of tracked searches with at least one click event divided by the number of tracked searches. If null, Algolia didn&#39;t receive any search requests with &#x60;clickAnalytics&#x60; set to true.  (required).</param>
  /// <param name="clickCount">Number of clicks associated with this search. (required) (default to 0).</param>
  /// <param name="trackedSearchCount">Number of tracked searches. Tracked searches are search requests where the &#x60;clickAnalytics&#x60; parameter is true. (required) (default to 0).</param>
  /// <param name="dates">Daily click-through rates. (required).</param>
  public GetClickThroughRateResponse(double? rate, int clickCount, int trackedSearchCount, List<DailyClickThroughRates> dates)
  {
    Rate = rate ?? throw new ArgumentNullException(nameof(rate));
    ClickCount = clickCount;
    TrackedSearchCount = trackedSearchCount;
    Dates = dates ?? throw new ArgumentNullException(nameof(dates));
  }

  /// <summary>
  /// Click-through rate, calculated as number of tracked searches with at least one click event divided by the number of tracked searches. If null, Algolia didn't receive any search requests with `clickAnalytics` set to true. 
  /// </summary>
  /// <value>Click-through rate, calculated as number of tracked searches with at least one click event divided by the number of tracked searches. If null, Algolia didn't receive any search requests with `clickAnalytics` set to true. </value>
  [JsonPropertyName("rate")]
  public double? Rate { get; set; }

  /// <summary>
  /// Number of clicks associated with this search.
  /// </summary>
  /// <value>Number of clicks associated with this search.</value>
  [JsonPropertyName("clickCount")]
  public int ClickCount { get; set; }

  /// <summary>
  /// Number of tracked searches. Tracked searches are search requests where the `clickAnalytics` parameter is true.
  /// </summary>
  /// <value>Number of tracked searches. Tracked searches are search requests where the `clickAnalytics` parameter is true.</value>
  [JsonPropertyName("trackedSearchCount")]
  public int TrackedSearchCount { get; set; }

  /// <summary>
  /// Daily click-through rates.
  /// </summary>
  /// <value>Daily click-through rates.</value>
  [JsonPropertyName("dates")]
  public List<DailyClickThroughRates> Dates { get; set; }

  /// <summary>
  /// Returns the string presentation of the object
  /// </summary>
  /// <returns>String presentation of the object</returns>
  public override string ToString()
  {
    StringBuilder sb = new StringBuilder();
    sb.Append("class GetClickThroughRateResponse {\n");
    sb.Append("  Rate: ").Append(Rate).Append("\n");
    sb.Append("  ClickCount: ").Append(ClickCount).Append("\n");
    sb.Append("  TrackedSearchCount: ").Append(TrackedSearchCount).Append("\n");
    sb.Append("  Dates: ").Append(Dates).Append("\n");
    sb.Append("}\n");
    return sb.ToString();
  }

  /// <summary>
  /// Returns the JSON string presentation of the object
  /// </summary>
  /// <returns>JSON string presentation of the object</returns>
  public virtual string ToJson()
  {
    return JsonSerializer.Serialize(this, JsonConfig.Options);
  }

  /// <summary>
  /// Returns true if objects are equal
  /// </summary>
  /// <param name="obj">Object to be compared</param>
  /// <returns>Boolean</returns>
  public override bool Equals(object obj)
  {
    if (obj is not GetClickThroughRateResponse input)
    {
      return false;
    }

    return
        (Rate == input.Rate || (Rate != null && Rate.Equals(input.Rate))) &&
        (ClickCount == input.ClickCount || ClickCount.Equals(input.ClickCount)) &&
        (TrackedSearchCount == input.TrackedSearchCount || TrackedSearchCount.Equals(input.TrackedSearchCount)) &&
        (Dates == input.Dates || Dates != null && input.Dates != null && Dates.SequenceEqual(input.Dates));
  }

  /// <summary>
  /// Gets the hash code
  /// </summary>
  /// <returns>Hash code</returns>
  public override int GetHashCode()
  {
    unchecked // Overflow is fine, just wrap
    {
      int hashCode = 41;
      if (Rate != null)
      {
        hashCode = (hashCode * 59) + Rate.GetHashCode();
      }
      hashCode = (hashCode * 59) + ClickCount.GetHashCode();
      hashCode = (hashCode * 59) + TrackedSearchCount.GetHashCode();
      if (Dates != null)
      {
        hashCode = (hashCode * 59) + Dates.GetHashCode();
      }
      return hashCode;
    }
  }

}

