// Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on
// https://github.com/algolia/api-clients-automation. DO NOT EDIT.

import Foundation
#if canImport(Core)
    import Core
#endif

public struct UpdatedRuleResponse: Codable, JSONEncodable {
    /// Unique identifier of a rule object.
    public var objectID: String
    /// Date and time when the object was updated, in RFC 3339 format.
    public var updatedAt: String
    /// Unique identifier of a task.  A successful API response means that a task was added to a queue. It might not run
    /// immediately. You can check the task's progress with the [`task` operation](#tag/Indices/operation/getTask) and
    /// this `taskID`.
    public var taskID: Int64

    public init(objectID: String, updatedAt: String, taskID: Int64) {
        self.objectID = objectID
        self.updatedAt = updatedAt
        self.taskID = taskID
    }

    public enum CodingKeys: String, CodingKey, CaseIterable {
        case objectID
        case updatedAt
        case taskID
    }

    // Encodable protocol methods

    public func encode(to encoder: Encoder) throws {
        var container = encoder.container(keyedBy: CodingKeys.self)
        try container.encode(self.objectID, forKey: .objectID)
        try container.encode(self.updatedAt, forKey: .updatedAt)
        try container.encode(self.taskID, forKey: .taskID)
    }
}

extension UpdatedRuleResponse: Equatable {
    public static func ==(lhs: UpdatedRuleResponse, rhs: UpdatedRuleResponse) -> Bool {
        lhs.objectID == rhs.objectID &&
            lhs.updatedAt == rhs.updatedAt &&
            lhs.taskID == rhs.taskID
    }
}

extension UpdatedRuleResponse: Hashable {
    public func hash(into hasher: inout Hasher) {
        hasher.combine(self.objectID.hashValue)
        hasher.combine(self.updatedAt.hashValue)
        hasher.combine(self.taskID.hashValue)
    }
}
