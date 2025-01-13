# Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT.

require "date"
require "time"

module Algolia
  module Recommend
    # Filters to promote or demote records in the search results.  Optional filters work like facet filters, but they don't exclude records from the search results. Records that match the optional filter rank before records that don't match. If you're using a negative filter `facet:-value`, matching records rank after records that don't match.  - Optional filters don't work on virtual replicas. - Optional filters are applied _after_ sort-by attributes. - Optional filters are applied _before_ custom ranking attributes (in the default [ranking](https://www.algolia.com/doc/guides/managing-results/relevance-overview/in-depth/ranking-criteria/)). - Optional filters don't work with numeric attributes.
    module OptionalFilters
      class << self
      # List of class defined in oneOf (OpenAPI v3)
        def openapi_one_of
          [
            :"Array<OptionalFilters>",
            :"String"
          ]
        end

        # Builds the object
        # @param [Mixed] Data to be matched against the list of oneOf items
        # @return [Object] Returns the model or the data itself
        def build(data)
          # Go through the list of oneOf items and attempt to identify the appropriate one.
          # Note:
          # - We do not attempt to check whether exactly one item matches.
          # - No advanced validation of types in some cases (e.g. "x: { type: string }" will happily match { x: 123 })
          #   due to the way the deserialization is made in the base_object template (it just casts without verifying).
          # - TODO: scalar values are de facto behaving as if they were nullable.
          # - TODO: logging when debugging is set.
          openapi_one_of.each do |klass|
            begin
              # "nullable: true"
              next if klass == :AnyType
              typed_data = find_and_cast_into_type(klass, data)
              return typed_data if typed_data
              # rescue all errors so we keep iterating even if the current item lookup raises
            rescue
            end
          end

          openapi_one_of.include?(:AnyType) ? data : nil
        end

        private

        SchemaMismatchError = Class.new(StandardError)

        def find_and_cast_into_type(klass, data)
          return if data.nil?

          case klass.to_s
          when "Boolean"
            return data if data.instance_of?(TrueClass) || data.instance_of?(FalseClass)
          when "Float"
            return data if data.instance_of?(Float)
          when "Integer"
            return data if data.instance_of?(Integer)
          when "Time"
            return Time.parse(data)
          when "Date"
            return Date.parse(data)
          when "String"
            return data if data.instance_of?(String)
            # "type: object"
          when "Object"
            return data if data.instance_of?(Hash)
            # "type: array"
          when /\AArray<(?<sub_type>.+)>\z/
            if data.instance_of?(Array)
              sub_type = Regexp.last_match[:sub_type]
              return data.map { |item| find_and_cast_into_type(sub_type, item) }
            end
            # "type: object" with "additionalProperties: { ... }"
          when /\AHash<String, (?<sub_type>.+)>\z/
            if data.instance_of?(Hash) && data.keys.all? { |k| k.instance_of?(Symbol) || k.instance_of?(String) }
              sub_type = Regexp.last_match[:sub_type]
              return data.each_with_object({}) { |(k, v), hsh| hsh[k] = find_and_cast_into_type(sub_type, v) }
            end
            # model
          else
            const = Algolia::Recommend.const_get(klass)
            if const
              if const.respond_to?(:openapi_one_of)
                # nested oneOf model
                model = const.build(data)
              elsif const.respond_to?(:discriminator_attributes)
                if const.discriminator_attributes.all? { |attr| data.key?(attr) }
                  model = const.build_from_hash(data)
                end
              else
                # maybe it's an enum, or doens't have discriminators
                model = const.build_from_hash(data)
              end

              return model if model
            end
          end

          # if no match by now, raise
          raise
        rescue
          raise SchemaMismatchError, "#{data} doesn't match the #{klass} type"
        end
      end
    end

  end
end
