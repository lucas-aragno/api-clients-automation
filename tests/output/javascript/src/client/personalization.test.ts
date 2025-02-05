// Code generated by OpenAPI Generator (https://openapi-generator.tech), manual changes will be lost - read more on https://github.com/algolia/api-clients-automation. DO NOT EDIT.
/* eslint-disable eslint/no-unused-vars */
import { describe, expect, test } from 'vitest';

import type { EchoResponse } from '@algolia/requester-testing';
import { nodeEchoRequester } from '@algolia/requester-testing';
import { algoliasearch } from 'algoliasearch';

const appId = 'test-app-id';
const apiKey = 'test-api-key';

function createClient() {
  return algoliasearch(appId, apiKey).initPersonalization({
    options: { requester: nodeEchoRequester() },
    region: 'us',
  });
}

describe('commonApi', () => {
  test('calls api with correct user agent', async () => {
    const client = createClient();

    const result = (await client.customPost({ path: '1/test' })) as unknown as EchoResponse;

    expect(decodeURIComponent(result.algoliaAgent)).toMatch(
      /^Algolia for JavaScript \(\d+\.\d+\.\d+(-?.*)?\)(; [a-zA-Z. ]+ (\(\d+((\.\d+)?\.\d+)?(-?.*)?\))?)*(; Personalization (\(\d+\.\d+\.\d+(-?.*)?\)))(; [a-zA-Z. ]+ (\(\d+((\.\d+)?\.\d+)?(-?.*)?\))?)*$/,
    );
  }, 15000);

  test('the user agent contains the latest version', async () => {
    const client = createClient();

    const result = (await client.customPost({ path: '1/test' })) as unknown as EchoResponse;

    expect(decodeURIComponent(result.algoliaAgent)).toMatch(/^Algolia for JavaScript \(5.20.1\).*/);
  }, 15000);
});

describe('parameters', () => {
  test('throws when region is not given', async () => {
    try {
      // @ts-ignore
      const client = algoliasearch('my-app-id', 'my-api-key').initPersonalization({
        options: {
          requester: nodeEchoRequester(),
        },
        // @ts-ignore
        region: '',
      });
      throw new Error('test is expected to throw error');
    } catch (e) {
      expect((e as Error).message).toMatch('`region` is required and must be one of the following: eu, us');
    }
  }, 15000);

  test('throws when incorrect region is given', async () => {
    try {
      // @ts-ignore
      const client = algoliasearch('my-app-id', 'my-api-key').initPersonalization({
        options: {
          requester: nodeEchoRequester(),
        },
        // @ts-ignore
        region: 'not_a_region',
      });
      throw new Error('test is expected to throw error');
    } catch (e) {
      expect((e as Error).message).toMatch('`region` is required and must be one of the following: eu, us');
    }
  }, 15000);

  test('does not throw when region is given', async () => {
    const client = algoliasearch('my-app-id', 'my-api-key').initPersonalization({
      options: {
        requester: nodeEchoRequester(),
      },
      // @ts-ignore
      region: 'us',
    });
  }, 15000);
});

describe('setClientApiKey', () => {
  test('switch API key', async () => {
    const client = algoliasearch('test-app-id', 'test-api-key').initPersonalization({
      options: {
        hosts: [
          {
            url: 'localhost',
            port: 6683,
            accept: 'readWrite',
            protocol: 'http',
          },
        ],
      },
      // @ts-ignore
      region: 'us',
    });
    {
      const result = await client.customGet({ path: 'check-api-key/1' });

      expect(result).toEqual({ headerAPIKeyValue: 'test-api-key' });
    }
    {
      client.setClientApiKey({ apiKey: 'updated-api-key' });
    }
    {
      const result = await client.customGet({ path: 'check-api-key/2' });

      expect(result).toEqual({ headerAPIKeyValue: 'updated-api-key' });
    }
  }, 15000);
});

describe('init', () => {
  test('sets authMode', async () => {
    const qpClient = algoliasearch('foo', 'bar').initPersonalization({
      options: { requester: nodeEchoRequester(), authMode: 'WithinQueryParameters' },
      region: 'us',
    });
    const headerClient = algoliasearch('foo', 'bar').initPersonalization({
      options: { requester: nodeEchoRequester(), authMode: 'WithinHeaders' },
      region: 'us',
    });

    const qpResult = (await qpClient.customGet({
      path: '1/foo',
    })) as unknown as EchoResponse;
    expect(qpResult.searchParams).toEqual({
      'x-algolia-api-key': 'bar',
      'x-algolia-application-id': 'foo',
    });

    const headerResult = (await headerClient.customGet({
      path: '1/bar',
    })) as unknown as EchoResponse;
    expect(headerResult.headers).toEqual({
      accept: 'application/json',
      'content-type': 'text/plain',
      'x-algolia-api-key': 'bar',
      'x-algolia-application-id': 'foo',
    });
  });
});
