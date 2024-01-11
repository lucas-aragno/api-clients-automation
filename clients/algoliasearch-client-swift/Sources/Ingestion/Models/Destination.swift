// Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT.

import Core
import Foundation

#if canImport(AnyCodable)
  import AnyCodable
#endif

/// A destination describe how the data is indexed on the Algolia side.
@objcMembers public class Destination: NSObject, Codable, JSONEncodable {

  /** The destination UUID. */
  public var destinationID: String
  public var type: DestinationType
  /** An human readable name describing the object. */
  public var name: String
  public var input: DestinationInput
  /** Date of creation (RFC3339 format). */
  public var createdAt: String
  /** Date of last update (RFC3339 format). */
  public var updatedAt: String?
  public var authenticationID: String?

  public init(
    destinationID: String, type: DestinationType, name: String, input: DestinationInput,
    createdAt: String, updatedAt: String? = nil, authenticationID: String? = nil
  ) {
    self.destinationID = destinationID
    self.type = type
    self.name = name
    self.input = input
    self.createdAt = createdAt
    self.updatedAt = updatedAt
    self.authenticationID = authenticationID
  }

  public enum CodingKeys: String, CodingKey, CaseIterable {
    case destinationID
    case type
    case name
    case input
    case createdAt
    case updatedAt
    case authenticationID
  }

  // Encodable protocol methods

  public func encode(to encoder: Encoder) throws {
    var container = encoder.container(keyedBy: CodingKeys.self)
    try container.encode(destinationID, forKey: .destinationID)
    try container.encode(type, forKey: .type)
    try container.encode(name, forKey: .name)
    try container.encode(input, forKey: .input)
    try container.encode(createdAt, forKey: .createdAt)
    try container.encodeIfPresent(updatedAt, forKey: .updatedAt)
    try container.encodeIfPresent(authenticationID, forKey: .authenticationID)
  }
}
