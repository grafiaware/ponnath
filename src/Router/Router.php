<?php
namespace Router;

use UnexpectedValueException;
use Closure;

/**
 * Description of Router
 *
 * @author pes2704
 */
class Router {
    protected $routes = []; // stores routes

    public function addRoute(string $method, string $url, Closure $target) {
        $this->routes[$method][$url] = $target;
    }
    
    public function dispatch($basePath) {
        $method = $_SERVER['REQUEST_METHOD'];

        // Parse current URL
        $parsed_url = parse_url($_SERVER['REQUEST_URI']);

        // If there is a path available
        if (isset($parsed_url['path'])) {
            $basePathPosition = strpos($parsed_url['path'], $basePath);
            if ($basePathPosition!==0) {
                throw new UnexpectedValueException("Basepath '$basePath' not found in the url path.");
            } else {
                $relativePath = str_replace($basePath, '/', $parsed_url['path']);
            }
        }    

        $path = urldecode($relativePath);

        if (isset($this->routes[$method])) {
            foreach ($this->routes[$method] as $routeUrl => $target) {
                // Use named subpatterns in the regular expression pattern to capture each parameter value separately
                $pattern = preg_replace('/\/:([^\/]+)/', '/(?P<$1>[^/]+)', $routeUrl);
                if (preg_match('#^' . $pattern . '$#', $path, $matches)) {
                    // Pass the captured parameter values as named arguments to the target function
                    $params = array_filter($matches, 'is_string', ARRAY_FILTER_USE_KEY); // Only keep named subpattern matches
                    return call_user_func_array($target, $params);
//                    return;
                }
            }
        }
        throw new UnexpectedValueException("Route $method '${parsed_url['path']}' not found");
    } 
    
    private function canonicalize($urlPattern) {
        // zamění parametry v pattern za :
        return preg_replace('/\\\:[a-zA-Z0-9\_\-]+/u', ':', preg_quote($urlPattern));

    }    
    
}
