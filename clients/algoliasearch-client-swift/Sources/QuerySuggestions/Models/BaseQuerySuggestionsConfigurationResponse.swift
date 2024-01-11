// Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT.

import Core
import Foundation

#if canImport(AnyCodable)
  import AnyCodable
#endif

@objcMembers
public class BaseQuerySuggestionsConfigurationResponse: NSObject, Codable, JSONEncodable {

  /** Your Algolia application ID. */
  public var appId: String?
  /** API key used to read from your source index. */
  public var sourceIndicesAPIKey: String?
  /** API key used to write and configure your Query Suggestions index. */
  public var suggestionsIndicesAPIKey: String?
  /** API key used to read from external Algolia indices. */
  public var externalIndicesAPIKey: String? = ""

  public init(
    appId: String? = nil, sourceIndicesAPIKey: String? = nil,
    suggestionsIndicesAPIKey: String? = nil, externalIndicesAPIKey: String? = ""
  ) {
    self.appId = appId
    self.sourceIndicesAPIKey = sourceIndicesAPIKey
    self.suggestionsIndicesAPIKey = suggestionsIndicesAPIKey
    self.externalIndicesAPIKey = externalIndicesAPIKey
  }

  public enum CodingKeys: String, CodingKey, CaseIterable {
    case appId
    case sourceIndicesAPIKey
    case suggestionsIndicesAPIKey
    case externalIndicesAPIKey
  }

  // Encodable protocol methods

  public func encode(to encoder: Encoder) throws {
    var container = encoder.container(keyedBy: CodingKeys.self)
    try container.encodeIfPresent(appId, forKey: .appId)
    try container.encodeIfPresent(sourceIndicesAPIKey, forKey: .sourceIndicesAPIKey)
    try container.encodeIfPresent(suggestionsIndicesAPIKey, forKey: .suggestionsIndicesAPIKey)
    try container.encodeIfPresent(externalIndicesAPIKey, forKey: .externalIndicesAPIKey)
  }
}
