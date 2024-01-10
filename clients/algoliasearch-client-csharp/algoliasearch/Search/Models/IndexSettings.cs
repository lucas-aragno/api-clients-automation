//
// Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT.
//

using System;
using System.Collections;
using System.Collections.Generic;
using System.Collections.ObjectModel;
using System.Linq;
using System.IO;
using System.Runtime.Serialization;
using System.Text;
using System.Text.RegularExpressions;
using Newtonsoft.Json;
using Newtonsoft.Json.Converters;
using Newtonsoft.Json.Linq;
using Algolia.Search.Models;

namespace Algolia.Search.Models.Search
{
  /// <summary>
  /// Algolia index settings.
  /// </summary>
  [DataContract(Name = "indexSettings")]
  public partial class IndexSettings
  {

    /// <summary>
    /// Gets or Sets QueryType
    /// </summary>
    [DataMember(Name = "queryType", EmitDefaultValue = false)]
    public QueryType QueryType { get; set; }

    /// <summary>
    /// Gets or Sets RemoveWordsIfNoResults
    /// </summary>
    [DataMember(Name = "removeWordsIfNoResults", EmitDefaultValue = false)]
    public RemoveWordsIfNoResults RemoveWordsIfNoResults { get; set; }

    /// <summary>
    /// Gets or Sets Mode
    /// </summary>
    [DataMember(Name = "mode", EmitDefaultValue = false)]
    public Mode Mode { get; set; }

    /// <summary>
    /// Gets or Sets ExactOnSingleWordQuery
    /// </summary>
    [DataMember(Name = "exactOnSingleWordQuery", EmitDefaultValue = false)]
    public ExactOnSingleWordQuery ExactOnSingleWordQuery { get; set; }
    /// <summary>
    /// Initializes a new instance of the <see cref="IndexSettings" /> class.
    /// </summary>
    public IndexSettings()
    {
    }

    /// <summary>
    /// Creates [replicas](https://www.algolia.com/doc/guides/managing-results/refine-results/sorting/in-depth/replicas/), which are copies of a primary index with the same records but different settings.
    /// </summary>
    /// <value>Creates [replicas](https://www.algolia.com/doc/guides/managing-results/refine-results/sorting/in-depth/replicas/), which are copies of a primary index with the same records but different settings.</value>
    [DataMember(Name = "replicas", EmitDefaultValue = false)]
    public List<string> Replicas { get; set; }

    /// <summary>
    /// Maximum number of hits accessible through pagination.
    /// </summary>
    /// <value>Maximum number of hits accessible through pagination.</value>
    [DataMember(Name = "paginationLimitedTo", EmitDefaultValue = false)]
    public int? PaginationLimitedTo { get; set; }

    /// <summary>
    /// Attributes that can&#39;t be retrieved at query time.
    /// </summary>
    /// <value>Attributes that can&#39;t be retrieved at query time.</value>
    [DataMember(Name = "unretrievableAttributes", EmitDefaultValue = false)]
    public List<string> UnretrievableAttributes { get; set; }

    /// <summary>
    /// Words for which you want to turn off [typo tolerance](https://www.algolia.com/doc/guides/managing-results/optimize-search-results/typo-tolerance/).
    /// </summary>
    /// <value>Words for which you want to turn off [typo tolerance](https://www.algolia.com/doc/guides/managing-results/optimize-search-results/typo-tolerance/).</value>
    [DataMember(Name = "disableTypoToleranceOnWords", EmitDefaultValue = false)]
    public List<string> DisableTypoToleranceOnWords { get; set; }

    /// <summary>
    /// Attributes in your index to which [Japanese transliteration](https://www.algolia.com/doc/guides/managing-results/optimize-search-results/handling-natural-languages-nlp/in-depth/language-specific-configurations/#japanese-transliteration-and-type-ahead) applies. This will ensure that words indexed in Katakana or Kanji can also be searched in Hiragana.
    /// </summary>
    /// <value>Attributes in your index to which [Japanese transliteration](https://www.algolia.com/doc/guides/managing-results/optimize-search-results/handling-natural-languages-nlp/in-depth/language-specific-configurations/#japanese-transliteration-and-type-ahead) applies. This will ensure that words indexed in Katakana or Kanji can also be searched in Hiragana.</value>
    [DataMember(Name = "attributesToTransliterate", EmitDefaultValue = false)]
    public List<string> AttributesToTransliterate { get; set; }

    /// <summary>
    /// Attributes on which to split [camel case](https://wikipedia.org/wiki/Camel_case) words.
    /// </summary>
    /// <value>Attributes on which to split [camel case](https://wikipedia.org/wiki/Camel_case) words.</value>
    [DataMember(Name = "camelCaseAttributes", EmitDefaultValue = false)]
    public List<string> CamelCaseAttributes { get; set; }

