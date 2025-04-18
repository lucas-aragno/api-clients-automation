# frozen_string_literal: true

# Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT.

require "date"
require "time"

module Algolia
  module Analytics
    class TopHitWithRevenueAnalytics
      # Object ID of a record returned as a search result.
      attr_accessor :hit

      # Number of occurrences.
      attr_accessor :count

      # Click-through rate: calculated as the number of tracked searches with at least one click event divided by the number of tracked searches. If null, Algolia didn't receive any search requests with `clickAnalytics` set to true.
      attr_accessor :click_through_rate

      # Conversion rate: calculated as the number of tracked searches with at least one conversion event divided by the number of tracked searches. If null, Algolia didn't receive any search requests with `clickAnalytics` set to true.
      attr_accessor :conversion_rate

      # Number of tracked searches. Tracked searches are search requests where the `clickAnalytics` parameter is true.
      attr_accessor :tracked_hit_count

      # Number of clicks associated with this search.
      attr_accessor :click_count

      # Number of conversions from this search.
      attr_accessor :conversion_count

      # Add-to-cart rate: calculated as the number of tracked searches with at least one add-to-cart event divided by the number of tracked searches. If null, Algolia didn't receive any search requests with `clickAnalytics` set to true.
      attr_accessor :add_to_cart_rate

      # Number of add-to-cart events from this search.
      attr_accessor :add_to_cart_count

      # Purchase rate: calculated as the number of tracked searches with at least one purchase event divided by the number of tracked searches. If null, Algolia didn't receive any search requests with `clickAnalytics` set to true.
      attr_accessor :purchase_rate

      # Number of purchase events from this search.
      attr_accessor :purchase_count

      # Revenue associated with this search: broken down by currency.
      attr_accessor :currencies

      # Attribute mapping from ruby-style variable name to JSON key.
      def self.attribute_map
        {
          :hit => :hit,
          :count => :count,
          :click_through_rate => :clickThroughRate,
          :conversion_rate => :conversionRate,
          :tracked_hit_count => :trackedHitCount,
          :click_count => :clickCount,
          :conversion_count => :conversionCount,
          :add_to_cart_rate => :addToCartRate,
          :add_to_cart_count => :addToCartCount,
          :purchase_rate => :purchaseRate,
          :purchase_count => :purchaseCount,
          :currencies => :currencies
        }
      end

      # Attribute type mapping.
      def self.types_mapping
        {
          :hit => :"String",
          :count => :"Integer",
          :click_through_rate => :"Float",
          :conversion_rate => :"Float",
          :tracked_hit_count => :"Integer",
          :click_count => :"Integer",
          :conversion_count => :"Integer",
          :add_to_cart_rate => :"Float",
          :add_to_cart_count => :"Integer",
          :purchase_rate => :"Float",
          :purchase_count => :"Integer",
          :currencies => :"Hash<String, CurrencyCode>"
        }
      end

      # List of attributes with nullable: true
      def self.openapi_nullable
        Set.new(
          [
            :click_through_rate,
            :conversion_rate,
            :add_to_cart_rate,
            :purchase_rate
          ]
        )
      end

      # Initializes the object
      # @param [Hash] attributes Model attributes in the form of hash
      def initialize(attributes = {})
        if (!attributes.is_a?(Hash))
          raise(
            ArgumentError,
            "The input argument (attributes) must be a hash in `Algolia::TopHitWithRevenueAnalytics` initialize method"
          )
        end

        # check to see if the attribute exists and convert string to symbol for hash key
        attributes = attributes.each_with_object({}) { |(k, v), h|
          if (!self.class.attribute_map.key?(k.to_sym))
            raise(
              ArgumentError,
              "`#{k}` is not a valid attribute in `Algolia::TopHitWithRevenueAnalytics`. Please check the name to make sure it's valid. List of attributes: " +
                self.class.attribute_map.keys.inspect
            )
          end

          h[k.to_sym] = v
        }

        if attributes.key?(:hit)
          self.hit = attributes[:hit]
        else
          self.hit = nil
        end

        if attributes.key?(:count)
          self.count = attributes[:count]
        else
          self.count = nil
        end

        if attributes.key?(:click_through_rate)
          self.click_through_rate = attributes[:click_through_rate]
        else
          self.click_through_rate = nil
        end

        if attributes.key?(:conversion_rate)
          self.conversion_rate = attributes[:conversion_rate]
        else
          self.conversion_rate = nil
        end

        if attributes.key?(:tracked_hit_count)
          self.tracked_hit_count = attributes[:tracked_hit_count]
        else
          self.tracked_hit_count = nil
        end

        if attributes.key?(:click_count)
          self.click_count = attributes[:click_count]
        else
          self.click_count = nil
        end

        if attributes.key?(:conversion_count)
          self.conversion_count = attributes[:conversion_count]
        else
          self.conversion_count = nil
        end

        if attributes.key?(:add_to_cart_rate)
          self.add_to_cart_rate = attributes[:add_to_cart_rate]
        else
          self.add_to_cart_rate = nil
        end

        if attributes.key?(:add_to_cart_count)
          self.add_to_cart_count = attributes[:add_to_cart_count]
        else
          self.add_to_cart_count = nil
        end

        if attributes.key?(:purchase_rate)
          self.purchase_rate = attributes[:purchase_rate]
        else
          self.purchase_rate = nil
        end

        if attributes.key?(:purchase_count)
          self.purchase_count = attributes[:purchase_count]
        else
          self.purchase_count = nil
        end

        if attributes.key?(:currencies)
          if (value = attributes[:currencies]).is_a?(Hash)
            self.currencies = value
          end
        else
          self.currencies = nil
        end
      end

      # Checks equality by comparing each attribute.
      # @param [Object] Object to be compared
      def ==(other)
        return true if self.equal?(other)
        self.class == other.class &&
          hit == other.hit &&
          count == other.count &&
          click_through_rate == other.click_through_rate &&
          conversion_rate == other.conversion_rate &&
          tracked_hit_count == other.tracked_hit_count &&
          click_count == other.click_count &&
          conversion_count == other.conversion_count &&
          add_to_cart_rate == other.add_to_cart_rate &&
          add_to_cart_count == other.add_to_cart_count &&
          purchase_rate == other.purchase_rate &&
          purchase_count == other.purchase_count &&
          currencies == other.currencies
      end

      # @see the `==` method
      # @param [Object] Object to be compared
      def eql?(other)
        self == other
      end

      # Calculates hash code according to all attributes.
      # @return [Integer] Hash code
      def hash
        [
          hit,
          count,
          click_through_rate,
          conversion_rate,
          tracked_hit_count,
          click_count,
          conversion_count,
          add_to_cart_rate,
          add_to_cart_count,
          purchase_rate,
          purchase_count,
          currencies
        ].hash
      end

      # Builds the object from hash
      # @param [Hash] attributes Model attributes in the form of hash
      # @return [Object] Returns the model itself
      def self.build_from_hash(attributes)
        return nil unless attributes.is_a?(Hash)
        attributes = attributes.transform_keys(&:to_sym)
        transformed_hash = {}
        types_mapping.each_pair do |key, type|
          if attributes.key?(attribute_map[key]) && attributes[attribute_map[key]].nil?
            transformed_hash[key.to_sym] = nil
          elsif type =~ /\AArray<(.*)>/i
            # check to ensure the input is an array given that the attribute
            # is documented as an array but the input is not
            if attributes[attribute_map[key]].is_a?(Array)
              transformed_hash[key.to_sym] = attributes[attribute_map[key]].map { |v|
                _deserialize(::Regexp.last_match(1), v)
              }
            end
          elsif !attributes[attribute_map[key]].nil?
            transformed_hash[key.to_sym] = _deserialize(type, attributes[attribute_map[key]])
          end
        end

        new(transformed_hash)
      end

      # Deserializes the data based on type
      # @param string type Data type
      # @param string value Value to be deserialized
      # @return [Object] Deserialized data
      def self._deserialize(type, value)
        case type.to_sym
        when :Time
          Time.parse(value)
        when :Date
          Date.parse(value)
        when :String
          value.to_s
        when :Integer
          value.to_i
        when :Float
          value.to_f
        when :Boolean
          if value.to_s =~ /\A(true|t|yes|y|1)\z/i
            true
          else
            false
          end

        when :Object
          # generic object (usually a Hash), return directly
          value
        when /\AArray<(?<inner_type>.+)>\z/
          inner_type = Regexp.last_match[:inner_type]
          value.map { |v| _deserialize(inner_type, v) }
        when /\AHash<(?<k_type>.+?), (?<v_type>.+)>\z/
          k_type = Regexp.last_match[:k_type]
          v_type = Regexp.last_match[:v_type]
          {}.tap do |hash|
            value.each do |k, v|
              hash[_deserialize(k_type, k)] = _deserialize(v_type, v)
            end
          end
          # model
        else
          # models (e.g. Pet) or oneOf
          klass = Algolia::Analytics.const_get(type)
          klass.respond_to?(:openapi_any_of) || klass.respond_to?(:openapi_one_of) ? klass.build(value) : klass
            .build_from_hash(value)
        end
      end

      # Returns the string representation of the object
      # @return [String] String presentation of the object
      def to_s
        to_hash.to_s
      end

      # to_body is an alias to to_hash (backward compatibility)
      # @return [Hash] Returns the object in the form of hash
      def to_body
        to_hash
      end

      def to_json(*_args)
        to_hash.to_json
      end

      # Returns the object in the form of hash
      # @return [Hash] Returns the object in the form of hash
      def to_hash
        hash = {}
        self.class.attribute_map.each_pair do |attr, param|
          value = send(attr)
          if value.nil?
            is_nullable = self.class.openapi_nullable.include?(attr)
            next if !is_nullable || (is_nullable && !instance_variable_defined?(:"@#{attr}"))
          end

          hash[param] = _to_hash(value)
        end

        hash
      end

      # Outputs non-array value in the form of hash
      # For object, use to_hash. Otherwise, just return the value
      # @param [Object] value Any valid value
      # @return [Hash] Returns the value in the form of hash
      def _to_hash(value)
        if value.is_a?(Array)
          value.compact.map { |v| _to_hash(v) }
        elsif value.is_a?(Hash)
          {}.tap do |hash|
            value.each { |k, v| hash[k] = _to_hash(v) }
          end
        elsif value.respond_to?(:to_hash)
          value.to_hash
        else
          value
        end
      end

    end

  end
end
