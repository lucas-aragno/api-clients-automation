// Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT.
package predict

import (
	"encoding/json"
	"fmt"
)

// SegmentAffinityFilterValue - struct for SegmentAffinityFilterValue
type SegmentAffinityFilterValue struct {
	ArrayOfString *[]string
	Bool          *bool
	Float32       *float32
	String        *string
}

// []stringAsSegmentAffinityFilterValue is a convenience function that returns []string wrapped in SegmentAffinityFilterValue
func ArrayOfStringAsSegmentAffinityFilterValue(v *[]string) SegmentAffinityFilterValue {
	return SegmentAffinityFilterValue{
		ArrayOfString: v,
	}
}

// boolAsSegmentAffinityFilterValue is a convenience function that returns bool wrapped in SegmentAffinityFilterValue
func BoolAsSegmentAffinityFilterValue(v *bool) SegmentAffinityFilterValue {
	return SegmentAffinityFilterValue{
		Bool: v,
	}
}

// float32AsSegmentAffinityFilterValue is a convenience function that returns float32 wrapped in SegmentAffinityFilterValue
func Float32AsSegmentAffinityFilterValue(v *float32) SegmentAffinityFilterValue {
	return SegmentAffinityFilterValue{
		Float32: v,
	}
}

// stringAsSegmentAffinityFilterValue is a convenience function that returns string wrapped in SegmentAffinityFilterValue
func StringAsSegmentAffinityFilterValue(v *string) SegmentAffinityFilterValue {
	return SegmentAffinityFilterValue{
		String: v,
	}
}

// Unmarshal JSON data into one of the pointers in the struct
func (dst *SegmentAffinityFilterValue) UnmarshalJSON(data []byte) error {
	var err error
	match := 0
	// try to unmarshal data into ArrayOfString
	err = newStrictDecoder(data).Decode(&dst.ArrayOfString)
	if err == nil {
		jsonArrayOfString, _ := json.Marshal(dst.ArrayOfString)
		if string(jsonArrayOfString) == "{}" { // empty struct
			dst.ArrayOfString = nil
		} else {
			match++
		}
	} else {
		dst.ArrayOfString = nil
	}

	// try to unmarshal data into Bool
	err = newStrictDecoder(data).Decode(&dst.Bool)
	if err == nil {
		jsonBool, _ := json.Marshal(dst.Bool)
		if string(jsonBool) == "{}" { // empty struct
			dst.Bool = nil
		} else {
			match++
		}
	} else {
		dst.Bool = nil
	}

	// try to unmarshal data into Float32
	err = newStrictDecoder(data).Decode(&dst.Float32)
	if err == nil {
		jsonFloat32, _ := json.Marshal(dst.Float32)
		if string(jsonFloat32) == "{}" { // empty struct
			dst.Float32 = nil
		} else {
			match++
		}
	} else {
		dst.Float32 = nil
	}

	// try to unmarshal data into String
	err = newStrictDecoder(data).Decode(&dst.String)
	if err == nil {
		jsonString, _ := json.Marshal(dst.String)
		if string(jsonString) == "{}" { // empty struct
			dst.String = nil
		} else {
			match++
		}
	} else {
		dst.String = nil
	}

	if match > 1 { // more than 1 match
		// reset to nil
		dst.ArrayOfString = nil
		dst.Bool = nil
		dst.Float32 = nil
		dst.String = nil

		return fmt.Errorf("Data matches more than one schema in oneOf(SegmentAffinityFilterValue)")
	} else if match == 1 {
		return nil // exactly one match
	} else { // no match
		return fmt.Errorf("Data failed to match schemas in oneOf(SegmentAffinityFilterValue)")
	}
}

// Marshal data from the first non-nil pointers in the struct to JSON
func (src SegmentAffinityFilterValue) MarshalJSON() ([]byte, error) {
	if src.ArrayOfString != nil {
		return json.Marshal(&src.ArrayOfString)
	}

	if src.Bool != nil {
		return json.Marshal(&src.Bool)
	}

	if src.Float32 != nil {
		return json.Marshal(&src.Float32)
	}

	if src.String != nil {
		return json.Marshal(&src.String)
	}

	return nil, nil // no data in oneOf schemas
}

// Get the actual instance
func (obj *SegmentAffinityFilterValue) GetActualInstance() any {
	if obj == nil {
		return nil
	}
	if obj.ArrayOfString != nil {
		return obj.ArrayOfString
	}

	if obj.Bool != nil {
		return obj.Bool
	}

	if obj.Float32 != nil {
		return obj.Float32
	}

	if obj.String != nil {
		return obj.String
	}

	// all schemas are nil
	return nil
}

type NullableSegmentAffinityFilterValue struct {
	value *SegmentAffinityFilterValue
	isSet bool
}

func (v NullableSegmentAffinityFilterValue) Get() *SegmentAffinityFilterValue {
	return v.value
}

func (v *NullableSegmentAffinityFilterValue) Set(val *SegmentAffinityFilterValue) {
	v.value = val
	v.isSet = true
}

func (v NullableSegmentAffinityFilterValue) IsSet() bool {
	return v.isSet
}

func (v *NullableSegmentAffinityFilterValue) Unset() {
	v.value = nil
	v.isSet = false
}

func NewNullableSegmentAffinityFilterValue(val *SegmentAffinityFilterValue) *NullableSegmentAffinityFilterValue {
	return &NullableSegmentAffinityFilterValue{value: val, isSet: true}
}

func (v NullableSegmentAffinityFilterValue) MarshalJSON() ([]byte, error) {
	return json.Marshal(v.value)
}

func (v *NullableSegmentAffinityFilterValue) UnmarshalJSON(src []byte) error {
	v.isSet = true
	return json.Unmarshal(src, &v.value)
}
