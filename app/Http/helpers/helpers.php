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
