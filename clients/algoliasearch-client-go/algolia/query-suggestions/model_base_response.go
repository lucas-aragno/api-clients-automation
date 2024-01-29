// File generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation.
package suggestions

import (
	"encoding/json"
	"fmt"
)

// BaseResponse struct for BaseResponse.
type BaseResponse struct {
	// HTTP status code.
	Status *int32 `json:"status,omitempty"`
	// Details about the response, such as error messages.
	Message *string `json:"message,omitempty"`
}

type BaseResponseOption func(f *BaseResponse)

func WithBaseResponseStatus(val int32) BaseResponseOption {
	return func(f *BaseResponse) {
		f.Status = &val
	}
}

func WithBaseResponseMessage(val string) BaseResponseOption {
	return func(f *BaseResponse) {
		f.Message = &val
	}
}

// NewBaseResponse instantiates a new BaseResponse object
// This constructor will assign default values to properties that have it defined,
// and makes sure properties required by API are set, but the set of arguments
// will change when the set of required properties is changed.
func NewBaseResponse(opts ...BaseResponseOption) *BaseResponse {
	this := &BaseResponse{}
	for _, opt := range opts {
		opt(this)
	}
	return this
}

// NewEmptyBaseResponse return a pointer to an empty BaseResponse object.
func NewEmptyBaseResponse() *BaseResponse {
	return &BaseResponse{}
}

// GetStatus returns the Status field value if set, zero value otherwise.
func (o *BaseResponse) GetStatus() int32 {
	if o == nil || o.Status == nil {
		var ret int32
		return ret
	}
	return *o.Status
}

// GetStatusOk returns a tuple with the Status field value if set, nil otherwise
// and a boolean to check if the value has been set.
func (o *BaseResponse) GetStatusOk() (*int32, bool) {
	if o == nil || o.Status == nil {
		return nil, false
	}
	return o.Status, true
}

// HasStatus returns a boolean if a field has been set.
func (o *BaseResponse) HasStatus() bool {
	if o != nil && o.Status != nil {
		return true
	}

	return false
}

// SetStatus gets a reference to the given int32 and assigns it to the Status field.
func (o *BaseResponse) SetStatus(v int32) *BaseResponse {
	o.Status = &v
	return o
}

// GetMessage returns the Message field value if set, zero value otherwise.
func (o *BaseResponse) GetMessage() string {
	if o == nil || o.Message == nil {
		var ret string
		return ret
	}
	return *o.Message
}

// GetMessageOk returns a tuple with the Message field value if set, nil otherwise
// and a boolean to check if the value has been set.
func (o *BaseResponse) GetMessageOk() (*string, bool) {
	if o == nil || o.Message == nil {
		return nil, false
	}
	return o.Message, true
}

// HasMessage returns a boolean if a field has been set.
func (o *BaseResponse) HasMessage() bool {
	if o != nil && o.Message != nil {
		return true
	}

	return false
}

// SetMessage gets a reference to the given string and assigns it to the Message field.
func (o *BaseResponse) SetMessage(v string) *BaseResponse {
	o.Message = &v
	return o
}

func (o BaseResponse) MarshalJSON() ([]byte, error) {
	toSerialize := map[string]any{}
	if o.Status != nil {
		toSerialize["status"] = o.Status
	}
	if o.Message != nil {
		toSerialize["message"] = o.Message
	}
	serialized, err := json.Marshal(toSerialize)
	if err != nil {
		return nil, fmt.Errorf("failed to marshal BaseResponse: %w", err)
	}

	return serialized, nil
}

func (o BaseResponse) String() string {
	out := ""
	out += fmt.Sprintf("  status=%v\n", o.Status)
	out += fmt.Sprintf("  message=%v\n", o.Message)
	return fmt.Sprintf("BaseResponse {\n%s}", out)
}

type NullableBaseResponse struct {
	value *BaseResponse
	isSet bool
}

func (v NullableBaseResponse) Get() *BaseResponse {
	return v.value
}

func (v *NullableBaseResponse) Set(val *BaseResponse) {
	v.value = val
	v.isSet = true
}

func (v NullableBaseResponse) IsSet() bool {
	return v.isSet
}

func (v *NullableBaseResponse) Unset() {
	v.value = nil
	v.isSet = false
}

func NewNullableBaseResponse(val *BaseResponse) *NullableBaseResponse {
	return &NullableBaseResponse{value: val, isSet: true}
}

func (v NullableBaseResponse) MarshalJSON() ([]byte, error) {
	return json.Marshal(v.value) //nolint:wrapcheck
}

func (v *NullableBaseResponse) UnmarshalJSON(src []byte) error {
	v.isSet = true
	return json.Unmarshal(src, &v.value) //nolint:wrapcheck
}
