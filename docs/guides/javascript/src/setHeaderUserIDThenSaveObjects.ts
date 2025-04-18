import { algoliasearch } from 'algoliasearch';

const playlists: Record<string, any>[] = [
  /* Your records */
];

const client = algoliasearch('ALGOLIA_APPLICATION_ID', 'ALGOLIA_API_KEY');

playlists.forEach(async (playlist) => {
  try {
    const playlistUserID = playlist['userID'];
    await client.saveObjects(
      { indexName: 'indexName', objects: playlists, waitForTasks: false, batchSize: 1000 },
      {
        headers: { 'X-Algolia-User-ID': playlistUserID },
      },
    );
  } catch (e: any) {
    console.error(e);
  }
});
