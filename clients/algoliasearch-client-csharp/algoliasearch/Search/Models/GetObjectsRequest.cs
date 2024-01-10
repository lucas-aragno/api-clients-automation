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
  /// Record retrieval operation.
  /// </summary>
  [DataContract(Name = "getObjectsRequest")]
  public partial class GetObjectsRequest
  {
    /// <summary>
    /// Initializes a new instance of the <see cref="GetObjectsRequest" /> class.
    /// </summary>
    [JsonConstructorAttribute]
    public GetObjectsRequest() { }
    /// <summary>
    /// Initializes a new instance of the <see cref="GetObjectsRequest" /> class.
    /// </summary>
    /// <param name="objectID">Record&#39;s objectID. (required).</param>
    /// <param name="indexName">Name of the index containing the required records. (required).</param>
    public GetObjectsRequest(string objectID, string indexName)
    {
      this.ObjectID = objectID ?? throw new ArgumentNullException("objectID is a required property for GetObjectsRequest and cannot be null");
      this.IndexName = indexName ?? throw new ArgumentNullException("indexName is a required property for GetObjectsRequest and cannot be null");
    }

    /// <summary>
    /// Attributes to retrieve. If not specified, all retrievable attributes are returned.
    /// </summary>
    /// <value>Attributes to retrieve. If not specified, all retrievable attributes are returned.</value>
    [DataMember(Name = "attributesToRetrieve", EmitDefaultValue = false)]
    public List<string> AttributesToRetrieve { get; set; }

    /// <summary>
    /// Record&#39;s objectID.
    /// </summary>
    /// <value>Record&#39;s objectID.</value>
    [DataMember(Name = "objectID", IsRequired = true, EmitDefaultValue = true)]
    public string ObjectID { get; set; }

    /// <summary>
    /// Name of the index containing the required records.
    /// </summary>
    /// <value>Name of the index containing the required records.</value>
    [DataMember(Name = "indexName", IsRequired = true, EmitDefaultValue = true)]
    public string IndexName { get; set; }

    /// <summary>
    /// Returns the string presentation of the object
    /// </summary>
    /// <returns>String presentation of the object</returns>
    public override string ToString()
    {
      StringBuilder sb = new StringBuilder();
      sb.Append("class GetObjectsRequest {\n");
      sb.Append("  AttributesToRetrieve: ").Append(AttributesToRetrieve).Append("\n");
      sb.Append("  ObjectID: ").Append(ObjectID).Append("\n");
      sb.Append("  IndexName: ").Append(IndexName).Append("\n");
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
