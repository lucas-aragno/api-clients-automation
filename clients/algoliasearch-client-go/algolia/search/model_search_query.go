// Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT.
package search

import (
	"encoding/json"
	"fmt"
)

// SearchQuery - struct for SearchQuery
type SearchQuery struct {
	SearchForFacets *SearchForFacets
	SearchForHits   *SearchForHits
}

// SearchForFacetsAsSearchQuery is a convenience function that returns SearchForFacets wrapped in SearchQuery
func SearchForFacetsAsSearchQuery(v *SearchForFacets) SearchQuery {
	return SearchQuery{
		SearchForFacets: v,
	}
}

// SearchForHitsAsSearchQuery is a convenience function that returns SearchForHits wrapped in SearchQuery
func SearchForHitsAsSearchQuery(v *SearchForHits) SearchQuery {
	return SearchQuery{
		SearchForHits: v,
	}
}

// Unmarshal JSON data into one of the pointers in the struct
func (dst *SearchQuery) UnmarshalJSON(data []byte) error {
	var err error
	match := 0
	// try to unmarshal data into SearchForFacets
	err = newStrictDecoder(data).Decode(&dst.SearchForFacets)
	if err == nil {
		jsonSearchForFacets, _ := json.Marshal(dst.SearchForFacets)
		if string(jsonSearchForFacets) == "{}" { // empty struct
			dst.SearchForFacets = nil
		} else {
			match++
		}
	} else {
		dst.SearchForFacets = nil
	}

	// try to unmarshal data into SearchForHits
	err = newStrictDecoder(data).Decode(&dst.SearchForHits)
	if err == nil {
		jsonSearchForHits, _ := json.Marshal(dst.SearchForHits)
		if string(jsonSearchForHits) == "{}" { // empty struct
			dst.SearchForHits = nil
		} else {
			match++
		}
	} else {
		dst.SearchForHits = nil
	}

	if match > 1 { // more than 1 match
		// reset to nil
		dst.SearchForFacets = nil
		dst.SearchForHits = nil

		return fmt.Errorf("Data matches more than one schema in oneOf(SearchQuery)")
	} else if match == 1 {
		return nil // exactly one match
	} else { // no match
		return fmt.Errorf("Data failed to match schemas in oneOf(SearchQuery)")
	}
}

// Marshal data from the first non-nil pointers in the struct to JSON
func (src SearchQuery) MarshalJSON() ([]byte, error) {
	if src.SearchForFacets != nil {
		return json.Marshal(&src.SearchForFacets)
	}

	if src.SearchForHits != nil {
		return json.Marshal(&src.SearchForHits)
	}

	return nil, nil // no data in oneOf schemas
}

// Get the actual instance
func (obj *SearchQuery) GetActualInstance() any {
	if obj == nil {
		return nil
	}
	if obj.SearchForFacets != nil {
		return obj.SearchForFacets
	}

	if obj.SearchForHits != nil {
		return obj.SearchForHits
	}

	// all schemas are nil
	return nil
}

type NullableSearchQuery struct {
	value *SearchQuery
	isSet bool
}

func (v NullableSearchQuery) Get() *SearchQuery {
	return v.value
}

func (v *NullableSearchQuery) Set(val *SearchQuery) {
	v.value = val
	v.isSet = true
}

func (v NullableSearchQuery) IsSet() bool {
	return v.isSet
}

func (v *NullableSearchQuery) Unset() {
	v.value = nil
	v.isSet = false
}

func NewNullableSearchQuery(val *SearchQuery) *NullableSearchQuery {
	return &NullableSearchQuery{value: val, isSet: true}
}

func (v NullableSearchQuery) MarshalJSON() ([]byte, error) {
	return json.Marshal(v.value)
}

func (v *NullableSearchQuery) UnmarshalJSON(src []byte) error {
	v.isSet = true
	return json.Unmarshal(src, &v.value)
}
