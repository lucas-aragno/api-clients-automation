// Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT.

import Core
import Foundation

#if canImport(AnyCodable)
  import AnyCodable
#endif

public enum EventStatus: String, Codable, CaseIterable {
  case created = "created"
  case started = "started"
  case retried = "retried"
  case failed = "failed"
  case succeeded = "succeeded"
  case critical = "critical"
}