    /// <summary>
    /// Attributes in your index to which [word segmentation](https://www.algolia.com/doc/guides/managing-results/optimize-search-results/handling-natural-languages-nlp/how-to/customize-segmentation/) (decompounding) applies.
    /// </summary>
    /// <value>Attributes in your index to which [word segmentation](https://www.algolia.com/doc/guides/managing-results/optimize-search-results/handling-natural-languages-nlp/how-to/customize-segmentation/) (decompounding) applies.</value>
    [DataMember(Name = "decompoundedAttributes", EmitDefaultValue = false)]
    public Object DecompoundedAttributes { get; set; }

    /// <summary>
    /// Set the languages of your index, for language-specific processing steps such as [tokenization](https://www.algolia.com/doc/guides/managing-results/optimize-search-results/handling-natural-languages-nlp/in-depth/tokenization/) and [normalization](https://www.algolia.com/doc/guides/managing-results/optimize-search-results/handling-natural-languages-nlp/in-depth/normalization/).
    /// </summary>
    /// <value>Set the languages of your index, for language-specific processing steps such as [tokenization](https://www.algolia.com/doc/guides/managing-results/optimize-search-results/handling-natural-languages-nlp/in-depth/tokenization/) and [normalization](https://www.algolia.com/doc/guides/managing-results/optimize-search-results/handling-natural-languages-nlp/in-depth/normalization/).</value>
    [DataMember(Name = "indexLanguages", EmitDefaultValue = false)]
    public List<string> IndexLanguages { get; set; }

    /// <summary>
    /// Attributes for which you want to turn off [prefix matching](https://www.algolia.com/doc/guides/managing-results/optimize-search-results/override-search-engine-defaults/#adjusting-prefix-search).
    /// </summary>
    /// <value>Attributes for which you want to turn off [prefix matching](https://www.algolia.com/doc/guides/managing-results/optimize-search-results/override-search-engine-defaults/#adjusting-prefix-search).</value>
    [DataMember(Name = "disablePrefixOnAttributes", EmitDefaultValue = false)]
    public List<string> DisablePrefixOnAttributes { get; set; }

    /// <summary>
    /// Incidates whether the engine compresses arrays with exclusively non-negative integers. When enabled, the compressed arrays may be reordered. 
    /// </summary>
    /// <value>Incidates whether the engine compresses arrays with exclusively non-negative integers. When enabled, the compressed arrays may be reordered. </value>
    [DataMember(Name = "allowCompressionOfIntegerArray", EmitDefaultValue = true)]
    public bool? AllowCompressionOfIntegerArray { get; set; }

    /// <summary>
    /// Numeric attributes that can be used as [numerical filters](https://www.algolia.com/doc/guides/managing-results/rules/detecting-intent/how-to/applying-a-custom-filter-for-a-specific-query/#numerical-filters).
    /// </summary>
    /// <value>Numeric attributes that can be used as [numerical filters](https://www.algolia.com/doc/guides/managing-results/rules/detecting-intent/how-to/applying-a-custom-filter-for-a-specific-query/#numerical-filters).</value>
    [DataMember(Name = "numericAttributesForFiltering", EmitDefaultValue = false)]
    public List<string> NumericAttributesForFiltering { get; set; }

    /// <summary>
    /// Controls which separators are added to an Algolia index as part of [normalization](https://www.algolia.com/doc/guides/managing-results/optimize-search-results/handling-natural-languages-nlp/#what-does-normalization-mean). Separators are all non-letter characters except spaces and currency characters, such as $€£¥.
    /// </summary>
    /// <value>Controls which separators are added to an Algolia index as part of [normalization](https://www.algolia.com/doc/guides/managing-results/optimize-search-results/handling-natural-languages-nlp/#what-does-normalization-mean). Separators are all non-letter characters except spaces and currency characters, such as $€£¥.</value>
    [DataMember(Name = "separatorsToIndex", EmitDefaultValue = false)]
    public string SeparatorsToIndex { get; set; }

    /// <summary>
    /// [Attributes used for searching](https://www.algolia.com/doc/guides/managing-results/must-do/searchable-attributes/), including determining [if matches at the beginning of a word are important (ordered) or not (unordered)](https://www.algolia.com/doc/guides/managing-results/must-do/searchable-attributes/how-to/configuring-searchable-attributes-the-right-way/#understanding-word-position). 
    /// </summary>
    /// <value>[Attributes used for searching](https://www.algolia.com/doc/guides/managing-results/must-do/searchable-attributes/), including determining [if matches at the beginning of a word are important (ordered) or not (unordered)](https://www.algolia.com/doc/guides/managing-results/must-do/searchable-attributes/how-to/configuring-searchable-attributes-the-right-way/#understanding-word-position). </value>
    [DataMember(Name = "searchableAttributes", EmitDefaultValue = false)]
    public List<string> SearchableAttributes { get; set; }

