// Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT.
// ignore_for_file: unused_element
import 'package:algolia_client_composition/src/model/search_for_facet_values_params.dart';

import 'package:json_annotation/json_annotation.dart';

part 'search_for_facet_values_request.g.dart';

@JsonSerializable()
final class SearchForFacetValuesRequest {
  /// Returns a new [SearchForFacetValuesRequest] instance.
  const SearchForFacetValuesRequest({
    this.params,
  });

  @JsonKey(name: r'params')
  final SearchForFacetValuesParams? params;

  @override
  bool operator ==(Object other) =>
      identical(this, other) ||
      other is SearchForFacetValuesRequest && other.params == params;

  @override
  int get hashCode => params.hashCode;

  factory SearchForFacetValuesRequest.fromJson(Map<String, dynamic> json) =>
      _$SearchForFacetValuesRequestFromJson(json);

  Map<String, dynamic> toJson() => _$SearchForFacetValuesRequestToJson(this);

  @override
  String toString() {
    return toJson().toString();
  }
}
