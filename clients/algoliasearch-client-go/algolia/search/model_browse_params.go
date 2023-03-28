// Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT.
package search

import (
	"encoding/json"
	"fmt"
)

// BrowseParams - struct for BrowseParams
type BrowseParams struct {
	BrowseParamsObject *BrowseParamsObject
	SearchParamsString *SearchParamsString
}

// BrowseParamsObjectAsBrowseParams is a convenience function that returns BrowseParamsObject wrapped in BrowseParams
func BrowseParamsObjectAsBrowseParams(v *BrowseParamsObject) BrowseParams {
	return BrowseParams{
		BrowseParamsObject: v,
	}
}

// SearchParamsStringAsBrowseParams is a convenience function that returns SearchParamsString wrapped in BrowseParams
func SearchParamsStringAsBrowseParams(v *SearchParamsString) BrowseParams {
	return BrowseParams{
		SearchParamsString: v,
	}
}

// Unmarshal JSON data into one of the pointers in the struct
func (dst *BrowseParams) UnmarshalJSON(data []byte) error {
	var err error
	match := 0
	// try to unmarshal data into BrowseParamsObject
	err = newStrictDecoder(data).Decode(&dst.BrowseParamsObject)
	if err == nil {
		jsonBrowseParamsObject, _ := json.Marshal(dst.BrowseParamsObject)
		if string(jsonBrowseParamsObject) == "{}" { // empty struct
			dst.BrowseParamsObject = nil
		} else {
			match++
		}
	} else {
		dst.BrowseParamsObject = nil
	}

	// try to unmarshal data into SearchParamsString
	err = newStrictDecoder(data).Decode(&dst.SearchParamsString)
	if err == nil {
		jsonSearchParamsString, _ := json.Marshal(dst.SearchParamsString)
		if string(jsonSearchParamsString) == "{}" { // empty struct
			dst.SearchParamsString = nil
		} else {
			match++
		}
	} else {
		dst.SearchParamsString = nil
	}

	if match > 1 { // more than 1 match
		// reset to nil
		dst.BrowseParamsObject = nil
		dst.SearchParamsString = nil

		return fmt.Errorf("Data matches more than one schema in oneOf(BrowseParams)")
	} else if match == 1 {
		return nil // exactly one match
	} else { // no match
		return fmt.Errorf("Data failed to match schemas in oneOf(BrowseParams)")
	}
}

// Marshal data from the first non-nil pointers in the struct to JSON
func (src BrowseParams) MarshalJSON() ([]byte, error) {
	if src.BrowseParamsObject != nil {
		return json.Marshal(&src.BrowseParamsObject)
	}

	if src.SearchParamsString != nil {
		return json.Marshal(&src.SearchParamsString)
	}

	return nil, nil // no data in oneOf schemas
}

// Get the actual instance
func (obj *BrowseParams) GetActualInstance() any {
	if obj == nil {
		return nil
	}
	if obj.BrowseParamsObject != nil {
		return obj.BrowseParamsObject
	}

	if obj.SearchParamsString != nil {
		return obj.SearchParamsString
	}

	// all schemas are nil
	return nil
}

type NullableBrowseParams struct {
	value *BrowseParams
	isSet bool
}

func (v NullableBrowseParams) Get() *BrowseParams {
	return v.value
}

func (v *NullableBrowseParams) Set(val *BrowseParams) {
	v.value = val
	v.isSet = true
}

func (v NullableBrowseParams) IsSet() bool {
	return v.isSet
}

func (v *NullableBrowseParams) Unset() {
	v.value = nil
	v.isSet = false
}

func NewNullableBrowseParams(val *BrowseParams) *NullableBrowseParams {
	return &NullableBrowseParams{value: val, isSet: true}
}

func (v NullableBrowseParams) MarshalJSON() ([]byte, error) {
	return json.Marshal(v.value)
}

func (v *NullableBrowseParams) UnmarshalJSON(src []byte) error {
	v.isSet = true
	return json.Unmarshal(src, &v.value)
}
