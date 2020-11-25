# HTTPComponent

The HTTPComponent is very simple. It's only 2 objects. One for the request and one for the response;

You can create the request from the [PHP Superglobals](https://www.php.net/manual/en/language.variables.superglobals.php). With this request you have a lot of method to get information like method, query paramteter, ip, request uri... Go to the [Request](./Request.md) section for more information.

```php
use App\Http\Request;

$request = Request::createFromGlobals();
$request->getMethod; //return the method
$request->getHearder('Content-Type'); //Return the `Content-Type` header
...
```
