// Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT.

import { createAuth, createTransporter, getAlgoliaAgent } from '@algolia/client-common';
import type {
  CreateClientOptions,
  Headers,
  Host,
  QueryParameters,
  Request,
  RequestOptions,
} from '@algolia/client-common';

import type {
  CustomDeleteProps,
  CustomGetProps,
  CustomPostProps,
  CustomPutProps,
  DeleteUserTokenProps,
} from '../model/clientMethodProps';
import type { EventsResponse } from '../model/eventsResponse';
import type { InsightsEvents } from '../model/insightsEvents';

export const apiClientVersion = '5.4.2';

export const REGIONS = ['de', 'us'] as const;
export type Region = (typeof REGIONS)[number];

function getDefaultHosts(region?: Region): Host[] {
  const url = !region ? 'insights.algolia.io' : 'insights.{region}.algolia.io'.replace('{region}', region);

  return [{ url, accept: 'readWrite', protocol: 'https' }];
}

// eslint-disable-next-line @typescript-eslint/explicit-function-return-type
export function createInsightsClient({
  appId: appIdOption,
  apiKey: apiKeyOption,
  authMode,
  algoliaAgents,
  region: regionOption,
  ...options
}: CreateClientOptions & { region?: Region }) {
  const auth = createAuth(appIdOption, apiKeyOption, authMode);
  const transporter = createTransporter({
    hosts: getDefaultHosts(regionOption),
    ...options,
    algoliaAgent: getAlgoliaAgent({
      algoliaAgents,
      client: 'Insights',
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
     * This method allow you to send requests to the Algolia REST API.
     *
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
     *
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
     *
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
     *
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
     * Deletes all events related to the specified user token from events metrics and analytics. The deletion is asynchronous, and processed within 48 hours. To delete a personalization user profile, see `Delete a user profile` in the Personalization API.
     *
     * @param deleteUserToken - The deleteUserToken object.
     * @param deleteUserToken.userToken - User token for which to delete all associated events.
     * @param requestOptions - The requestOptions to send along with the query, they will be merged with the transporter requestOptions.
     */
    deleteUserToken({ userToken }: DeleteUserTokenProps, requestOptions?: RequestOptions): Promise<void> {
      if (!userToken) {
        throw new Error('Parameter `userToken` is required when calling `deleteUserToken`.');
      }

      const requestPath = '/1/usertokens/{userToken}'.replace('{userToken}', encodeURIComponent(userToken));
      const headers: Headers = {};
      const queryParameters: QueryParameters = {};

      const request: Request = {
        method: 'DELETE',
        path: requestPath,
        queryParameters,
        headers,
      };

      return transporter.request(request, requestOptions);
    },

    /**
     * Sends a list of events to the Insights API.  You can include up to 1,000 events in a single request, but the request body must be smaller than 2&nbsp;MB.
     *
     * @param insightsEvents - The insightsEvents object.
     * @param requestOptions - The requestOptions to send along with the query, they will be merged with the transporter requestOptions.
     */
    pushEvents(insightsEvents: InsightsEvents, requestOptions?: RequestOptions): Promise<EventsResponse> {
      if (!insightsEvents) {
        throw new Error('Parameter `insightsEvents` is required when calling `pushEvents`.');
      }

      if (!insightsEvents.events) {
        throw new Error('Parameter `insightsEvents.events` is required when calling `pushEvents`.');
      }

      const requestPath = '/1/events';
      const headers: Headers = {};
      const queryParameters: QueryParameters = {};

      const request: Request = {
        method: 'POST',
        path: requestPath,
        queryParameters,
        headers,
        data: insightsEvents,
      };

      return transporter.request(request, requestOptions);
    },
  };
}
