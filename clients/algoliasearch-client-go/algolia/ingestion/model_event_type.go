// Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT.
package ingestion

import (
	"encoding/json"
	"fmt"
)

// EventType the model 'EventType'
type EventType string

// List of EventType
const (
	EVENTTYPE_FETCH  EventType = "fetch"
	EVENTTYPE_RECORD EventType = "record"
	EVENTTYPE_LOG    EventType = "log"
)

// All allowed values of EventType enum
var AllowedEventTypeEnumValues = []EventType{
	"fetch",
	"record",
	"log",
}

func (v *EventType) UnmarshalJSON(src []byte) error {
	var value string
	err := json.Unmarshal(src, &value)
	if err != nil {
		return err
	}
	enumTypeValue := EventType(value)
	for _, existing := range AllowedEventTypeEnumValues {
		if existing == enumTypeValue {
			*v = enumTypeValue
			return nil
		}
	}

	return fmt.Errorf("%+v is not a valid EventType", value)
}

// NewEventTypeFromValue returns a pointer to a valid EventType
// for the value passed as argument, or an error if the value passed is not allowed by the enum
func NewEventTypeFromValue(v string) (*EventType, error) {
	ev := EventType(v)
	if ev.IsValid() {
		return &ev, nil
	} else {
		return nil, fmt.Errorf("invalid value '%v' for EventType: valid values are %v", v, AllowedEventTypeEnumValues)
	}
}

// IsValid return true if the value is valid for the enum, false otherwise
func (v EventType) IsValid() bool {
	for _, existing := range AllowedEventTypeEnumValues {
		if existing == v {
			return true
		}
	}
	return false
}

// Ptr returns reference to EventType value
func (v EventType) Ptr() *EventType {
	return &v
}

type NullableEventType struct {
	value *EventType
	isSet bool
}

func (v NullableEventType) Get() *EventType {
	return v.value
}

func (v *NullableEventType) Set(val *EventType) {
	v.value = val
	v.isSet = true
}

func (v NullableEventType) IsSet() bool {
	return v.isSet
}

func (v *NullableEventType) Unset() {
	v.value = nil
	v.isSet = false
}

func NewNullableEventType(val *EventType) *NullableEventType {
	return &NullableEventType{value: val, isSet: true}
}

func (v NullableEventType) MarshalJSON() ([]byte, error) {
	return json.Marshal(v.value)
}

func (v *NullableEventType) UnmarshalJSON(src []byte) error {
	v.isSet = true
	return json.Unmarshal(src, &v.value)
}