    /// <summary>
    /// Lets you store custom data in your indices.
    /// </summary>
    /// <value>Lets you store custom data in your indices.</value>
    [DataMember(Name = "userData", EmitDefaultValue = false)]
    public Object UserData { get; set; }

    /// <summary>
    /// A list of characters and their normalized replacements to override Algolia&#39;s default [normalization](https://www.algolia.com/doc/guides/managing-results/optimize-search-results/handling-natural-languages-nlp/in-depth/normalization/).
    /// </summary>
    /// <value>A list of characters and their normalized replacements to override Algolia&#39;s default [normalization](https://www.algolia.com/doc/guides/managing-results/optimize-search-results/handling-natural-languages-nlp/in-depth/normalization/).</value>
    [DataMember(Name = "customNormalization", EmitDefaultValue = false)]
    public Dictionary<string, Dictionary<string, string>> CustomNormalization { get; set; }

    /// <summary>
    /// Name of the deduplication attribute to be used with Algolia&#39;s [_distinct_ feature](https://www.algolia.com/doc/guides/managing-results/refine-results/grouping/#introducing-algolias-distinct-feature).
    /// </summary>
    /// <value>Name of the deduplication attribute to be used with Algolia&#39;s [_distinct_ feature](https://www.algolia.com/doc/guides/managing-results/refine-results/grouping/#introducing-algolias-distinct-feature).</value>
    [DataMember(Name = "attributeForDistinct", EmitDefaultValue = false)]
    public string AttributeForDistinct { get; set; }

    /// <summary>
    /// Attributes used for [faceting](https://www.algolia.com/doc/guides/managing-results/refine-results/faceting/) and the [modifiers](https://www.algolia.com/doc/api-reference/api-parameters/attributesForFaceting/#modifiers) that can be applied: &#x60;filterOnly&#x60;, &#x60;searchable&#x60;, and &#x60;afterDistinct&#x60;. 
    /// </summary>
    /// <value>Attributes used for [faceting](https://www.algolia.com/doc/guides/managing-results/refine-results/faceting/) and the [modifiers](https://www.algolia.com/doc/api-reference/api-parameters/attributesForFaceting/#modifiers) that can be applied: &#x60;filterOnly&#x60;, &#x60;searchable&#x60;, and &#x60;afterDistinct&#x60;. </value>
    [DataMember(Name = "attributesForFaceting", EmitDefaultValue = false)]
    public List<string> AttributesForFaceting { get; set; }

    /// <summary>
    /// Attributes to include in the API response. To reduce the size of your response, you can retrieve only some of the attributes. By default, the response includes all attributes.
    /// </summary>
    /// <value>Attributes to include in the API response. To reduce the size of your response, you can retrieve only some of the attributes. By default, the response includes all attributes.</value>
    [DataMember(Name = "attributesToRetrieve", EmitDefaultValue = false)]
    public List<string> AttributesToRetrieve { get; set; }

    /// <summary>
    /// Determines the order in which Algolia [returns your results](https://www.algolia.com/doc/guides/managing-results/relevance-overview/in-depth/ranking-criteria/).
    /// </summary>
    /// <value>Determines the order in which Algolia [returns your results](https://www.algolia.com/doc/guides/managing-results/relevance-overview/in-depth/ranking-criteria/).</value>
    [DataMember(Name = "ranking", EmitDefaultValue = false)]
    public List<string> Ranking { get; set; }

    /// <summary>
    /// Specifies the [Custom ranking criterion](https://www.algolia.com/doc/guides/managing-results/must-do/custom-ranking/). Use the &#x60;asc&#x60; and &#x60;desc&#x60; modifiers to specify the ranking order: ascending or descending. 
    /// </summary>
    /// <value>Specifies the [Custom ranking criterion](https://www.algolia.com/doc/guides/managing-results/must-do/custom-ranking/). Use the &#x60;asc&#x60; and &#x60;desc&#x60; modifiers to specify the ranking order: ascending or descending. </value>
    [DataMember(Name = "customRanking", EmitDefaultValue = false)]
    public List<string> CustomRanking { get; set; }

    /// <summary>
    /// Relevancy threshold below which less relevant results aren&#39;t included in the results.
    /// </summary>
    /// <value>Relevancy threshold below which less relevant results aren&#39;t included in the results.</value>
    [DataMember(Name = "relevancyStrictness", EmitDefaultValue = false)]
    public int? RelevancyStrictness { get; set; }

