# coding: utf-8

"""
Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT.
"""

from __future__ import annotations

from json import loads
from sys import version_info
from typing import Any, Dict, List, Optional

from pydantic import BaseModel, ConfigDict, Field

if version_info >= (3, 11):
    from typing import Self
else:
    from typing_extensions import Self


from algoliasearch.abtesting.models.ab_test_configuration import ABTestConfiguration
from algoliasearch.abtesting.models.status import Status
from algoliasearch.abtesting.models.variant import Variant


class ABTest(BaseModel):
    """
    ABTest
    """

    ab_test_id: int = Field(alias="abTestID")
    """ Unique A/B test identifier. """
    click_significance: Optional[float] = Field(default=None, alias="clickSignificance")
    conversion_significance: Optional[float] = Field(
        default=None, alias="conversionSignificance"
    )
    add_to_cart_significance: Optional[float] = Field(
        default=None, alias="addToCartSignificance"
    )
    purchase_significance: Optional[float] = Field(
        default=None, alias="purchaseSignificance"
    )
    revenue_significance: Optional[Dict[str, float]] = Field(
        default=None, alias="revenueSignificance"
    )
    updated_at: str = Field(alias="updatedAt")
    """ Date and time when the A/B test was last updated, in RFC 3339 format. """
    created_at: str = Field(alias="createdAt")
    """ Date and time when the A/B test was created, in RFC 3339 format. """
    end_at: str = Field(alias="endAt")
    """ End date and time of the A/B test, in RFC 3339 format. """
    name: str = Field(alias="name")
    """ A/B test name. """
    status: Status = Field(alias="status")
    variants: List[Variant] = Field(alias="variants")
    """ A/B test variants.  The first variant is your _control_ index, typically your production index. The second variant is an index with changed settings that you want to test against the control.  """
    configuration: Optional[ABTestConfiguration] = Field(
        default=None, alias="configuration"
    )

    model_config = ConfigDict(
        use_enum_values=True,
        populate_by_name=True,
        validate_assignment=True,
        protected_namespaces=(),
    )

    def to_json(self) -> str:
        return self.model_dump_json(by_alias=True, exclude_unset=True)

    @classmethod
    def from_json(cls, json_str: str) -> Optional[Self]:
        """Create an instance of ABTest from a JSON string"""
        return cls.from_dict(loads(json_str))

    def to_dict(self) -> Dict[str, Any]:
        """Return the dictionary representation of the model using alias."""
        return self.model_dump(
            by_alias=True,
            exclude_none=True,
            exclude_unset=True,
        )

    @classmethod
    def from_dict(cls, obj: Optional[Dict[str, Any]]) -> Optional[Self]:
        """Create an instance of ABTest from a dict"""
        if obj is None:
            return None

        if not isinstance(obj, dict):
            return cls.model_validate(obj)

        obj["status"] = obj.get("status")
        obj["variants"] = (
            [Variant.from_dict(_item) for _item in obj["variants"]]
            if obj.get("variants") is not None
            else None
        )
        obj["configuration"] = (
            ABTestConfiguration.from_dict(obj["configuration"])
            if obj.get("configuration") is not None
            else None
        )

        return cls.model_validate(obj)
