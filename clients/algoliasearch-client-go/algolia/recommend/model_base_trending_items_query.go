// File generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation.
package recommend

import (
	"encoding/json"
	"fmt"
)

// BaseTrendingItemsQuery struct for BaseTrendingItemsQuery.
type BaseTrendingItemsQuery struct {
	// Facet name for trending models.
	FacetName *string `json:"facetName,omitempty"`
	// Facet value for trending models.
	FacetValue         *string             `json:"facetValue,omitempty"`
	Model              *TrendingItemsModel `json:"model,omitempty"`
	QueryParameters    *SearchParamsObject `json:"queryParameters,omitempty"`
	FallbackParameters *SearchParamsObject `json:"fallbackParameters,omitempty"`
}

type BaseTrendingItemsQueryOption func(f *BaseTrendingItemsQuery)

func WithBaseTrendingItemsQueryFacetName(val string) BaseTrendingItemsQueryOption {
	return func(f *BaseTrendingItemsQuery) {
		f.FacetName = &val
	}
}

func WithBaseTrendingItemsQueryFacetValue(val string) BaseTrendingItemsQueryOption {
	return func(f *BaseTrendingItemsQuery) {
		f.FacetValue = &val
	}
}

func WithBaseTrendingItemsQueryModel(val TrendingItemsModel) BaseTrendingItemsQueryOption {
	return func(f *BaseTrendingItemsQuery) {
		f.Model = &val
	}
}

func WithBaseTrendingItemsQueryQueryParameters(val SearchParamsObject) BaseTrendingItemsQueryOption {
	return func(f *BaseTrendingItemsQuery) {
		f.QueryParameters = &val
	}
}

func WithBaseTrendingItemsQueryFallbackParameters(val SearchParamsObject) BaseTrendingItemsQueryOption {
	return func(f *BaseTrendingItemsQuery) {
		f.FallbackParameters = &val
	}
}

// NewBaseTrendingItemsQuery instantiates a new BaseTrendingItemsQuery object
// This constructor will assign default values to properties that have it defined,
// and makes sure properties required by API are set, but the set of arguments
// will change when the set of required properties is changed.
func NewBaseTrendingItemsQuery(opts ...BaseTrendingItemsQueryOption) *BaseTrendingItemsQuery {
	this := &BaseTrendingItemsQuery{}
	for _, opt := range opts {
		opt(this)
	}
	return this
}

// NewEmptyBaseTrendingItemsQuery return a pointer to an empty BaseTrendingItemsQuery object.
func NewEmptyBaseTrendingItemsQuery() *BaseTrendingItemsQuery {
	return &BaseTrendingItemsQuery{}
}

// GetFacetName returns the FacetName field value if set, zero value otherwise.
func (o *BaseTrendingItemsQuery) GetFacetName() string {
	if o == nil || o.FacetName == nil {
		var ret string
		return ret
	}
	return *o.FacetName
}

// GetFacetNameOk returns a tuple with the FacetName field value if set, nil otherwise
// and a boolean to check if the value has been set.
func (o *BaseTrendingItemsQuery) GetFacetNameOk() (*string, bool) {
	if o == nil || o.FacetName == nil {
		return nil, false
	}
	return o.FacetName, true
}

// HasFacetName returns a boolean if a field has been set.
func (o *BaseTrendingItemsQuery) HasFacetName() bool {
	if o != nil && o.FacetName != nil {
		return true
	}

	return false
}

// SetFacetName gets a reference to the given string and assigns it to the FacetName field.
func (o *BaseTrendingItemsQuery) SetFacetName(v string) *BaseTrendingItemsQuery {
	o.FacetName = &v
	return o
}

// GetFacetValue returns the FacetValue field value if set, zero value otherwise.
func (o *BaseTrendingItemsQuery) GetFacetValue() string {
	if o == nil || o.FacetValue == nil {
		var ret string
		return ret
	}
	return *o.FacetValue
}

// GetFacetValueOk returns a tuple with the FacetValue field value if set, nil otherwise
// and a boolean to check if the value has been set.
func (o *BaseTrendingItemsQuery) GetFacetValueOk() (*string, bool) {
	if o == nil || o.FacetValue == nil {
		return nil, false
	}
	return o.FacetValue, true
}

// HasFacetValue returns a boolean if a field has been set.
func (o *BaseTrendingItemsQuery) HasFacetValue() bool {
	if o != nil && o.FacetValue != nil {
		return true
	}

	return false
}

// SetFacetValue gets a reference to the given string and assigns it to the FacetValue field.
func (o *BaseTrendingItemsQuery) SetFacetValue(v string) *BaseTrendingItemsQuery {
	o.FacetValue = &v
	return o
}

// GetModel returns the Model field value if set, zero value otherwise.
func (o *BaseTrendingItemsQuery) GetModel() TrendingItemsModel {
	if o == nil || o.Model == nil {
		var ret TrendingItemsModel
		return ret
	}
	return *o.Model
}

// GetModelOk returns a tuple with the Model field value if set, nil otherwise
// and a boolean to check if the value has been set.
func (o *BaseTrendingItemsQuery) GetModelOk() (*TrendingItemsModel, bool) {
	if o == nil || o.Model == nil {
		return nil, false
	}
	return o.Model, true
}

