// Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT.

import type {
  CreateClientOptions,
  Headers,
  Host,
  QueryParameters,
  Request,
  RequestOptions,
} from '@algolia/client-common';
import { createAuth, createIterablePromise, createTransporter, getAlgoliaAgent, shuffle } from '@algolia/client-common';

import type { BatchParams } from '../model/batchParams';
import type { Composition } from '../model/composition';
import type { CompositionRule } from '../model/compositionRule';

import type { GetTaskResponse } from '../model/getTaskResponse';
import type { ListCompositionsResponse } from '../model/listCompositionsResponse';
import type { MultipleBatchResponse } from '../model/multipleBatchResponse';

import type { RulesMultipleBatchResponse } from '../model/rulesMultipleBatchResponse';

import type { SearchCompositionRulesResponse } from '../model/searchCompositionRulesResponse';

import type { SearchForFacetValuesResponse } from '../model/searchForFacetValuesResponse';
import type { SearchResponse } from '../model/searchResponse';

import type {
  CustomDeleteProps,
  CustomGetProps,
  CustomPostProps,
  CustomPutProps,
  GetCompositionProps,
  GetRuleProps,
  GetTaskProps,
  ListCompositionsProps,
  SaveRulesProps,
  SearchCompositionRulesProps,
  SearchForFacetValuesProps,
  SearchProps,
  WaitForCompositionTaskOptions,
} from '../model/clientMethodProps';

export const apiClientVersion = '0.0.1-alpha.8';

function getDefaultHosts(appId: string): Host[] {
  return (
    [
      {
        url: `${appId}-dsn.algolia.net`,
        accept: 'read',
        protocol: 'https',
      },
      {
        url: `${appId}.algolia.net`,
        accept: 'write',
        protocol: 'https',
      },
    ] as Host[]
  ).concat(
    shuffle([
      {
        url: `${appId}-1.algolianet.com`,
        accept: 'readWrite',
        protocol: 'https',
      },
      {
        url: `${appId}-2.algolianet.com`,
        accept: 'readWrite',
        protocol: 'https',
      },
      {
        url: `${appId}-3.algolianet.com`,
        accept: 'readWrite',
        protocol: 'https',
      },
    ]),
  );
}

