// Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT.
package predict

import (
	"encoding/json"
	"fmt"
)

// SegmentConditionsParam struct for SegmentConditionsParam
type SegmentConditionsParam struct {
	Conditions *SegmentParentConditions `json:"conditions,omitempty"`
}

type SegmentConditionsParamOption func(f *SegmentConditionsParam)

func WithSegmentConditionsParamConditions(val SegmentParentConditions) SegmentConditionsParamOption {
	return func(f *SegmentConditionsParam) {
		f.Conditions = &val
	}
}

// NewSegmentConditionsParam instantiates a new SegmentConditionsParam object
// This constructor will assign default values to properties that have it defined,
// and makes sure properties required by API are set, but the set of arguments
// will change when the set of required properties is changed
func NewSegmentConditionsParam(opts ...SegmentConditionsParamOption) *SegmentConditionsParam {
	this := &SegmentConditionsParam{}
	for _, opt := range opts {
		opt(this)
	}
	return this
}

// NewSegmentConditionsParamWithDefaults instantiates a new SegmentConditionsParam object
// This constructor will only assign default values to properties that have it defined,
// but it doesn't guarantee that properties required by API are set
func NewSegmentConditionsParamWithDefaults() *SegmentConditionsParam {
	this := &SegmentConditionsParam{}
	return this
}

// GetConditions returns the Conditions field value if set, zero value otherwise.
func (o *SegmentConditionsParam) GetConditions() SegmentParentConditions {
	if o == nil || o.Conditions == nil {
		var ret SegmentParentConditions
		return ret
	}
	return *o.Conditions
}

// GetConditionsOk returns a tuple with the Conditions field value if set, nil otherwise
// and a boolean to check if the value has been set.
func (o *SegmentConditionsParam) GetConditionsOk() (*SegmentParentConditions, bool) {
	if o == nil || o.Conditions == nil {
		return nil, false
	}
	return o.Conditions, true
}

// HasConditions returns a boolean if a field has been set.
func (o *SegmentConditionsParam) HasConditions() bool {
	if o != nil && o.Conditions != nil {
		return true
	}

	return false
}

// SetConditions gets a reference to the given SegmentParentConditions and assigns it to the Conditions field.
func (o *SegmentConditionsParam) SetConditions(v SegmentParentConditions) {
	o.Conditions = &v
}

func (o SegmentConditionsParam) MarshalJSON() ([]byte, error) {
	toSerialize := map[string]any{}
	if o.Conditions != nil {
		toSerialize["conditions"] = o.Conditions
	}
	return json.Marshal(toSerialize)
}

func (o SegmentConditionsParam) String() string {
	out := "SegmentConditionsParam {\n"
	out += fmt.Sprintf("  conditions=%v\n", o.Conditions)
	out += "}"
	return out
}

type NullableSegmentConditionsParam struct {
	value *SegmentConditionsParam
	isSet bool
}

func (v NullableSegmentConditionsParam) Get() *SegmentConditionsParam {
	return v.value
}

func (v *NullableSegmentConditionsParam) Set(val *SegmentConditionsParam) {
	v.value = val
	v.isSet = true
}

func (v NullableSegmentConditionsParam) IsSet() bool {
	return v.isSet
}

func (v *NullableSegmentConditionsParam) Unset() {
	v.value = nil
	v.isSet = false
}

func NewNullableSegmentConditionsParam(val *SegmentConditionsParam) *NullableSegmentConditionsParam {
	return &NullableSegmentConditionsParam{value: val, isSet: true}
}

func (v NullableSegmentConditionsParam) MarshalJSON() ([]byte, error) {
	return json.Marshal(v.value)
}

func (v *NullableSegmentConditionsParam) UnmarshalJSON(src []byte) error {
	v.isSet = true
	return json.Unmarshal(src, &v.value)
}