    /// <summary>
    /// Attributes to highlight. Strings that match the search query in the attributes are highlighted by surrounding them with HTML tags (&#x60;highlightPreTag&#x60; and &#x60;highlightPostTag&#x60;).
    /// </summary>
    /// <value>Attributes to highlight. Strings that match the search query in the attributes are highlighted by surrounding them with HTML tags (&#x60;highlightPreTag&#x60; and &#x60;highlightPostTag&#x60;).</value>
    [DataMember(Name = "attributesToHighlight", EmitDefaultValue = false)]
    public List<string> AttributesToHighlight { get; set; }

    /// <summary>
    /// Attributes to _snippet_. &#39;Snippeting&#39; is shortening the attribute to a certain number of words. If not specified, the attribute is shortened to the 10 words around the matching string but you can specify the number. For example: &#x60;body:20&#x60;. 
    /// </summary>
    /// <value>Attributes to _snippet_. &#39;Snippeting&#39; is shortening the attribute to a certain number of words. If not specified, the attribute is shortened to the 10 words around the matching string but you can specify the number. For example: &#x60;body:20&#x60;. </value>
    [DataMember(Name = "attributesToSnippet", EmitDefaultValue = false)]
    public List<string> AttributesToSnippet { get; set; }

    /// <summary>
    /// HTML string to insert before the highlighted parts in all highlight and snippet results.
    /// </summary>
    /// <value>HTML string to insert before the highlighted parts in all highlight and snippet results.</value>
    [DataMember(Name = "highlightPreTag", EmitDefaultValue = false)]
    public string HighlightPreTag { get; set; }

    /// <summary>
    /// HTML string to insert after the highlighted parts in all highlight and snippet results.
    /// </summary>
    /// <value>HTML string to insert after the highlighted parts in all highlight and snippet results.</value>
    [DataMember(Name = "highlightPostTag", EmitDefaultValue = false)]
    public string HighlightPostTag { get; set; }

    /// <summary>
    /// String used as an ellipsis indicator when a snippet is truncated.
    /// </summary>
    /// <value>String used as an ellipsis indicator when a snippet is truncated.</value>
    [DataMember(Name = "snippetEllipsisText", EmitDefaultValue = false)]
    public string SnippetEllipsisText { get; set; }

    /// <summary>
    /// Restrict highlighting and snippeting to items that matched the query.
    /// </summary>
    /// <value>Restrict highlighting and snippeting to items that matched the query.</value>
    [DataMember(Name = "restrictHighlightAndSnippetArrays", EmitDefaultValue = true)]
    public bool? RestrictHighlightAndSnippetArrays { get; set; }

    /// <summary>
    /// Number of hits per page.
    /// </summary>
    /// <value>Number of hits per page.</value>
    [DataMember(Name = "hitsPerPage", EmitDefaultValue = false)]
    public int? HitsPerPage { get; set; }

    /// <summary>
    /// Minimum number of characters a word in the query string must contain to accept matches with [one typo](https://www.algolia.com/doc/guides/managing-results/optimize-search-results/typo-tolerance/in-depth/configuring-typo-tolerance/#configuring-word-length-for-typos).
    /// </summary>
    /// <value>Minimum number of characters a word in the query string must contain to accept matches with [one typo](https://www.algolia.com/doc/guides/managing-results/optimize-search-results/typo-tolerance/in-depth/configuring-typo-tolerance/#configuring-word-length-for-typos).</value>
    [DataMember(Name = "minWordSizefor1Typo", EmitDefaultValue = false)]
    public int? MinWordSizefor1Typo { get; set; }

    /// <summary>
    /// Minimum number of characters a word in the query string must contain to accept matches with [two typos](https://www.algolia.com/doc/guides/managing-results/optimize-search-results/typo-tolerance/in-depth/configuring-typo-tolerance/#configuring-word-length-for-typos).
    /// </summary>
    /// <value>Minimum number of characters a word in the query string must contain to accept matches with [two typos](https://www.algolia.com/doc/guides/managing-results/optimize-search-results/typo-tolerance/in-depth/configuring-typo-tolerance/#configuring-word-length-for-typos).</value>
    [DataMember(Name = "minWordSizefor2Typos", EmitDefaultValue = false)]
    public int? MinWordSizefor2Typos { get; set; }

    /// <summary>
    /// Gets or Sets TypoTolerance
    /// </summary>
    [DataMember(Name = "typoTolerance", EmitDefaultValue = false)]
    public TypoTolerance TypoTolerance { get; set; }

