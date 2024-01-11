// Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT.

import Core
import Foundation

#if canImport(AnyCodable)
  import AnyCodable
#endif

@objcMembers public class InsightsEvents: NSObject, Codable, JSONEncodable {

  /** List of click and conversion events.  An event is an object representing a user interaction. Events have attributes that describe the interaction, such as an event name, a type, or a user token. Some attributes require other attributes to be declared, and some attributes can't be declared at the same time.  **All** events must be valid, otherwise the API returns an error.  */
  public var events: [EventsItems]

  public init(events: [EventsItems]) {
    self.events = events
  }

  public enum CodingKeys: String, CodingKey, CaseIterable {
    case events
  }

  // Encodable protocol methods

  public func encode(to encoder: Encoder) throws {
    var container = encoder.container(keyedBy: CodingKeys.self)
    try container.encode(events, forKey: .events)
  }
}
