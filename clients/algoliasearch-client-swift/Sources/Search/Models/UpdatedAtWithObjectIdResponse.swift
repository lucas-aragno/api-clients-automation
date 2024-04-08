// Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on
// https://github.com/algolia/api-clients-automation. DO NOT EDIT.

import Foundation
#if canImport(Core)
    import Core
#endif

/// Response, taskID, unique object identifier, and an update timestamp.
public struct UpdatedAtWithObjectIdResponse: Codable, JSONEncodable {
    /// Unique identifier of a task.  A successful API response means that a task was added to a queue. It might not run
    /// immediately. You can check the task's progress with the [`task` operation](#tag/Indices/operation/getTask) and
    /// this `taskID`.
    public var taskID: Int64?
    /// Date and time when the object was updated, in RFC 3339 format.
    public var updatedAt: String?
    /// Unique record identifier.
    public var objectID: String?

    public init(taskID: Int64? = nil, updatedAt: String? = nil, objectID: String? = nil) {
        self.taskID = taskID
        self.updatedAt = updatedAt
        self.objectID = objectID
    }

    public enum CodingKeys: String, CodingKey, CaseIterable {
        case taskID
        case updatedAt
        case objectID
    }

    // Encodable protocol methods

    public func encode(to encoder: Encoder) throws {
        var container = encoder.container(keyedBy: CodingKeys.self)
        try container.encodeIfPresent(self.taskID, forKey: .taskID)
        try container.encodeIfPresent(self.updatedAt, forKey: .updatedAt)
        try container.encodeIfPresent(self.objectID, forKey: .objectID)
    }
}

extension UpdatedAtWithObjectIdResponse: Equatable {
    public static func ==(lhs: UpdatedAtWithObjectIdResponse, rhs: UpdatedAtWithObjectIdResponse) -> Bool {
        lhs.taskID == rhs.taskID &&
            lhs.updatedAt == rhs.updatedAt &&
            lhs.objectID == rhs.objectID
    }
}

extension UpdatedAtWithObjectIdResponse: Hashable {
    public func hash(into hasher: inout Hasher) {
        hasher.combine(self.taskID?.hashValue)
        hasher.combine(self.updatedAt?.hashValue)
        hasher.combine(self.objectID?.hashValue)
    }
}