    /// <summary>
    /// Whether to allow typos on numbers (\&quot;numeric tokens\&quot;) in the query string.
    /// </summary>
    /// <value>Whether to allow typos on numbers (\&quot;numeric tokens\&quot;) in the query string.</value>
    [DataMember(Name = "allowTyposOnNumericTokens", EmitDefaultValue = true)]
    public bool? AllowTyposOnNumericTokens { get; set; }

    /// <summary>
    /// Attributes for which you want to turn off [typo tolerance](https://www.algolia.com/doc/guides/managing-results/optimize-search-results/typo-tolerance/).
    /// </summary>
    /// <value>Attributes for which you want to turn off [typo tolerance](https://www.algolia.com/doc/guides/managing-results/optimize-search-results/typo-tolerance/).</value>
    [DataMember(Name = "disableTypoToleranceOnAttributes", EmitDefaultValue = false)]
    public List<string> DisableTypoToleranceOnAttributes { get; set; }

    /// <summary>
    /// Gets or Sets IgnorePlurals
    /// </summary>
    [DataMember(Name = "ignorePlurals", EmitDefaultValue = false)]
    public IgnorePlurals IgnorePlurals { get; set; }

    /// <summary>
    /// Gets or Sets RemoveStopWords
    /// </summary>
    [DataMember(Name = "removeStopWords", EmitDefaultValue = false)]
    public RemoveStopWords RemoveStopWords { get; set; }

    /// <summary>
    /// Characters that the engine shouldn&#39;t automatically [normalize](https://www.algolia.com/doc/guides/managing-results/optimize-search-results/handling-natural-languages-nlp/in-depth/normalization/).
    /// </summary>
    /// <value>Characters that the engine shouldn&#39;t automatically [normalize](https://www.algolia.com/doc/guides/managing-results/optimize-search-results/handling-natural-languages-nlp/in-depth/normalization/).</value>
    [DataMember(Name = "keepDiacriticsOnCharacters", EmitDefaultValue = false)]
    public string KeepDiacriticsOnCharacters { get; set; }

    /// <summary>
    /// Sets your user&#39;s search language. This adjusts language-specific settings and features such as &#x60;ignorePlurals&#x60;, &#x60;removeStopWords&#x60;, and [CJK](https://www.algolia.com/doc/guides/managing-results/optimize-search-results/handling-natural-languages-nlp/in-depth/normalization/#normalization-for-logogram-based-languages-cjk) word detection.
    /// </summary>
    /// <value>Sets your user&#39;s search language. This adjusts language-specific settings and features such as &#x60;ignorePlurals&#x60;, &#x60;removeStopWords&#x60;, and [CJK](https://www.algolia.com/doc/guides/managing-results/optimize-search-results/handling-natural-languages-nlp/in-depth/normalization/#normalization-for-logogram-based-languages-cjk) word detection.</value>
    [DataMember(Name = "queryLanguages", EmitDefaultValue = false)]
    public List<string> QueryLanguages { get; set; }

    /// <summary>
    /// [Splits compound words](https://www.algolia.com/doc/guides/managing-results/optimize-search-results/handling-natural-languages-nlp/in-depth/language-specific-configurations/#splitting-compound-words) into their component word parts in the query. 
    /// </summary>
    /// <value>[Splits compound words](https://www.algolia.com/doc/guides/managing-results/optimize-search-results/handling-natural-languages-nlp/in-depth/language-specific-configurations/#splitting-compound-words) into their component word parts in the query. </value>
    [DataMember(Name = "decompoundQuery", EmitDefaultValue = true)]
    public bool? DecompoundQuery { get; set; }

    /// <summary>
    /// Incidates whether [Rules](https://www.algolia.com/doc/guides/managing-results/rules/rules-overview/) are enabled.
    /// </summary>
    /// <value>Incidates whether [Rules](https://www.algolia.com/doc/guides/managing-results/rules/rules-overview/) are enabled.</value>
    [DataMember(Name = "enableRules", EmitDefaultValue = true)]
    public bool? EnableRules { get; set; }

    /// <summary>
    /// Incidates whether [Personalization](https://www.algolia.com/doc/guides/personalization/what-is-personalization/) is enabled.
    /// </summary>
    /// <value>Incidates whether [Personalization](https://www.algolia.com/doc/guides/personalization/what-is-personalization/) is enabled.</value>
    [DataMember(Name = "enablePersonalization", EmitDefaultValue = true)]
    public bool? EnablePersonalization { get; set; }

    /// <summary>
    /// Gets or Sets SemanticSearch
    /// </summary>
    [DataMember(Name = "semanticSearch", EmitDefaultValue = false)]
    public SemanticSearch SemanticSearch { get; set; }

