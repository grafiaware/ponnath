<?php
namespace Logger;

use Pes\Logger\FileLogger;

/**
 * Description of Logger
 *
 * @author pes2704
 */
class Logger {
    public function request() {
        FileLogger::setBaseLogsDirectory(__DIR__.'/../..');
        $logger = FileLogger::getInstance('/_Logs/Request', 'Request.log', FileLogger::APPEND_TO_LOG);        
        $method = $_SERVER['REQUEST_METHOD'];
        $uri = $_SERVER['REQUEST_URI'];
        $ipAddr = $_SERVER['REMOTE_ADDR'];
        $ipNum = ip2long($_SERVER['REMOTE_ADDR']);  // (ip2long($_SERVER['REMOTE_ADDR']) & ip2long(self::IP_MASK))
        $validity = filter_var($ipAddr,FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) ? "remote" : "invalid or private";
        // Parse current URL
//        $parsed_url = parse_url($_SERVER['REQUEST_URI']);      
        
        $logger->info("$ipAddr | $ipNum | $method | $uri | $validity");
    }
}
