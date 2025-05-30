// Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT.
package analytics

import (
	"encoding/json"
	"fmt"

	"github.com/algolia/algoliasearch-client-go/v4/algolia/utils"
)

// DailyClickThroughRates struct for DailyClickThroughRates.
type DailyClickThroughRates struct {
	// Click-through rate: calculated as the number of tracked searches with at least one click event divided by the number of tracked searches. If null, Algolia didn't receive any search requests with `clickAnalytics` set to true.
	Rate utils.Nullable[float64] `json:"rate"`
	// Number of clicks associated with this search.
	ClickCount int32 `json:"clickCount"`
	// Number of tracked searches. Tracked searches are search requests where the `clickAnalytics` parameter is true.
	TrackedSearchCount int32 `json:"trackedSearchCount"`
	// Date in the format YYYY-MM-DD.
	Date string `json:"date"`
}

// NewDailyClickThroughRates instantiates a new DailyClickThroughRates object
// This constructor will assign default values to properties that have it defined,
// and makes sure properties required by API are set, but the set of arguments
// will change when the set of required properties is changed.
func NewDailyClickThroughRates(rate utils.Nullable[float64], clickCount int32, trackedSearchCount int32, date string) *DailyClickThroughRates {
	this := &DailyClickThroughRates{}
	this.Rate = rate
	this.ClickCount = clickCount
	this.TrackedSearchCount = trackedSearchCount
	this.Date = date
	return this
}

// NewEmptyDailyClickThroughRates return a pointer to an empty DailyClickThroughRates object.
func NewEmptyDailyClickThroughRates() *DailyClickThroughRates {
	return &DailyClickThroughRates{}
}

// GetRate returns the Rate field value.
// If the value is explicit nil, the zero value for float64 will be returned.
func (o *DailyClickThroughRates) GetRate() float64 {
	if o == nil || o.Rate.Get() == nil {
		var ret float64
		return ret
	}

	return *o.Rate.Get()
}

// GetRateOk returns a tuple with the Rate field value
// and a boolean to check if the value has been set.
// NOTE: If the value is an explicit nil, `nil, true` will be returned.
func (o *DailyClickThroughRates) GetRateOk() (*float64, bool) {
	if o == nil {
		return nil, false
	}
	return o.Rate.Get(), o.Rate.IsSet()
}

// SetRate sets field value.
func (o *DailyClickThroughRates) SetRate(v float64) *DailyClickThroughRates {
	o.Rate.Set(&v)
	return o
}

// GetClickCount returns the ClickCount field value.
func (o *DailyClickThroughRates) GetClickCount() int32 {
	if o == nil {
		var ret int32
		return ret
	}

	return o.ClickCount
}

// GetClickCountOk returns a tuple with the ClickCount field value
// and a boolean to check if the value has been set.
func (o *DailyClickThroughRates) GetClickCountOk() (*int32, bool) {
	if o == nil {
		return nil, false
	}
	return &o.ClickCount, true
}

// SetClickCount sets field value.
func (o *DailyClickThroughRates) SetClickCount(v int32) *DailyClickThroughRates {
	o.ClickCount = v
	return o
}

// GetTrackedSearchCount returns the TrackedSearchCount field value.
func (o *DailyClickThroughRates) GetTrackedSearchCount() int32 {
	if o == nil {
		var ret int32
		return ret
	}

	return o.TrackedSearchCount
}

// GetTrackedSearchCountOk returns a tuple with the TrackedSearchCount field value
// and a boolean to check if the value has been set.
func (o *DailyClickThroughRates) GetTrackedSearchCountOk() (*int32, bool) {
	if o == nil {
		return nil, false
	}
	return &o.TrackedSearchCount, true
}

// SetTrackedSearchCount sets field value.
func (o *DailyClickThroughRates) SetTrackedSearchCount(v int32) *DailyClickThroughRates {
	o.TrackedSearchCount = v
	return o
}

// GetDate returns the Date field value.
func (o *DailyClickThroughRates) GetDate() string {
	if o == nil {
		var ret string
		return ret
	}

	return o.Date
}

// GetDateOk returns a tuple with the Date field value
// and a boolean to check if the value has been set.
func (o *DailyClickThroughRates) GetDateOk() (*string, bool) {
	if o == nil {
		return nil, false
	}
	return &o.Date, true
}

// SetDate sets field value.
func (o *DailyClickThroughRates) SetDate(v string) *DailyClickThroughRates {
	o.Date = v
	return o
}

func (o DailyClickThroughRates) MarshalJSON() ([]byte, error) {
	toSerialize := map[string]any{}
	if true {
		toSerialize["rate"] = o.Rate.Get()
	}
	if true {
		toSerialize["clickCount"] = o.ClickCount
	}
	if true {
		toSerialize["trackedSearchCount"] = o.TrackedSearchCount
	}
	if true {
		toSerialize["date"] = o.Date
	}
	serialized, err := json.Marshal(toSerialize)
	if err != nil {
		return nil, fmt.Errorf("failed to marshal DailyClickThroughRates: %w", err)
	}

	return serialized, nil
}

func (o DailyClickThroughRates) String() string {
	out := ""
	out += fmt.Sprintf("  rate=%v\n", o.Rate)
	out += fmt.Sprintf("  clickCount=%v\n", o.ClickCount)
	out += fmt.Sprintf("  trackedSearchCount=%v\n", o.TrackedSearchCount)
	out += fmt.Sprintf("  date=%v\n", o.Date)
	return fmt.Sprintf("DailyClickThroughRates {\n%s}", out)
}