    /// <summary>
    /// Enables the [advanced query syntax](https://www.algolia.com/doc/guides/managing-results/optimize-search-results/override-search-engine-defaults/#advanced-syntax).
    /// </summary>
    /// <value>Enables the [advanced query syntax](https://www.algolia.com/doc/guides/managing-results/optimize-search-results/override-search-engine-defaults/#advanced-syntax).</value>
    [DataMember(Name = "advancedSyntax", EmitDefaultValue = true)]
    public bool? AdvancedSyntax { get; set; }

    /// <summary>
    /// Words which should be considered [optional](https://www.algolia.com/doc/guides/managing-results/optimize-search-results/empty-or-insufficient-results/#creating-a-list-of-optional-words) when found in a query.
    /// </summary>
    /// <value>Words which should be considered [optional](https://www.algolia.com/doc/guides/managing-results/optimize-search-results/empty-or-insufficient-results/#creating-a-list-of-optional-words) when found in a query.</value>
    [DataMember(Name = "optionalWords", EmitDefaultValue = false)]
    public List<string> OptionalWords { get; set; }

    /// <summary>
    /// Attributes for which you want to [turn off the exact ranking criterion](https://www.algolia.com/doc/guides/managing-results/optimize-search-results/override-search-engine-defaults/in-depth/adjust-exact-settings/#turn-off-exact-for-some-attributes).
    /// </summary>
    /// <value>Attributes for which you want to [turn off the exact ranking criterion](https://www.algolia.com/doc/guides/managing-results/optimize-search-results/override-search-engine-defaults/in-depth/adjust-exact-settings/#turn-off-exact-for-some-attributes).</value>
    [DataMember(Name = "disableExactOnAttributes", EmitDefaultValue = false)]
    public List<string> DisableExactOnAttributes { get; set; }

    /// <summary>
    /// Alternatives that should be considered an exact match by [the exact ranking criterion](https://www.algolia.com/doc/guides/managing-results/optimize-search-results/override-search-engine-defaults/in-depth/adjust-exact-settings/#turn-off-exact-for-some-attributes).
    /// </summary>
    /// <value>Alternatives that should be considered an exact match by [the exact ranking criterion](https://www.algolia.com/doc/guides/managing-results/optimize-search-results/override-search-engine-defaults/in-depth/adjust-exact-settings/#turn-off-exact-for-some-attributes).</value>
    [DataMember(Name = "alternativesAsExact", EmitDefaultValue = false)]
    public List<AlternativesAsExact> AlternativesAsExact { get; set; }

    /// <summary>
    /// Allows you to specify which advanced syntax features are active when &#x60;advancedSyntax&#x60; is enabled.
    /// </summary>
    /// <value>Allows you to specify which advanced syntax features are active when &#x60;advancedSyntax&#x60; is enabled.</value>
    [DataMember(Name = "advancedSyntaxFeatures", EmitDefaultValue = false)]
    public List<AdvancedSyntaxFeatures> AdvancedSyntaxFeatures { get; set; }

    /// <summary>
    /// Gets or Sets Distinct
    /// </summary>
    [DataMember(Name = "distinct", EmitDefaultValue = false)]
    public Distinct Distinct { get; set; }

    /// <summary>
    /// Whether to highlight and snippet the original word that matches the synonym or the synonym itself.
    /// </summary>
    /// <value>Whether to highlight and snippet the original word that matches the synonym or the synonym itself.</value>
    [DataMember(Name = "replaceSynonymsInHighlight", EmitDefaultValue = true)]
    public bool? ReplaceSynonymsInHighlight { get; set; }

    /// <summary>
    /// Precision of the [proximity ranking criterion](https://www.algolia.com/doc/guides/managing-results/relevance-overview/in-depth/ranking-criteria/#proximity).
    /// </summary>
    /// <value>Precision of the [proximity ranking criterion](https://www.algolia.com/doc/guides/managing-results/relevance-overview/in-depth/ranking-criteria/#proximity).</value>
    [DataMember(Name = "minProximity", EmitDefaultValue = false)]
    public int? MinProximity { get; set; }

    /// <summary>
    /// Attributes to include in the API response for search and browse queries.
    /// </summary>
    /// <value>Attributes to include in the API response for search and browse queries.</value>
    [DataMember(Name = "responseFields", EmitDefaultValue = false)]
    public List<string> ResponseFields { get; set; }

    /// <summary>
    /// Maximum number of facet hits to return when [searching for facet values](https://www.algolia.com/doc/guides/managing-results/refine-results/faceting/#search-for-facet-values).
    /// </summary>
    /// <value>Maximum number of facet hits to return when [searching for facet values](https://www.algolia.com/doc/guides/managing-results/refine-results/faceting/#search-for-facet-values).</value>
    [DataMember(Name = "maxFacetHits", EmitDefaultValue = false)]
    public int? MaxFacetHits { get; set; }

