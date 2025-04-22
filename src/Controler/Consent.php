<?php
namespace Consent\Middleware\ConsentLogger\Controler;

use Pes\Logger\FileLogger;

/**
 * Description of LogControler
 *
 * @author pes2704
 */
class LogControler extends FrontControlerAbstract {
    public function logConsent(ServerRequestInterface $request): ResponseInterface {
        $post = $_POST;
        
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
