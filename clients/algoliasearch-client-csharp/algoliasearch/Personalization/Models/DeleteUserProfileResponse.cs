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

namespace Algolia.Search.Models.Personalization
{
  /// <summary>
  /// DeleteUserProfileResponse
  /// </summary>
  [DataContract(Name = "deleteUserProfileResponse")]
  public partial class DeleteUserProfileResponse
  {
    /// <summary>
    /// Initializes a new instance of the <see cref="DeleteUserProfileResponse" /> class.
    /// </summary>
    [JsonConstructorAttribute]
    public DeleteUserProfileResponse() { }
    /// <summary>
    /// Initializes a new instance of the <see cref="DeleteUserProfileResponse" /> class.
    /// </summary>
    /// <param name="userToken">userToken representing the user for which to fetch the Personalization profile. (required).</param>
    /// <param name="deletedUntil">A date until which the data can safely be considered as deleted for the given user. Any data received after the &#x60;deletedUntil&#x60; date will start building a new user profile. (required).</param>
    public DeleteUserProfileResponse(string userToken, string deletedUntil)
    {
      this.UserToken = userToken ?? throw new ArgumentNullException("userToken is a required property for DeleteUserProfileResponse and cannot be null");
      this.DeletedUntil = deletedUntil ?? throw new ArgumentNullException("deletedUntil is a required property for DeleteUserProfileResponse and cannot be null");
    }

    /// <summary>
    /// userToken representing the user for which to fetch the Personalization profile.
    /// </summary>
    /// <value>userToken representing the user for which to fetch the Personalization profile.</value>
    [DataMember(Name = "userToken", IsRequired = true, EmitDefaultValue = true)]
    public string UserToken { get; set; }

    /// <summary>
    /// A date until which the data can safely be considered as deleted for the given user. Any data received after the &#x60;deletedUntil&#x60; date will start building a new user profile.
    /// </summary>
    /// <value>A date until which the data can safely be considered as deleted for the given user. Any data received after the &#x60;deletedUntil&#x60; date will start building a new user profile.</value>
    [DataMember(Name = "deletedUntil", IsRequired = true, EmitDefaultValue = true)]
    public string DeletedUntil { get; set; }

    /// <summary>
    /// Returns the string presentation of the object
    /// </summary>
    /// <returns>String presentation of the object</returns>
    public override string ToString()
    {
      StringBuilder sb = new StringBuilder();
      sb.Append("class DeleteUserProfileResponse {\n");
      sb.Append("  UserToken: ").Append(UserToken).Append("\n");
      sb.Append("  DeletedUntil: ").Append(DeletedUntil).Append("\n");
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
