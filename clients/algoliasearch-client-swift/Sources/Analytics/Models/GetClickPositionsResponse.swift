// Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT.

import Core
import Foundation

#if canImport(AnyCodable)
  import AnyCodable
#endif

@objcMembers public class GetClickPositionsResponse: NSObject, Codable, JSONEncodable {

  /** Click positions. */
  public var positions: [ClickPosition]

  public init(positions: [ClickPosition]) {
    self.positions = positions
  }

  public enum CodingKeys: String, CodingKey, CaseIterable {
    case positions
  }

  // Encodable protocol methods

  public func encode(to encoder: Encoder) throws {
    var container = encoder.container(keyedBy: CodingKeys.self)
    try container.encode(positions, forKey: .positions)
  }
}
