// Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT.
package recommend

import (
	"encoding/json"
	"fmt"
)

// RecommendationModels The recommendation model to use.
type RecommendationModels string

// List of recommendationModels
const (
	RECOMMENDATIONMODELS_RELATED_PRODUCTS RecommendationModels = "related-products"
	RECOMMENDATIONMODELS_BOUGHT_TOGETHER  RecommendationModels = "bought-together"
)

// All allowed values of RecommendationModels enum
var AllowedRecommendationModelsEnumValues = []RecommendationModels{
	"related-products",
	"bought-together",
}

func (v *RecommendationModels) UnmarshalJSON(src []byte) error {
	var value string
	err := json.Unmarshal(src, &value)
	if err != nil {
		return err
	}
	enumTypeValue := RecommendationModels(value)
	for _, existing := range AllowedRecommendationModelsEnumValues {
		if existing == enumTypeValue {
			*v = enumTypeValue
			return nil
		}
	}

	return fmt.Errorf("%+v is not a valid RecommendationModels", value)
}

// NewRecommendationModelsFromValue returns a pointer to a valid RecommendationModels
// for the value passed as argument, or an error if the value passed is not allowed by the enum
func NewRecommendationModelsFromValue(v string) (*RecommendationModels, error) {
	ev := RecommendationModels(v)
	if ev.IsValid() {
		return &ev, nil
	} else {
		return nil, fmt.Errorf("invalid value '%v' for RecommendationModels: valid values are %v", v, AllowedRecommendationModelsEnumValues)
	}
}

// IsValid return true if the value is valid for the enum, false otherwise
func (v RecommendationModels) IsValid() bool {
	for _, existing := range AllowedRecommendationModelsEnumValues {
		if existing == v {
			return true
		}
	}
	return false
}

// Ptr returns reference to recommendationModels value
func (v RecommendationModels) Ptr() *RecommendationModels {
	return &v
}

type NullableRecommendationModels struct {
	value *RecommendationModels
	isSet bool
}

func (v NullableRecommendationModels) Get() *RecommendationModels {
	return v.value
}

func (v *NullableRecommendationModels) Set(val *RecommendationModels) {
	v.value = val
	v.isSet = true
}

func (v NullableRecommendationModels) IsSet() bool {
	return v.isSet
}

func (v *NullableRecommendationModels) Unset() {
	v.value = nil
	v.isSet = false
}

func NewNullableRecommendationModels(val *RecommendationModels) *NullableRecommendationModels {
	return &NullableRecommendationModels{value: val, isSet: true}
}

func (v NullableRecommendationModels) MarshalJSON() ([]byte, error) {
	return json.Marshal(v.value)
}

func (v *NullableRecommendationModels) UnmarshalJSON(src []byte) error {
	v.isSet = true
	return json.Unmarshal(src, &v.value)
}
