// Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT.
package search

import (
	"encoding/json"
	"fmt"
)

// SearchHits struct for SearchHits
type SearchHits struct {
	Hits []Hit `json:"hits"`
}

// NewSearchHits instantiates a new SearchHits object
// This constructor will assign default values to properties that have it defined,
// and makes sure properties required by API are set, but the set of arguments
// will change when the set of required properties is changed
func NewSearchHits(hits []Hit) *SearchHits {
	this := &SearchHits{}
	this.Hits = hits
	return this
}

// NewSearchHitsWithDefaults instantiates a new SearchHits object
// This constructor will only assign default values to properties that have it defined,
// but it doesn't guarantee that properties required by API are set
func NewSearchHitsWithDefaults() *SearchHits {
	this := &SearchHits{}
	return this
}

// GetHits returns the Hits field value
func (o *SearchHits) GetHits() []Hit {
	if o == nil {
		var ret []Hit
		return ret
	}

	return o.Hits
}

// GetHitsOk returns a tuple with the Hits field value
// and a boolean to check if the value has been set.
func (o *SearchHits) GetHitsOk() ([]Hit, bool) {
	if o == nil {
		return nil, false
	}
	return o.Hits, true
}

// SetHits sets field value
func (o *SearchHits) SetHits(v []Hit) {
	o.Hits = v
}

func (o SearchHits) MarshalJSON() ([]byte, error) {
	toSerialize := map[string]any{}
	if true {
		toSerialize["hits"] = o.Hits
	}
	return json.Marshal(toSerialize)
}

func (o SearchHits) String() string {
	out := "SearchHits {\n"
	out += fmt.Sprintf("  hits=%v\n", o.Hits)
	out += "}"
	return out
}

type NullableSearchHits struct {
	value *SearchHits
	isSet bool
}

func (v NullableSearchHits) Get() *SearchHits {
	return v.value
}

func (v *NullableSearchHits) Set(val *SearchHits) {
	v.value = val
	v.isSet = true
}

func (v NullableSearchHits) IsSet() bool {
	return v.isSet
}

func (v *NullableSearchHits) Unset() {
	v.value = nil
	v.isSet = false
}

func NewNullableSearchHits(val *SearchHits) *NullableSearchHits {
	return &NullableSearchHits{value: val, isSet: true}
}

func (v NullableSearchHits) MarshalJSON() ([]byte, error) {
	return json.Marshal(v.value)
}

func (v *NullableSearchHits) UnmarshalJSON(src []byte) error {
	v.isSet = true
	return json.Unmarshal(src, &v.value)
}
