<?php
namespace Controler;

use Pes\Logger\FileLogger;

/**
 * Description of LogControler
 *
 * @author pes2704
 */
class Consent {
    public function logConsent() {
        // kopie php://input do streamu:
        /** @var resource $bodyContent */
        $bodyContent = fopen('php://temp', 'w+');
        $len = stream_copy_to_stream(fopen('php://input', 'r'), $bodyContent);  // Returns the total count of bytes copied, or false on failure.
        //  'application/json'
        $bodyString = stream_get_contents($bodyContent);
        $bodyParsed = json_decode($bodyString, true);  // return asociative array|null
        fclose($bodyContent);
        $post = $bodyParsed;
        
        // form data
        $revision = filter_var($post['revision'],FILTER_SANITIZE_SPECIAL_CHARS);
        $consentId = filter_var($post['consentId'],FILTER_SANITIZE_SPECIAL_CHARS);
        $consentTimestamp = filter_var($post['consentTimestamp'],FILTER_SANITIZE_SPECIAL_CHARS);
        $lastConsentTimestamp = filter_var($post['lastConsentTimestamp'],FILTER_SANITIZE_SPECIAL_CHARS);
        // kopie php://input do streamu:
        $bodyContent = fopen('php://temp', 'w+');
        stream_copy_to_stream(fopen('php://input', 'r'), $bodyContent);
        rewind($bodyContent);
        
        FileLogger::setBaseLogsDirectory(__DIR__.'/../..');
        $consentLogger = FileLogger::getInstance('/_Logs/Consent', 'Consent.log', FileLogger::APPEND_TO_LOG);
        $consentLogger->info("$revision|$consentTimestamp|$lastConsentTimestamp|$consentId|$bodyContent");
        
        header('Content-Type: application/json');
        return json_encode([]);


//        $bodyContent = $request->getBody()->getContents();
//        $requestParams = new RequestParams();
//        $revison = $requestParams->getParsedBodyParam($request, 'revision', false);        
//        $consentId = $requestParams->getParsedBodyParam($request, 'consentId', false);        
//        $consentTimestamp = $requestParams->getParsedBodyParam($request, 'consentTimestamp', false);        
//        $lastConsentTimestamp = $requestParams->getParsedBodyParam($request, 'lastConsentTimestamp', false);
//        $consentLogger = $this->container->get('ConsentLogger');
//        $consentLogger->info("$revison|$consentTimestamp|$lastConsentTimestamp|$consentId|$bodyContent");
//        return $this->createJsonPostCreatedResponse([]);
    }
}
