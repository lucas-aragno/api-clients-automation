// Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost
// - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT.

package com.algolia.model.recommend;

import com.fasterxml.jackson.annotation.*;
import com.fasterxml.jackson.databind.annotation.*;
import java.util.Objects;

/** Banner with image and link to redirect users. */
public class Banner {

  @JsonProperty("image")
  private BannerImage image;

  @JsonProperty("link")
  private BannerLink link;

  public Banner setImage(BannerImage image) {
    this.image = image;
    return this;
  }

  /** Get image */
  @javax.annotation.Nullable
  public BannerImage getImage() {
    return image;
  }

  public Banner setLink(BannerLink link) {
    this.link = link;
    return this;
  }

  /** Get link */
  @javax.annotation.Nullable
  public BannerLink getLink() {
    return link;
  }

  @Override
  public boolean equals(Object o) {
    if (this == o) {
      return true;
    }
    if (o == null || getClass() != o.getClass()) {
      return false;
    }
    Banner banner = (Banner) o;
    return Objects.equals(this.image, banner.image) && Objects.equals(this.link, banner.link);
  }

  @Override
  public int hashCode() {
    return Objects.hash(image, link);
  }

  @Override
  public String toString() {
    StringBuilder sb = new StringBuilder();
    sb.append("class Banner {\n");
    sb.append("    image: ").append(toIndentedString(image)).append("\n");
    sb.append("    link: ").append(toIndentedString(link)).append("\n");
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
