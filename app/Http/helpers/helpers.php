<?php

/**
 * Get the config environmental values
 *
 * @param null $key
 * @param null $default
 * @return mixed|\Illuminate\Config\Repository
 */
function configEnv($key = null, $default = null)
{
    if (!is_null($key)) {
        $key = '.' . strtolower($key);
    }
    return config('environment-values' . $key, $default);
}

/**
 * @param Exception $error
 * @param $message
 * @param $location
 * @param array $params
 */
function logError(Exception $error, $message, $location, array $params = [])
{
    \Illuminate\Support\Facades\Log::error($message, [
        'location' => $location,
        'message' => $error->getMessage(),
        'params' => $params,
        'trace' => $error->getTraceAsString(),
    ]);
}

/**
 * Get Version for given version
 *
 * @param $version
 * @return \Illuminate\Config\Repository|mixed
 */
function getVersion($version)
{
    if (is_null($version)) {
        return getDefaultVersion();
    }

    return $version;
}

/**
 * Get Default Version
 *
 * @return mixed
 */
function getDefaultVersion()
{
    return configEnv('version.default');
}

/**
 * Get Default Path
 *
 * @return mixed
 */
function getDefaultPath()
{
    return configEnv('path.default');
}

/**
 * Get Route URL for Given Docs Version and Path
 *
 * @param null $version
 * @param null $path
 * @return string
 */
function getDocsRoute($version = null, $path = null): string
{
    $version = $version ?? getDefaultVersion();
    $path = $path ?? getDefaultPath();

    return route('docs.show', [
        'version' => $version,
        'path' => $path
    ]);
}

/**
 * Get the available Version  List
 *
 * @return \Illuminate\Config\Repository|mixed
 */
function getVersionList()
{
    $versionList = array_reverse(configEnv('version.list'));

    if (app()->isLocal()) {
        return array_merge($versionList, ['temp']);
    }
    return $versionList;
}

/**
 * Get Markdown Path
 *
 * @param null $version
 * @param null $path
 * @return string
 */
function markdown_path($version = null, $path = null): string
{
    $fileName = getMarkdownFileName($path);
    return base_path(
        implode('/', ['markdown', $version, $fileName])
    );
}

/**
 * Get Markdown File Name for given Path
 *
 * @param $path
 * @return string
 */
function getMarkdownFileName($path): string
{
    if (\Illuminate\Support\Str::endsWith($path, '.md')) {
        return $path;
    }

    return strtolower($path) . '.md';
}

function getSideBarPath()
{
    return configEnv('path.sidebar');
}
