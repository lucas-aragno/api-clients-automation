// Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost
// - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT.

package com.algolia.model.composition;

import com.algolia.exceptions.AlgoliaRuntimeException;
import com.fasterxml.jackson.annotation.*;
import com.fasterxml.jackson.core.*;
import com.fasterxml.jackson.core.type.TypeReference;
import com.fasterxml.jackson.databind.*;
import com.fasterxml.jackson.databind.annotation.*;
import java.io.IOException;
import java.util.List;
import java.util.Map;
import java.util.logging.Logger;

/** HighlightResult */
@JsonDeserialize(using = HighlightResult.Deserializer.class)
public interface HighlightResult {
  // HighlightResult as Map<String, HighlightResult> wrapper.
  static HighlightResult of(Map<String, HighlightResult> value) {
    return new MapOfStringHighlightResultWrapper(value);
  }

  // HighlightResult as List<HighlightResult> wrapper.
  static HighlightResult of(List<HighlightResult> value) {
    return new ListOfHighlightResultWrapper(value);
  }

  // HighlightResult as Map<String, HighlightResult> wrapper.
  @JsonSerialize(using = MapOfStringHighlightResultWrapper.Serializer.class)
  class MapOfStringHighlightResultWrapper implements HighlightResult {

    private final Map<String, HighlightResult> value;

    MapOfStringHighlightResultWrapper(Map<String, HighlightResult> value) {
      this.value = value;
    }

    public Map<String, HighlightResult> getValue() {
      return value;
    }

    static class Serializer extends JsonSerializer<MapOfStringHighlightResultWrapper> {

      @Override
      public void serialize(MapOfStringHighlightResultWrapper value, JsonGenerator gen, SerializerProvider provider) throws IOException {
        gen.writeObject(value.getValue());
      }
    }
  }

  // HighlightResult as List<HighlightResult> wrapper.
  @JsonSerialize(using = ListOfHighlightResultWrapper.Serializer.class)
  class ListOfHighlightResultWrapper implements HighlightResult {

    private final List<HighlightResult> value;

    ListOfHighlightResultWrapper(List<HighlightResult> value) {
      this.value = value;
    }

    public List<HighlightResult> getValue() {
      return value;
    }

    static class Serializer extends JsonSerializer<ListOfHighlightResultWrapper> {

      @Override
      public void serialize(ListOfHighlightResultWrapper value, JsonGenerator gen, SerializerProvider provider) throws IOException {
        gen.writeObject(value.getValue());
      }
    }
  }

  class Deserializer extends JsonDeserializer<HighlightResult> {

    private static final Logger LOGGER = Logger.getLogger(Deserializer.class.getName());

    @Override
    public HighlightResult deserialize(JsonParser jp, DeserializationContext ctxt) throws IOException {
      JsonNode tree = jp.readValueAsTree();
      // deserialize HighlightResultOption
      if (tree.isObject() && tree.has("matchLevel") && tree.has("matchedWords")) {
        try (JsonParser parser = tree.traverse(jp.getCodec())) {
          return parser.readValueAs(HighlightResultOption.class);
        } catch (Exception e) {
          // deserialization failed, continue
          LOGGER.finest("Failed to deserialize oneOf HighlightResultOption (error: " + e.getMessage() + ") (type: HighlightResultOption)");
        }
      }
      // deserialize Map<String, HighlightResult>
      if (tree.isObject()) {
        try (JsonParser parser = tree.traverse(jp.getCodec())) {
          Map<String, HighlightResult> value = parser.readValueAs(new TypeReference<Map<String, HighlightResult>>() {});
          return new HighlightResult.MapOfStringHighlightResultWrapper(value);
        } catch (Exception e) {
          // deserialization failed, continue
          LOGGER.finest(
            "Failed to deserialize oneOf Map<String, HighlightResult> (error: " + e.getMessage() + ") (type: Map<String, HighlightResult>)"
          );
        }
      }
      // deserialize List<HighlightResult>
      if (tree.isArray()) {
        try (JsonParser parser = tree.traverse(jp.getCodec())) {
          List<HighlightResult> value = parser.readValueAs(new TypeReference<List<HighlightResult>>() {});
          return new HighlightResult.ListOfHighlightResultWrapper(value);
        } catch (Exception e) {
          // deserialization failed, continue
          LOGGER.finest("Failed to deserialize oneOf List<HighlightResult> (error: " + e.getMessage() + ") (type: List<HighlightResult>)");
        }
      }
      throw new AlgoliaRuntimeException(String.format("Failed to deserialize json element: %s", tree));
    }

    /** Handle deserialization of the 'null' value. */
    @Override
    public HighlightResult getNullValue(DeserializationContext ctxt) throws JsonMappingException {
      throw new JsonMappingException(ctxt.getParser(), "HighlightResult cannot be null");
    }
  }
}
