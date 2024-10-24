<?php

/**
 * Functie voor het loggen van de errors die ontstaan door try-catch
 * De volgende zaken worden gelogd:
 * - Errormessage van de fout
 * - datum en tijd wanneer de fout is opgetreden
 * - bestand waar de fout is opgetreden
 * - regelnummer van de fout
 * - method waarin de fout is opgetreden
 * - ip-adres van de veroorzaker van de fout
 */

function logger($line, $method, $file, $errorMessage)
{
    /**
     * Tijd waarop de error plaatsvond
     */
    date_default_timezone_set('Europe/Amsterdam');
    $time = "Datum/tijd: " . date('d-m-Y H:i:s', time()) . "\t";

    /**
     * De error uit de code
     */
    $error = "De error is: " . $errorMessage . "\t";

    /**
     * Het ip-adres van degene die de error veroorzaakt
     */
    $remote_ip = "Remote IP-adres: " . $_SERVER['REMOTE_ADDR'] . "\t";

    /**
     * Filename waar de error heeft plaatsgevonden.
     */
    $filename = "Filename: " . $file . "\t";

    /**
     * Methodname waar de error heeft plaatsgevonden.
     */
    $methodname = "Methodname: " . $method . "\t";

    /**
     * Regelnummer waar de fout heeft plaatsgevonden
     */
    $linenumber = "Linenumber: " . $line . "\t";

    /**
     * Regel met info over de error die wordt opgeslagen in het log-bestand
     */
    $content = $time . $remote_ip . $error . $filename . $methodname . $linenumber . "\r";

    /**
     * Definieer het logbestand en het pad
     */
    $pathToLogFile = __DIR__ . "/../logs/log.txt";

    /**
     * Als het bestand niet bestaat, maak het bestand aan
     */
    if (!file_exists($pathToLogFile)) {
        file_put_contents($pathToLogFile, "Non Functional Log\r");
    }

    /**
     * Schrijf de error naar het logbestand
     */
    file_put_contents($pathToLogFile, $content, FILE_APPEND);
}

function customErrorHandler($severity, $message, $file, $line) {
    // Call your logger function to log the error
    logger($line, 'ErrorHandler', $file, $message);

    // Return `false` to allow the default error handler to run (optional)
    return false;
}
