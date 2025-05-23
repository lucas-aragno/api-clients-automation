// Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on
// https://github.com/algolia/api-clients-automation. DO NOT EDIT.

import Foundation
#if canImport(Core)
    import Core
#endif

/// API request body for creating a task.
public struct TaskCreate: Codable, JSONEncodable {
    /// Universally uniqud identifier (UUID) of a source.
    public var sourceID: String
    /// Universally unique identifier (UUID) of a destination resource.
    public var destinationID: String
    public var action: ActionType
    public var subscriptionAction: ActionType?
    /// Cron expression for the task's schedule.
    public var cron: String?
    /// Whether the task is enabled.
    public var enabled: Bool?
    /// Maximum accepted percentage of failures for a task run to finish successfully.
    public var failureThreshold: Int?
    public var input: TaskInput?
    /// Date of the last cursor in RFC 3339 format.
    public var cursor: String?
    public var notifications: Notifications?
    public var policies: Policies?

    public init(
        sourceID: String,
        destinationID: String,
        action: ActionType,
        subscriptionAction: ActionType? = nil,
        cron: String? = nil,
        enabled: Bool? = nil,
        failureThreshold: Int? = nil,
        input: TaskInput? = nil,
        cursor: String? = nil,
        notifications: Notifications? = nil,
        policies: Policies? = nil
    ) {
        self.sourceID = sourceID
        self.destinationID = destinationID
        self.action = action
        self.subscriptionAction = subscriptionAction
        self.cron = cron
        self.enabled = enabled
        self.failureThreshold = failureThreshold
        self.input = input
        self.cursor = cursor
        self.notifications = notifications
        self.policies = policies
    }

    public enum CodingKeys: String, CodingKey, CaseIterable {
        case sourceID
        case destinationID
        case action
        case subscriptionAction
        case cron
        case enabled
        case failureThreshold
        case input
        case cursor
        case notifications
        case policies
    }

    // Encodable protocol methods

    public func encode(to encoder: Encoder) throws {
        var container = encoder.container(keyedBy: CodingKeys.self)
        try container.encode(self.sourceID, forKey: .sourceID)
        try container.encode(self.destinationID, forKey: .destinationID)
        try container.encode(self.action, forKey: .action)
        try container.encodeIfPresent(self.subscriptionAction, forKey: .subscriptionAction)
        try container.encodeIfPresent(self.cron, forKey: .cron)
        try container.encodeIfPresent(self.enabled, forKey: .enabled)
        try container.encodeIfPresent(self.failureThreshold, forKey: .failureThreshold)
        try container.encodeIfPresent(self.input, forKey: .input)
        try container.encodeIfPresent(self.cursor, forKey: .cursor)
        try container.encodeIfPresent(self.notifications, forKey: .notifications)
        try container.encodeIfPresent(self.policies, forKey: .policies)
    }
}

extension TaskCreate: Equatable {
    public static func ==(lhs: TaskCreate, rhs: TaskCreate) -> Bool {
        lhs.sourceID == rhs.sourceID &&
            lhs.destinationID == rhs.destinationID &&
            lhs.action == rhs.action &&
            lhs.subscriptionAction == rhs.subscriptionAction &&
            lhs.cron == rhs.cron &&
            lhs.enabled == rhs.enabled &&
            lhs.failureThreshold == rhs.failureThreshold &&
            lhs.input == rhs.input &&
            lhs.cursor == rhs.cursor &&
            lhs.notifications == rhs.notifications &&
            lhs.policies == rhs.policies
    }
}

extension TaskCreate: Hashable {
    public func hash(into hasher: inout Hasher) {
        hasher.combine(self.sourceID.hashValue)
        hasher.combine(self.destinationID.hashValue)
        hasher.combine(self.action.hashValue)
        hasher.combine(self.subscriptionAction?.hashValue)
        hasher.combine(self.cron?.hashValue)
        hasher.combine(self.enabled?.hashValue)
        hasher.combine(self.failureThreshold?.hashValue)
        hasher.combine(self.input?.hashValue)
        hasher.combine(self.cursor?.hashValue)
        hasher.combine(self.notifications?.hashValue)
        hasher.combine(self.policies?.hashValue)
    }
}
