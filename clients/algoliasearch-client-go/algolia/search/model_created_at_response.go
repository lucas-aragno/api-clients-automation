// File generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation.
package search

import (
	"encoding/json"
	"fmt"
)

// CreatedAtResponse Response and creation timestamp.
type CreatedAtResponse struct {
	// Timestamp of creation in [ISO-8601](https://wikipedia.org/wiki/ISO_8601) format.
	CreatedAt string `json:"createdAt"`
}

// NewCreatedAtResponse instantiates a new CreatedAtResponse object
// This constructor will assign default values to properties that have it defined,
// and makes sure properties required by API are set, but the set of arguments
// will change when the set of required properties is changed.
func NewCreatedAtResponse(createdAt string) *CreatedAtResponse {
	this := &CreatedAtResponse{}
	this.CreatedAt = createdAt
	return this
}

// NewEmptyCreatedAtResponse return a pointer to an empty CreatedAtResponse object.
func NewEmptyCreatedAtResponse() *CreatedAtResponse {
	return &CreatedAtResponse{}
}

// GetCreatedAt returns the CreatedAt field value.
func (o *CreatedAtResponse) GetCreatedAt() string {
	if o == nil {
		var ret string
		return ret
	}

	return o.CreatedAt
}

// GetCreatedAtOk returns a tuple with the CreatedAt field value
// and a boolean to check if the value has been set.
func (o *CreatedAtResponse) GetCreatedAtOk() (*string, bool) {
	if o == nil {
		return nil, false
	}
	return &o.CreatedAt, true
}

// SetCreatedAt sets field value.
func (o *CreatedAtResponse) SetCreatedAt(v string) *CreatedAtResponse {
	o.CreatedAt = v
	return o
}

func (o CreatedAtResponse) MarshalJSON() ([]byte, error) {
	toSerialize := map[string]any{}
	if true {
		toSerialize["createdAt"] = o.CreatedAt
	}
	serialized, err := json.Marshal(toSerialize)
	if err != nil {
		return nil, fmt.Errorf("failed to marshal CreatedAtResponse: %w", err)
	}

	return serialized, nil
}

func (o CreatedAtResponse) String() string {
	out := ""
	out += fmt.Sprintf("  createdAt=%v\n", o.CreatedAt)
	return fmt.Sprintf("CreatedAtResponse {\n%s}", out)
}

type NullableCreatedAtResponse struct {
	value *CreatedAtResponse
	isSet bool
}

func (v NullableCreatedAtResponse) Get() *CreatedAtResponse {
	return v.value
}

func (v *NullableCreatedAtResponse) Set(val *CreatedAtResponse) {
	v.value = val
	v.isSet = true
}

func (v NullableCreatedAtResponse) IsSet() bool {
	return v.isSet
}

func (v *NullableCreatedAtResponse) Unset() {
	v.value = nil
	v.isSet = false
}

func NewNullableCreatedAtResponse(val *CreatedAtResponse) *NullableCreatedAtResponse {
	return &NullableCreatedAtResponse{value: val, isSet: true}
}

func (v NullableCreatedAtResponse) MarshalJSON() ([]byte, error) {
	return json.Marshal(v.value) //nolint:wrapcheck
}

func (v *NullableCreatedAtResponse) UnmarshalJSON(src []byte) error {
	v.isSet = true
	return json.Unmarshal(src, &v.value) //nolint:wrapcheck
}