    /// <summary>
    /// Maximum number of facet values to return for each facet.
    /// </summary>
    /// <value>Maximum number of facet values to return for each facet.</value>
    [DataMember(Name = "maxValuesPerFacet", EmitDefaultValue = false)]
    public int? MaxValuesPerFacet { get; set; }

    /// <summary>
    /// Controls how facet values are fetched.
    /// </summary>
    /// <value>Controls how facet values are fetched.</value>
    [DataMember(Name = "sortFacetValuesBy", EmitDefaultValue = false)]
    public string SortFacetValuesBy { get; set; }

    /// <summary>
    /// When the [Attribute criterion is ranked above Proximity](https://www.algolia.com/doc/guides/managing-results/relevance-overview/in-depth/ranking-criteria/#attribute-and-proximity-combinations) in your ranking formula, Proximity is used to select which searchable attribute is matched in the Attribute ranking stage.
    /// </summary>
    /// <value>When the [Attribute criterion is ranked above Proximity](https://www.algolia.com/doc/guides/managing-results/relevance-overview/in-depth/ranking-criteria/#attribute-and-proximity-combinations) in your ranking formula, Proximity is used to select which searchable attribute is matched in the Attribute ranking stage.</value>
    [DataMember(Name = "attributeCriteriaComputedByMinProximity", EmitDefaultValue = true)]
    public bool? AttributeCriteriaComputedByMinProximity { get; set; }

    /// <summary>
    /// Gets or Sets RenderingContent
    /// </summary>
    [DataMember(Name = "renderingContent", EmitDefaultValue = false)]
    public RenderingContent RenderingContent { get; set; }

    /// <summary>
    /// Indicates whether this search will use [Dynamic Re-Ranking](https://www.algolia.com/doc/guides/algolia-ai/re-ranking/).
    /// </summary>
    /// <value>Indicates whether this search will use [Dynamic Re-Ranking](https://www.algolia.com/doc/guides/algolia-ai/re-ranking/).</value>
    [DataMember(Name = "enableReRanking", EmitDefaultValue = true)]
    public bool? EnableReRanking { get; set; }

    /// <summary>
    /// Gets or Sets ReRankingApplyFilter
    /// </summary>
    [DataMember(Name = "reRankingApplyFilter", EmitDefaultValue = true)]
    public ReRankingApplyFilter ReRankingApplyFilter { get; set; }

