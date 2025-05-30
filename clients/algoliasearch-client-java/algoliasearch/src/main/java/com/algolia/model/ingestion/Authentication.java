// Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost
// - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT.

package com.algolia.model.ingestion;

import com.fasterxml.jackson.annotation.*;
import com.fasterxml.jackson.databind.annotation.*;
import java.util.Objects;

/**
 * Resource representing the information required to authenticate with a source or a destination.
 */
public class Authentication {

  @JsonProperty("authenticationID")
  private String authenticationID;

  @JsonProperty("type")
  private AuthenticationType type;

  @JsonProperty("name")
  private String name;

  @JsonProperty("platform")
  private Platform platform;

  @JsonProperty("owner")
  private String owner;

  @JsonProperty("input")
  private AuthInputPartial input;

  @JsonProperty("createdAt")
  private String createdAt;

  @JsonProperty("updatedAt")
  private String updatedAt;

  public Authentication setAuthenticationID(String authenticationID) {
    this.authenticationID = authenticationID;
    return this;
  }

  /** Universally unique identifier (UUID) of an authentication resource. */
  @javax.annotation.Nonnull
  public String getAuthenticationID() {
    return authenticationID;
  }

  public Authentication setType(AuthenticationType type) {
    this.type = type;
    return this;
  }

  /** Get type */
  @javax.annotation.Nonnull
  public AuthenticationType getType() {
    return type;
  }

  public Authentication setName(String name) {
    this.name = name;
    return this;
  }

  /** Descriptive name for the resource. */
  @javax.annotation.Nonnull
  public String getName() {
    return name;
  }

  public Authentication setPlatform(Platform platform) {
    this.platform = platform;
    return this;
  }

  /** Get platform */
  @javax.annotation.Nullable
  public Platform getPlatform() {
    return platform;
  }

  public Authentication setOwner(String owner) {
    this.owner = owner;
    return this;
  }

  /** Owner of the resource. */
  @javax.annotation.Nullable
  public String getOwner() {
    return owner;
  }

  public Authentication setInput(AuthInputPartial input) {
    this.input = input;
    return this;
  }

  /** Get input */
  @javax.annotation.Nonnull
  public AuthInputPartial getInput() {
    return input;
  }

  public Authentication setCreatedAt(String createdAt) {
    this.createdAt = createdAt;
    return this;
  }

  /** Date of creation in RFC 3339 format. */
  @javax.annotation.Nonnull
  public String getCreatedAt() {
    return createdAt;
  }

  public Authentication setUpdatedAt(String updatedAt) {
    this.updatedAt = updatedAt;
    return this;
  }

  /** Date of last update in RFC 3339 format. */
  @javax.annotation.Nullable
  public String getUpdatedAt() {
    return updatedAt;
  }

  @Override
  public boolean equals(Object o) {
    if (this == o) {
      return true;
    }
    if (o == null || getClass() != o.getClass()) {
      return false;
    }
    Authentication authentication = (Authentication) o;
    return (
      Objects.equals(this.authenticationID, authentication.authenticationID) &&
      Objects.equals(this.type, authentication.type) &&
      Objects.equals(this.name, authentication.name) &&
      Objects.equals(this.platform, authentication.platform) &&
      Objects.equals(this.owner, authentication.owner) &&
      Objects.equals(this.input, authentication.input) &&
      Objects.equals(this.createdAt, authentication.createdAt) &&
      Objects.equals(this.updatedAt, authentication.updatedAt)
    );
  }

  @Override
  public int hashCode() {
    return Objects.hash(authenticationID, type, name, platform, owner, input, createdAt, updatedAt);
  }

  @Override
  public String toString() {
    StringBuilder sb = new StringBuilder();
    sb.append("class Authentication {\n");
    sb.append("    authenticationID: ").append(toIndentedString(authenticationID)).append("\n");
    sb.append("    type: ").append(toIndentedString(type)).append("\n");
    sb.append("    name: ").append(toIndentedString(name)).append("\n");
    sb.append("    platform: ").append(toIndentedString(platform)).append("\n");
    sb.append("    owner: ").append(toIndentedString(owner)).append("\n");
    sb.append("    input: ").append(toIndentedString(input)).append("\n");
    sb.append("    createdAt: ").append(toIndentedString(createdAt)).append("\n");
    sb.append("    updatedAt: ").append(toIndentedString(updatedAt)).append("\n");
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