export function createCompositionClient({
  appId: appIdOption,
  apiKey: apiKeyOption,
  authMode,
  algoliaAgents,
  ...options
}: CreateClientOptions) {
  const auth = createAuth(appIdOption, apiKeyOption, authMode);
  const transporter = createTransporter({
    hosts: getDefaultHosts(appIdOption),
    ...options,
    algoliaAgent: getAlgoliaAgent({
      algoliaAgents,
      client: 'Composition',
      version: apiClientVersion,
    }),
    baseHeaders: {
      'content-type': 'text/plain',
      ...auth.headers(),
      ...options.baseHeaders,
    },
    baseQueryParameters: {
      ...auth.queryParameters(),
      ...options.baseQueryParameters,
    },
  });

  return {
    transporter,

    /**
     * The `appId` currently in use.
     */
    appId: appIdOption,

    /**
     * The `apiKey` currently in use.
     */
    apiKey: apiKeyOption,

    /**
     * Clears the cache of the transporter for the `requestsCache` and `responsesCache` properties.
     */
    clearCache(): Promise<void> {
      return Promise.all([transporter.requestsCache.clear(), transporter.responsesCache.clear()]).then(() => undefined);
    },

    /**
     * Get the value of the `algoliaAgent`, used by our libraries internally and telemetry system.
     */
    get _ua(): string {
      return transporter.algoliaAgent.value;
    },

    /**
     * Adds a `segment` to the `x-algolia-agent` sent with every requests.
     *
     * @param segment - The algolia agent (user-agent) segment to add.
     * @param version - The version of the agent.
     */
    addAlgoliaAgent(segment: string, version?: string): void {
      transporter.algoliaAgent.add({ segment, version });
    },

    /**
     * Helper method to switch the API key used to authenticate the requests.
     *
     * @param params - Method params.
     * @param params.apiKey - The new API Key to use.
     */
    setClientApiKey({ apiKey }: { apiKey: string }): void {
      if (!authMode || authMode === 'WithinHeaders') {
        transporter.baseHeaders['x-algolia-api-key'] = apiKey;
      } else {
        transporter.baseQueryParameters['x-algolia-api-key'] = apiKey;
      }
    },

    /**
     * Helper: Wait for a composition-level task to be published (completed) for a given `compositionID` and `taskID`.
     *
     * @summary Helper method that waits for a task to be published (completed).
     * @param WaitForCompositionTaskOptions - The `WaitForCompositionTaskOptions` object.
     * @param WaitForCompositionTaskOptions.compositionID - The `compositionID` where the operation was performed.
     * @param WaitForCompositionTaskOptions.taskID - The `taskID` returned in the method response.
     * @param WaitForCompositionTaskOptions.maxRetries - The maximum number of retries. 50 by default.
     * @param WaitForCompositionTaskOptions.timeout - The function to decide how long to wait between retries.
     * @param requestOptions - The requestOptions to send along with the query, they will be forwarded to the `getTask` method and merged with the transporter requestOptions.
     */
    waitForCompositionTask(
      {
        compositionID,
        taskID,
        maxRetries = 50,
        timeout = (retryCount: number): number => Math.min(retryCount * 200, 5000),
      }: WaitForCompositionTaskOptions,
      requestOptions?: RequestOptions,
    ): Promise<GetTaskResponse> {
      let retryCount = 0;

      return createIterablePromise({
        func: () => this.getTask({ compositionID, taskID }, requestOptions),
        validate: (response) => response.status === 'published',
        aggregator: () => (retryCount += 1),
        error: {
          validate: () => retryCount >= maxRetries,
          message: () => `The maximum number of retries exceeded. (${retryCount}/${maxRetries})`,
        },
        timeout: () => timeout(retryCount),
      });
    },

    /**
     * This method allow you to send requests to the Algolia REST API.
     * @param customDelete - The customDelete object.
     * @param customDelete.path - Path of the endpoint, anything after \"/1\" must be specified.
     * @param customDelete.parameters - Query parameters to apply to the current query.
     * @param requestOptions - The requestOptions to send along with the query, they will be merged with the transporter requestOptions.
     */
    customDelete(
      { path, parameters }: CustomDeleteProps,
      requestOptions?: RequestOptions,
    ): Promise<Record<string, unknown>> {
      if (!path) {
        throw new Error('Parameter `path` is required when calling `customDelete`.');
      }

      const requestPath = '/{path}'.replace('{path}', path);
      const headers: Headers = {};
      const queryParameters: QueryParameters = parameters ? parameters : {};

      const request: Request = {
        method: 'DELETE',
        path: requestPath,
        queryParameters,
        headers,
      };

      return transporter.request(request, requestOptions);
    },

    /**
     * This method allow you to send requests to the Algolia REST API.
     * @param customGet - The customGet object.
     * @param customGet.path - Path of the endpoint, anything after \"/1\" must be specified.
     * @param customGet.parameters - Query parameters to apply to the current query.
     * @param requestOptions - The requestOptions to send along with the query, they will be merged with the transporter requestOptions.
     */
    customGet({ path, parameters }: CustomGetProps, requestOptions?: RequestOptions): Promise<Record<string, unknown>> {
      if (!path) {
        throw new Error('Parameter `path` is required when calling `customGet`.');
      }

      const requestPath = '/{path}'.replace('{path}', path);
      const headers: Headers = {};
      const queryParameters: QueryParameters = parameters ? parameters : {};

      const request: Request = {
        method: 'GET',
        path: requestPath,
        queryParameters,
        headers,
      };

      return transporter.request(request, requestOptions);
    },

    /**
     * This method allow you to send requests to the Algolia REST API.
     * @param customPost - The customPost object.
     * @param customPost.path - Path of the endpoint, anything after \"/1\" must be specified.
     * @param customPost.parameters - Query parameters to apply to the current query.
     * @param customPost.body - Parameters to send with the custom request.
     * @param requestOptions - The requestOptions to send along with the query, they will be merged with the transporter requestOptions.
     */
    customPost(
      { path, parameters, body }: CustomPostProps,
      requestOptions?: RequestOptions,
    ): Promise<Record<string, unknown>> {
      if (!path) {
        throw new Error('Parameter `path` is required when calling `customPost`.');
      }

      const requestPath = '/{path}'.replace('{path}', path);
      const headers: Headers = {};
      const queryParameters: QueryParameters = parameters ? parameters : {};

      const request: Request = {
        method: 'POST',
        path: requestPath,
        queryParameters,
        headers,
        data: body ? body : {},
      };

      return transporter.request(request, requestOptions);
    },

    /**
     * This method allow you to send requests to the Algolia REST API.
     * @param customPut - The customPut object.
     * @param customPut.path - Path of the endpoint, anything after \"/1\" must be specified.
     * @param customPut.parameters - Query parameters to apply to the current query.
     * @param customPut.body - Parameters to send with the custom request.
     * @param requestOptions - The requestOptions to send along with the query, they will be merged with the transporter requestOptions.
     */
    customPut(
      { path, parameters, body }: CustomPutProps,
      requestOptions?: RequestOptions,
    ): Promise<Record<string, unknown>> {
      if (!path) {
        throw new Error('Parameter `path` is required when calling `customPut`.');
      }

      const requestPath = '/{path}'.replace('{path}', path);
      const headers: Headers = {};
      const queryParameters: QueryParameters = parameters ? parameters : {};

      const request: Request = {
        method: 'PUT',
        path: requestPath,
        queryParameters,
        headers,
        data: body ? body : {},
      };

      return transporter.request(request, requestOptions);
    },

    /**
     * Retrieve a single composition in the current Algolia application.
     *
     * Required API Key ACLs:
     *  - editSettings
     *  - settings
     * @param getComposition - The getComposition object.
     * @param getComposition.compositionID - Unique Composition ObjectID.
     * @param requestOptions - The requestOptions to send along with the query, they will be merged with the transporter requestOptions.
     */
    getComposition({ compositionID }: GetCompositionProps, requestOptions?: RequestOptions): Promise<Composition> {
      if (!compositionID) {
        throw new Error('Parameter `compositionID` is required when calling `getComposition`.');
      }

      const requestPath = '/1/compositions/{compositionID}'.replace(
        '{compositionID}',
        encodeURIComponent(compositionID),
      );
      const headers: Headers = {};
      const queryParameters: QueryParameters = {};

      const request: Request = {
        method: 'GET',
        path: requestPath,
        queryParameters,
        headers,
      };

      return transporter.request(request, requestOptions);
    },

    /**
     * Retrieves a rule by its ID. To find the object ID of rules, use the [`search` operation](#tag/Rules/operation/searchRules).
     *
     * Required API Key ACLs:
     *  - settings
     * @param getRule - The getRule object.
     * @param getRule.compositionID - Unique Composition ObjectID.
     * @param getRule.objectID - Unique identifier of a rule object.
     * @param requestOptions - The requestOptions to send along with the query, they will be merged with the transporter requestOptions.
     */
    getRule({ compositionID, objectID }: GetRuleProps, requestOptions?: RequestOptions): Promise<CompositionRule> {
      if (!compositionID) {
        throw new Error('Parameter `compositionID` is required when calling `getRule`.');
      }

      if (!objectID) {
        throw new Error('Parameter `objectID` is required when calling `getRule`.');
      }

      const requestPath = '/1/compositions/{compositionID}/rules/{objectID}'
        .replace('{compositionID}', encodeURIComponent(compositionID))
        .replace('{objectID}', encodeURIComponent(objectID));
      const headers: Headers = {};
      const queryParameters: QueryParameters = {};

      const request: Request = {
        method: 'GET',
        path: requestPath,
        queryParameters,
        headers,
      };

      return transporter.request(request, requestOptions);
    },

    /**
     * Checks the status of a given task.
     *
     * Required API Key ACLs:
     *  - editSettings
     *  - settings
     *  - addObject
     *  - deleteObject
     *  - deleteIndex
     * @param getTask - The getTask object.
     * @param getTask.compositionID - Unique Composition ObjectID.
     * @param getTask.taskID - Unique task identifier.
     * @param requestOptions - The requestOptions to send along with the query, they will be merged with the transporter requestOptions.
     */
    getTask({ compositionID, taskID }: GetTaskProps, requestOptions?: RequestOptions): Promise<GetTaskResponse> {
      if (!compositionID) {
        throw new Error('Parameter `compositionID` is required when calling `getTask`.');
      }

      if (!taskID) {
        throw new Error('Parameter `taskID` is required when calling `getTask`.');
      }

      const requestPath = '/1/compositions/{compositionID}/task/{taskID}'
        .replace('{compositionID}', encodeURIComponent(compositionID))
        .replace('{taskID}', encodeURIComponent(taskID));
      const headers: Headers = {};
      const queryParameters: QueryParameters = {};

      const request: Request = {
        method: 'GET',
        path: requestPath,
        queryParameters,
        headers,
      };

      return transporter.request(request, requestOptions);
    },

    /**
     * Lists all compositions in the current Algolia application.
     *
     * Required API Key ACLs:
     *  - editSettings
     *  - settings
     * @param listCompositions - The listCompositions object.
     * @param listCompositions.page - Requested page of the API response. If `null`, the API response is not paginated.
     * @param listCompositions.hitsPerPage - Number of hits per page.
     * @param requestOptions - The requestOptions to send along with the query, they will be merged with the transporter requestOptions.
     */
    listCompositions(
      { page, hitsPerPage }: ListCompositionsProps = {},
      requestOptions: RequestOptions | undefined = undefined,
    ): Promise<ListCompositionsResponse> {
      const requestPath = '/1/compositions';
      const headers: Headers = {};
      const queryParameters: QueryParameters = {};

      if (page !== undefined) {
        queryParameters['page'] = page.toString();
      }

      if (hitsPerPage !== undefined) {
        queryParameters['hitsPerPage'] = hitsPerPage.toString();
      }

      const request: Request = {
        method: 'GET',
        path: requestPath,
        queryParameters,
        headers,
      };

      return transporter.request(request, requestOptions);
    },

    /**
     * Adds, updates, or deletes compositions with a single API request.
     *
     * Required API Key ACLs:
     *  - editSettings
     * @param batchParams - The batchParams object.
     * @param requestOptions - The requestOptions to send along with the query, they will be merged with the transporter requestOptions.
     */
    multipleBatch(batchParams: BatchParams, requestOptions?: RequestOptions): Promise<MultipleBatchResponse> {
      if (!batchParams) {
        throw new Error('Parameter `batchParams` is required when calling `multipleBatch`.');
      }

      if (!batchParams.requests) {
        throw new Error('Parameter `batchParams.requests` is required when calling `multipleBatch`.');
      }

      const requestPath = '/1/compositions/*/batch';
      const headers: Headers = {};
      const queryParameters: QueryParameters = {};

      const request: Request = {
        method: 'POST',
        path: requestPath,
        queryParameters,
        headers,
        data: batchParams,
      };

      return transporter.request(request, requestOptions);
    },

    /**
     * Create or update or delete multiple composition rules.
     *
     * Required API Key ACLs:
     *  - editSettings
     * @param saveRules - The saveRules object.
     * @param saveRules.compositionID - Unique Composition ObjectID.
     * @param saveRules.rules - The rules object.
     * @param requestOptions - The requestOptions to send along with the query, they will be merged with the transporter requestOptions.
     */
    saveRules(
      { compositionID, rules }: SaveRulesProps,
      requestOptions?: RequestOptions,
    ): Promise<RulesMultipleBatchResponse> {
      if (!compositionID) {
        throw new Error('Parameter `compositionID` is required when calling `saveRules`.');
      }

      if (!rules) {
        throw new Error('Parameter `rules` is required when calling `saveRules`.');
      }

      const requestPath = '/1/compositions/{compositionID}/rules/batch'.replace(
        '{compositionID}',
        encodeURIComponent(compositionID),
      );
      const headers: Headers = {};
      const queryParameters: QueryParameters = {};

      const request: Request = {
        method: 'POST',
        path: requestPath,
        queryParameters,
        headers,
        data: rules,
      };

      return transporter.request(request, requestOptions);
    },

    /**
     * Runs a query on a single composition and returns matching results.
     *
     * Required API Key ACLs:
     *  - search
     * @param search - The search object.
     * @param search.compositionID - Unique Composition ObjectID.
     * @param search.requestBody - The requestBody object.
     * @param requestOptions - The requestOptions to send along with the query, they will be merged with the transporter requestOptions.
     */
    search<T>(
      { compositionID, requestBody }: SearchProps,
      requestOptions?: RequestOptions,
    ): Promise<SearchResponse<T>> {
      if (!compositionID) {
        throw new Error('Parameter `compositionID` is required when calling `search`.');
      }

      if (!requestBody) {
        throw new Error('Parameter `requestBody` is required when calling `search`.');
      }

      const requestPath = '/1/compositions/{compositionID}/run'.replace(
        '{compositionID}',
        encodeURIComponent(compositionID),
      );
      const headers: Headers = {};
      const queryParameters: QueryParameters = {};

      const request: Request = {
        method: 'POST',
        path: requestPath,
        queryParameters,
        headers,
        data: requestBody,
        useReadTransporter: true,
        cacheable: true,
      };

      return transporter.request(request, requestOptions);
    },

    /**
     * Searches for composition rules in your index.
     *
     * Required API Key ACLs:
     *  - settings
     * @param searchCompositionRules - The searchCompositionRules object.
     * @param searchCompositionRules.compositionID - Unique Composition ObjectID.
     * @param searchCompositionRules.searchCompositionRulesParams - The searchCompositionRulesParams object.
     * @param requestOptions - The requestOptions to send along with the query, they will be merged with the transporter requestOptions.
     */
    searchCompositionRules(
      { compositionID, searchCompositionRulesParams }: SearchCompositionRulesProps,
      requestOptions?: RequestOptions,
    ): Promise<SearchCompositionRulesResponse> {
      if (!compositionID) {
        throw new Error('Parameter `compositionID` is required when calling `searchCompositionRules`.');
      }

      const requestPath = '/1/compositions/{compositionID}/rules/search'.replace(
        '{compositionID}',
        encodeURIComponent(compositionID),
      );
      const headers: Headers = {};
      const queryParameters: QueryParameters = {};

      const request: Request = {
        method: 'POST',
        path: requestPath,
        queryParameters,
        headers,
        data: searchCompositionRulesParams ? searchCompositionRulesParams : {},
      };

      return transporter.request(request, requestOptions);
    },

    /**
     * Searches for values of a specified facet attribute on the composition\'s main source\'s index.  - By default, facet values are sorted by decreasing count.   You can adjust this with the `sortFacetValueBy` parameter. - Searching for facet values doesn\'t work if you have **more than 65 searchable facets and searchable attributes combined**.
     *
     * Required API Key ACLs:
     *  - search
     * @param searchForFacetValues - The searchForFacetValues object.
     * @param searchForFacetValues.compositionID - Unique Composition ObjectID.
     * @param searchForFacetValues.facetName - Facet attribute in which to search for values.  This attribute must be included in the `attributesForFaceting` index setting with the `searchable()` modifier.
     * @param searchForFacetValues.searchForFacetValuesRequest - The searchForFacetValuesRequest object.
     * @param requestOptions - The requestOptions to send along with the query, they will be merged with the transporter requestOptions.
     */
    searchForFacetValues(
      { compositionID, facetName, searchForFacetValuesRequest }: SearchForFacetValuesProps,
      requestOptions?: RequestOptions,
    ): Promise<SearchForFacetValuesResponse> {
      if (!compositionID) {
        throw new Error('Parameter `compositionID` is required when calling `searchForFacetValues`.');
      }

      if (!facetName) {
        throw new Error('Parameter `facetName` is required when calling `searchForFacetValues`.');
      }

      const requestPath = '/1/compositions/{compositionID}/facets/{facetName}/query'
        .replace('{compositionID}', encodeURIComponent(compositionID))
        .replace('{facetName}', encodeURIComponent(facetName));
      const headers: Headers = {};
      const queryParameters: QueryParameters = {};

      const request: Request = {
        method: 'POST',
        path: requestPath,
        queryParameters,
        headers,
        data: searchForFacetValuesRequest ? searchForFacetValuesRequest : {},
        useReadTransporter: true,
        cacheable: true,
      };

      return transporter.request(request, requestOptions);
    },
  };
}
