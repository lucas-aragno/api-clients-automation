import fsp from 'fs/promises';

import config from '../../config/release.config.json' with { type: 'json' };
import { run } from '../common.ts';

export function getLastReleasedTag(): Promise<string> {
  return run(`git describe --abbrev=0 --tags --match "${config.releasedTag}*"`);
}

export function getFileChanges(commit: string): Promise<string> {
  return run(`git diff --name-only ${commit}^ ${commit}`);
}

export async function getNewReleasedTag(): Promise<string> {
  const lastCommitHash = await run('git rev-parse --short HEAD');
  const now = new Date().toISOString().split('T')[0];

  return `${config.releasedTag}-${now}-${lastCommitHash}`;
}

export function getTargetBranch(language: string): string {
  return config.targetBranch[language] || config.defaultTargetBranch;
}

export function getGitAuthor(): { name: string; email: string } {
  return config.gitAuthor;
}

/**
 * Writes `data` in a file at the given `ppath`, appends a newline at the end of the file.
 *
 * @param ppath - The absolute path to the file.
 * @param data - The data to store.
 */
export async function writeJsonFile(ppath: string, data: Record<string, any>): Promise<void> {
  await fsp.writeFile(ppath, JSON.stringify(data, null, 2).concat('\n'));
}

export function stripCommitMessage(message: string): string {
  return message.replace(/ \[skip-bc\]/g, '').replace(/ \[skip-e2e\]/g, '');
}
