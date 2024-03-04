// Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on
// https://github.com/algolia/api-clients-automation. DO NOT EDIT.

import AnyCodable
import Core
import Foundation

/// Transformations to apply to source, serialized as a JSON string.
public struct MappingInput: Codable, JSONEncodable, Hashable {
    /// Name of the mapping format schema, `mappingkit/v1` is currently the only supported format.
    public var format: String
    public var actions: [MappingKitAction]

    public init(format: String, actions: [MappingKitAction]) {
        self.format = format
        self.actions = actions
    }

    public enum CodingKeys: String, CodingKey, CaseIterable {
        case format
        case actions
    }

    // Encodable protocol methods

    public func encode(to encoder: Encoder) throws {
        var container = encoder.container(keyedBy: CodingKeys.self)
        try container.encode(self.format, forKey: .format)
        try container.encode(self.actions, forKey: .actions)
    }
}