// HasModel returns a boolean if a field has been set.
func (o *BaseTrendingItemsQuery) HasModel() bool {
	if o != nil && o.Model != nil {
		return true
	}

	return false
}

// SetModel gets a reference to the given TrendingItemsModel and assigns it to the Model field.
func (o *BaseTrendingItemsQuery) SetModel(v TrendingItemsModel) *BaseTrendingItemsQuery {
	o.Model = &v
	return o
}

// GetQueryParameters returns the QueryParameters field value if set, zero value otherwise.
func (o *BaseTrendingItemsQuery) GetQueryParameters() SearchParamsObject {
	if o == nil || o.QueryParameters == nil {
		var ret SearchParamsObject
		return ret
	}
	return *o.QueryParameters
}

// GetQueryParametersOk returns a tuple with the QueryParameters field value if set, nil otherwise
// and a boolean to check if the value has been set.
func (o *BaseTrendingItemsQuery) GetQueryParametersOk() (*SearchParamsObject, bool) {
	if o == nil || o.QueryParameters == nil {
		return nil, false
	}
	return o.QueryParameters, true
}

// HasQueryParameters returns a boolean if a field has been set.
func (o *BaseTrendingItemsQuery) HasQueryParameters() bool {
	if o != nil && o.QueryParameters != nil {
		return true
	}

	return false
}

// SetQueryParameters gets a reference to the given SearchParamsObject and assigns it to the QueryParameters field.
func (o *BaseTrendingItemsQuery) SetQueryParameters(v *SearchParamsObject) *BaseTrendingItemsQuery {
	o.QueryParameters = v
	return o
}

// GetFallbackParameters returns the FallbackParameters field value if set, zero value otherwise.
func (o *BaseTrendingItemsQuery) GetFallbackParameters() SearchParamsObject {
	if o == nil || o.FallbackParameters == nil {
		var ret SearchParamsObject
		return ret
	}
	return *o.FallbackParameters
}

// GetFallbackParametersOk returns a tuple with the FallbackParameters field value if set, nil otherwise
// and a boolean to check if the value has been set.
func (o *BaseTrendingItemsQuery) GetFallbackParametersOk() (*SearchParamsObject, bool) {
	if o == nil || o.FallbackParameters == nil {
		return nil, false
	}
	return o.FallbackParameters, true
}

// HasFallbackParameters returns a boolean if a field has been set.
func (o *BaseTrendingItemsQuery) HasFallbackParameters() bool {
	if o != nil && o.FallbackParameters != nil {
		return true
	}

	return false
}

// SetFallbackParameters gets a reference to the given SearchParamsObject and assigns it to the FallbackParameters field.
func (o *BaseTrendingItemsQuery) SetFallbackParameters(v *SearchParamsObject) *BaseTrendingItemsQuery {
	o.FallbackParameters = v
	return o
}

func (o BaseTrendingItemsQuery) MarshalJSON() ([]byte, error) {
	toSerialize := map[string]any{}
	if o.FacetName != nil {
		toSerialize["facetName"] = o.FacetName
	}
	if o.FacetValue != nil {
		toSerialize["facetValue"] = o.FacetValue
	}
	if o.Model != nil {
		toSerialize["model"] = o.Model
	}
	if o.QueryParameters != nil {
		toSerialize["queryParameters"] = o.QueryParameters
	}
	if o.FallbackParameters != nil {
		toSerialize["fallbackParameters"] = o.FallbackParameters
	}
	serialized, err := json.Marshal(toSerialize)
	if err != nil {
		return nil, fmt.Errorf("failed to marshal BaseTrendingItemsQuery: %w", err)
	}

	return serialized, nil
}

func (o BaseTrendingItemsQuery) String() string {
	out := ""
	out += fmt.Sprintf("  facetName=%v\n", o.FacetName)
	out += fmt.Sprintf("  facetValue=%v\n", o.FacetValue)
	out += fmt.Sprintf("  model=%v\n", o.Model)
	out += fmt.Sprintf("  queryParameters=%v\n", o.QueryParameters)
	out += fmt.Sprintf("  fallbackParameters=%v\n", o.FallbackParameters)
	return fmt.Sprintf("BaseTrendingItemsQuery {\n%s}", out)
}

type NullableBaseTrendingItemsQuery struct {
	value *BaseTrendingItemsQuery
	isSet bool
}

func (v NullableBaseTrendingItemsQuery) Get() *BaseTrendingItemsQuery {
	return v.value
}

func (v *NullableBaseTrendingItemsQuery) Set(val *BaseTrendingItemsQuery) {
	v.value = val
	v.isSet = true
}

func (v NullableBaseTrendingItemsQuery) IsSet() bool {
	return v.isSet
}

func (v *NullableBaseTrendingItemsQuery) Unset() {
	v.value = nil
	v.isSet = false
}

func NewNullableBaseTrendingItemsQuery(val *BaseTrendingItemsQuery) *NullableBaseTrendingItemsQuery {
	return &NullableBaseTrendingItemsQuery{value: val, isSet: true}
}

func (v NullableBaseTrendingItemsQuery) MarshalJSON() ([]byte, error) {
	return json.Marshal(v.value) //nolint:wrapcheck
}

func (v *NullableBaseTrendingItemsQuery) UnmarshalJSON(src []byte) error {
	v.isSet = true
	return json.Unmarshal(src, &v.value) //nolint:wrapcheck
}
