// Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost
// - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT.

package com.algolia.model.composition;

import com.fasterxml.jackson.annotation.*;
import com.fasterxml.jackson.databind.annotation.*;
import java.util.Objects;

/** FacetStats */
public class FacetStats {

  @JsonProperty("min")
  private Double min;

  @JsonProperty("max")
  private Double max;

  @JsonProperty("avg")
  private Double avg;

  @JsonProperty("sum")
  private Double sum;

  public FacetStats setMin(Double min) {
    this.min = min;
    return this;
  }

  /** Minimum value in the results. */
  @javax.annotation.Nullable
  public Double getMin() {
    return min;
  }

  public FacetStats setMax(Double max) {
    this.max = max;
    return this;
  }

  /** Maximum value in the results. */
  @javax.annotation.Nullable
  public Double getMax() {
    return max;
  }

  public FacetStats setAvg(Double avg) {
    this.avg = avg;
    return this;
  }

  /** Average facet value in the results. */
  @javax.annotation.Nullable
  public Double getAvg() {
    return avg;
  }

  public FacetStats setSum(Double sum) {
    this.sum = sum;
    return this;
  }

  /** Sum of all values in the results. */
  @javax.annotation.Nullable
  public Double getSum() {
    return sum;
  }

  @Override
  public boolean equals(Object o) {
    if (this == o) {
      return true;
    }
    if (o == null || getClass() != o.getClass()) {
      return false;
    }
    FacetStats facetStats = (FacetStats) o;
    return (
      Objects.equals(this.min, facetStats.min) &&
      Objects.equals(this.max, facetStats.max) &&
      Objects.equals(this.avg, facetStats.avg) &&
      Objects.equals(this.sum, facetStats.sum)
    );
  }

  @Override
  public int hashCode() {
    return Objects.hash(min, max, avg, sum);
  }

  @Override
  public String toString() {
    StringBuilder sb = new StringBuilder();
    sb.append("class FacetStats {\n");
    sb.append("    min: ").append(toIndentedString(min)).append("\n");
    sb.append("    max: ").append(toIndentedString(max)).append("\n");
    sb.append("    avg: ").append(toIndentedString(avg)).append("\n");
    sb.append("    sum: ").append(toIndentedString(sum)).append("\n");
    sb.append("}");
    return sb.toString();
  }

  /**
   * Convert the given object to string with each line indented by 4 spaces (except the first line).
   */
  private String toIndentedString(Object o) {
    if (o == null) {
      return "null";
    }
    return o.toString().replace("\n", "\n    ");
  }
}
