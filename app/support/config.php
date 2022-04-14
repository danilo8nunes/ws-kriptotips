<?php

/**
 * PROJECT LOCAL ADDRESSES
 */
define("LOCAL_ADDRESSES", [
  'localhost',
  '127.0.0.1',
  '10.0.0.2',
  '192.168.1.2',
  '192.168.1.4'
]);

/**
 * PROJECT ENVIRONMENT
 */
if (in_array($_SERVER['SERVER_NAME'], LOCAL_ADDRESSES)) {
  define("ENVIRONMENT", "local");
} else {
  define("ENVIRONMENT", "prod");
}

/**
 * PROJECT URLs
 */
define("CONF_URL_BASE", "www.api.darkcrypt.com.br");
define("CONF_URL_TEST", "localhost");


/**
 *  APP TOKEN
 */
define("APP_TOKEN", "DARKCRYPTY19@A108");
