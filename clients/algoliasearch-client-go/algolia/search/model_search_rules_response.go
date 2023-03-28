// Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT.
package search

import (
	"encoding/json"
	"fmt"
)

// SearchRulesResponse struct for SearchRulesResponse
type SearchRulesResponse struct {
	// Fetched rules.
	Hits []Rule `json:"hits"`
	// Number of fetched rules.
	NbHits int32 `json:"nbHits"`
	// Current page.
	Page int32 `json:"page"`
	// Number of pages.
	NbPages int32 `json:"nbPages"`
}

// NewSearchRulesResponse instantiates a new SearchRulesResponse object
// This constructor will assign default values to properties that have it defined,
// and makes sure properties required by API are set, but the set of arguments
// will change when the set of required properties is changed
func NewSearchRulesResponse(hits []Rule, nbHits int32, page int32, nbPages int32) *SearchRulesResponse {
	this := &SearchRulesResponse{}
	this.Hits = hits
	this.NbHits = nbHits
	this.Page = page
	this.NbPages = nbPages
	return this
}

// NewSearchRulesResponseWithDefaults instantiates a new SearchRulesResponse object
// This constructor will only assign default values to properties that have it defined,
// but it doesn't guarantee that properties required by API are set
func NewSearchRulesResponseWithDefaults() *SearchRulesResponse {
	this := &SearchRulesResponse{}
	return this
}

// GetHits returns the Hits field value
func (o *SearchRulesResponse) GetHits() []Rule {
	if o == nil {
		var ret []Rule
		return ret
	}

	return o.Hits
}

// GetHitsOk returns a tuple with the Hits field value
// and a boolean to check if the value has been set.
func (o *SearchRulesResponse) GetHitsOk() ([]Rule, bool) {
	if o == nil {
		return nil, false
	}
	return o.Hits, true
}

// SetHits sets field value
func (o *SearchRulesResponse) SetHits(v []Rule) {
	o.Hits = v
}

// GetNbHits returns the NbHits field value
func (o *SearchRulesResponse) GetNbHits() int32 {
	if o == nil {
		var ret int32
		return ret
	}

	return o.NbHits
}

// GetNbHitsOk returns a tuple with the NbHits field value
// and a boolean to check if the value has been set.
func (o *SearchRulesResponse) GetNbHitsOk() (*int32, bool) {
	if o == nil {
		return nil, false
	}
	return &o.NbHits, true
}

// SetNbHits sets field value
func (o *SearchRulesResponse) SetNbHits(v int32) {
	o.NbHits = v
}

// GetPage returns the Page field value
func (o *SearchRulesResponse) GetPage() int32 {
	if o == nil {
		var ret int32
		return ret
	}

	return o.Page
}

// GetPageOk returns a tuple with the Page field value
// and a boolean to check if the value has been set.
func (o *SearchRulesResponse) GetPageOk() (*int32, bool) {
	if o == nil {
		return nil, false
	}
	return &o.Page, true
}

// SetPage sets field value
func (o *SearchRulesResponse) SetPage(v int32) {
	o.Page = v
}

// GetNbPages returns the NbPages field value
func (o *SearchRulesResponse) GetNbPages() int32 {
	if o == nil {
		var ret int32
		return ret
	}

	return o.NbPages
}

// GetNbPagesOk returns a tuple with the NbPages field value
// and a boolean to check if the value has been set.
func (o *SearchRulesResponse) GetNbPagesOk() (*int32, bool) {
	if o == nil {
		return nil, false
	}
	return &o.NbPages, true
}

// SetNbPages sets field value
func (o *SearchRulesResponse) SetNbPages(v int32) {
	o.NbPages = v
}

func (o SearchRulesResponse) MarshalJSON() ([]byte, error) {
	toSerialize := map[string]any{}
	if true {
		toSerialize["hits"] = o.Hits
	}
	if true {
		toSerialize["nbHits"] = o.NbHits
	}
	if true {
		toSerialize["page"] = o.Page
	}
	if true {
		toSerialize["nbPages"] = o.NbPages
	}
	return json.Marshal(toSerialize)
}

func (o SearchRulesResponse) String() string {
	out := "SearchRulesResponse {\n"
	out += fmt.Sprintf("  hits=%v\n", o.Hits)
	out += fmt.Sprintf("  nbHits=%v\n", o.NbHits)
	out += fmt.Sprintf("  page=%v\n", o.Page)
	out += fmt.Sprintf("  nbPages=%v\n", o.NbPages)
	out += "}"
	return out
}

type NullableSearchRulesResponse struct {
	value *SearchRulesResponse
	isSet bool
}

func (v NullableSearchRulesResponse) Get() *SearchRulesResponse {
	return v.value
}

func (v *NullableSearchRulesResponse) Set(val *SearchRulesResponse) {
	v.value = val
	v.isSet = true
}

func (v NullableSearchRulesResponse) IsSet() bool {
	return v.isSet
}

func (v *NullableSearchRulesResponse) Unset() {
	v.value = nil
	v.isSet = false
}

func NewNullableSearchRulesResponse(val *SearchRulesResponse) *NullableSearchRulesResponse {
	return &NullableSearchRulesResponse{value: val, isSet: true}
}

func (v NullableSearchRulesResponse) MarshalJSON() ([]byte, error) {
	return json.Marshal(v.value)
}

func (v *NullableSearchRulesResponse) UnmarshalJSON(src []byte) error {
	v.isSet = true
	return json.Unmarshal(src, &v.value)
}
