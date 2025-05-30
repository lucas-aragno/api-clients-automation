// Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on
// https://github.com/algolia/api-clients-automation. DO NOT EDIT.

import Foundation
#if canImport(Core)
    import Core
#endif

public struct WatchResponse: Codable, JSONEncodable {
    /// Universally unique identifier (UUID) of a task run.
    public var runID: String?
    /// when used with discovering or validating sources, the sampled data of your source is returned.
    public var data: [AnyCodable]?
    /// in case of error, observability events will be added to the response, if any.
    public var events: [Event]?
    /// a message describing the outcome of a validate run.
    public var message: String

    public init(runID: String? = nil, data: [AnyCodable]? = nil, events: [Event]? = nil, message: String) {
        self.runID = runID
        self.data = data
        self.events = events
        self.message = message
    }

    public enum CodingKeys: String, CodingKey, CaseIterable {
        case runID
        case data
        case events
        case message
    }

    // Encodable protocol methods

    public func encode(to encoder: Encoder) throws {
        var container = encoder.container(keyedBy: CodingKeys.self)
        try container.encodeIfPresent(self.runID, forKey: .runID)
        try container.encodeIfPresent(self.data, forKey: .data)
        try container.encodeIfPresent(self.events, forKey: .events)
        try container.encode(self.message, forKey: .message)
    }
}

extension WatchResponse: Equatable {
    public static func ==(lhs: WatchResponse, rhs: WatchResponse) -> Bool {
        lhs.runID == rhs.runID &&
            lhs.data == rhs.data &&
            lhs.events == rhs.events &&
            lhs.message == rhs.message
    }
}

extension WatchResponse: Hashable {
    public func hash(into hasher: inout Hasher) {
        hasher.combine(self.runID?.hashValue)
        hasher.combine(self.data?.hashValue)
        hasher.combine(self.events?.hashValue)
        hasher.combine(self.message.hashValue)
    }
}
