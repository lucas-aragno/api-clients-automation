// Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on
// https://github.com/algolia/api-clients-automation. DO NOT EDIT.

import Foundation
#if canImport(Core)
    import Core
#endif

public struct GetRevenue: Codable, JSONEncodable, Hashable {
    /// Revenue associated with this search, broken-down by currencies.
    public var currencies: [String: CurrenciesValue]
    /// Daily revenue.
    public var dates: [DailyRevenue]

    public init(currencies: [String: CurrenciesValue], dates: [DailyRevenue]) {
        self.currencies = currencies
        self.dates = dates
    }

    public enum CodingKeys: String, CodingKey, CaseIterable {
        case currencies
        case dates
    }

    // Encodable protocol methods

    public func encode(to encoder: Encoder) throws {
        var container = encoder.container(keyedBy: CodingKeys.self)
        try container.encode(self.currencies, forKey: .currencies)
        try container.encode(self.dates, forKey: .dates)
    }
}
