<?php

namespace Yadakhov;

/**
 * A simple curl wrapper class.
 */
class Curl
{
    /**
     * @var
     */
    protected $userAgent = 'Mozilla/5.0 (Windows NT 6.1; rv:31.0) Gecko/20100101 Firefox/31.0';

    /**
     * Get a instance of the class.
     *
     * @return Curl
     */
    public static function getInstance()
    {
        return new Curl();
    }

    /**
     * Perform a GET request.
     *
     * @param $url
     * @param array|null $params
     * @param array|null $headers
     *
     * @return mixed
     */
    public function get($url, array $params = null, array $headers = null)
    {
        $ch = curl_init();
        if (!empty($params)) {
            $url .= '?' . http_build_query($params);
        }
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_USERAGENT, $this->userAgent);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip');

        if (!empty($headers)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }

    /**
     * Perform a POST request.
     *
     * @param $url
     * @param array|string|null $params
     * @param array|null $headers
     *
     * @return mixed
     */
    public function post($url, $params = null, array $headers = null)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_VERBOSE, 0);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_USERAGENT, $this->userAgent);
        curl_setopt($ch, CURLOPT_ENCODING, 'gzip');
        if (!empty($params)) {
            if (is_array($params)) {
                curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
            } else {
                curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
            }
        }
        if (!empty($headers)) {
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        }

        $response = curl_exec($ch);
        curl_close($ch);

        return $response;
    }
}