    /// <summary>
    /// Returns the string presentation of the object
    /// </summary>
    /// <returns>String presentation of the object</returns>
    public override string ToString()
    {
      StringBuilder sb = new StringBuilder();
      sb.Append("class IndexSettings {\n");
      sb.Append("  Replicas: ").Append(Replicas).Append("\n");
      sb.Append("  PaginationLimitedTo: ").Append(PaginationLimitedTo).Append("\n");
      sb.Append("  UnretrievableAttributes: ").Append(UnretrievableAttributes).Append("\n");
      sb.Append("  DisableTypoToleranceOnWords: ").Append(DisableTypoToleranceOnWords).Append("\n");
      sb.Append("  AttributesToTransliterate: ").Append(AttributesToTransliterate).Append("\n");
      sb.Append("  CamelCaseAttributes: ").Append(CamelCaseAttributes).Append("\n");
      sb.Append("  DecompoundedAttributes: ").Append(DecompoundedAttributes).Append("\n");
      sb.Append("  IndexLanguages: ").Append(IndexLanguages).Append("\n");
      sb.Append("  DisablePrefixOnAttributes: ").Append(DisablePrefixOnAttributes).Append("\n");
      sb.Append("  AllowCompressionOfIntegerArray: ").Append(AllowCompressionOfIntegerArray).Append("\n");
      sb.Append("  NumericAttributesForFiltering: ").Append(NumericAttributesForFiltering).Append("\n");
      sb.Append("  SeparatorsToIndex: ").Append(SeparatorsToIndex).Append("\n");
      sb.Append("  SearchableAttributes: ").Append(SearchableAttributes).Append("\n");
      sb.Append("  UserData: ").Append(UserData).Append("\n");
      sb.Append("  CustomNormalization: ").Append(CustomNormalization).Append("\n");
      sb.Append("  AttributeForDistinct: ").Append(AttributeForDistinct).Append("\n");
      sb.Append("  AttributesForFaceting: ").Append(AttributesForFaceting).Append("\n");
      sb.Append("  AttributesToRetrieve: ").Append(AttributesToRetrieve).Append("\n");
      sb.Append("  Ranking: ").Append(Ranking).Append("\n");
      sb.Append("  CustomRanking: ").Append(CustomRanking).Append("\n");
      sb.Append("  RelevancyStrictness: ").Append(RelevancyStrictness).Append("\n");
      sb.Append("  AttributesToHighlight: ").Append(AttributesToHighlight).Append("\n");
      sb.Append("  AttributesToSnippet: ").Append(AttributesToSnippet).Append("\n");
      sb.Append("  HighlightPreTag: ").Append(HighlightPreTag).Append("\n");
      sb.Append("  HighlightPostTag: ").Append(HighlightPostTag).Append("\n");
      sb.Append("  SnippetEllipsisText: ").Append(SnippetEllipsisText).Append("\n");
      sb.Append("  RestrictHighlightAndSnippetArrays: ").Append(RestrictHighlightAndSnippetArrays).Append("\n");
      sb.Append("  HitsPerPage: ").Append(HitsPerPage).Append("\n");
      sb.Append("  MinWordSizefor1Typo: ").Append(MinWordSizefor1Typo).Append("\n");
      sb.Append("  MinWordSizefor2Typos: ").Append(MinWordSizefor2Typos).Append("\n");
      sb.Append("  TypoTolerance: ").Append(TypoTolerance).Append("\n");
      sb.Append("  AllowTyposOnNumericTokens: ").Append(AllowTyposOnNumericTokens).Append("\n");
      sb.Append("  DisableTypoToleranceOnAttributes: ").Append(DisableTypoToleranceOnAttributes).Append("\n");
      sb.Append("  IgnorePlurals: ").Append(IgnorePlurals).Append("\n");
      sb.Append("  RemoveStopWords: ").Append(RemoveStopWords).Append("\n");
      sb.Append("  KeepDiacriticsOnCharacters: ").Append(KeepDiacriticsOnCharacters).Append("\n");
      sb.Append("  QueryLanguages: ").Append(QueryLanguages).Append("\n");
      sb.Append("  DecompoundQuery: ").Append(DecompoundQuery).Append("\n");
      sb.Append("  EnableRules: ").Append(EnableRules).Append("\n");
      sb.Append("  EnablePersonalization: ").Append(EnablePersonalization).Append("\n");
      sb.Append("  QueryType: ").Append(QueryType).Append("\n");
      sb.Append("  RemoveWordsIfNoResults: ").Append(RemoveWordsIfNoResults).Append("\n");
      sb.Append("  Mode: ").Append(Mode).Append("\n");
      sb.Append("  SemanticSearch: ").Append(SemanticSearch).Append("\n");
      sb.Append("  AdvancedSyntax: ").Append(AdvancedSyntax).Append("\n");
      sb.Append("  OptionalWords: ").Append(OptionalWords).Append("\n");
      sb.Append("  DisableExactOnAttributes: ").Append(DisableExactOnAttributes).Append("\n");
      sb.Append("  ExactOnSingleWordQuery: ").Append(ExactOnSingleWordQuery).Append("\n");
      sb.Append("  AlternativesAsExact: ").Append(AlternativesAsExact).Append("\n");
      sb.Append("  AdvancedSyntaxFeatures: ").Append(AdvancedSyntaxFeatures).Append("\n");
      sb.Append("  Distinct: ").Append(Distinct).Append("\n");
      sb.Append("  ReplaceSynonymsInHighlight: ").Append(ReplaceSynonymsInHighlight).Append("\n");
      sb.Append("  MinProximity: ").Append(MinProximity).Append("\n");
      sb.Append("  ResponseFields: ").Append(ResponseFields).Append("\n");
      sb.Append("  MaxFacetHits: ").Append(MaxFacetHits).Append("\n");
      sb.Append("  MaxValuesPerFacet: ").Append(MaxValuesPerFacet).Append("\n");
      sb.Append("  SortFacetValuesBy: ").Append(SortFacetValuesBy).Append("\n");
      sb.Append("  AttributeCriteriaComputedByMinProximity: ").Append(AttributeCriteriaComputedByMinProximity).Append("\n");
      sb.Append("  RenderingContent: ").Append(RenderingContent).Append("\n");
      sb.Append("  EnableReRanking: ").Append(EnableReRanking).Append("\n");
      sb.Append("  ReRankingApplyFilter: ").Append(ReRankingApplyFilter).Append("\n");
      sb.Append("}\n");
      return sb.ToString();
    }

    /// <summary>
    /// Returns the JSON string presentation of the object
    /// </summary>
    /// <returns>JSON string presentation of the object</returns>
    public virtual string ToJson()
    {
      return Newtonsoft.Json.JsonConvert.SerializeObject(this, Newtonsoft.Json.Formatting.Indented);
    }

  }

}
