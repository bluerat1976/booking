
# INPUT

> no input
> malicious code
> wrong format

USER
|
/exemples/validation.php (access the page)
|
V
BROUSER
|
V
X------------------ GET request /exemples/validation.php -----------> SERVER
                                                                          |
                                                                    isset($_GET['rate']) ?
                                                                          |
                                                                          V
                            Warning: Undefined array   <----- $rate = $_GET['rate']
                             |                                              |
                             |                                              |
                             +<-------------       <form>  <----------------+
                             |                       ....
+----------------------------+                    </form>
|
V
BROWSER                                                 
|
V   
render
|
v
WINDOW  <------- User clicks button                     
|
V
client side validation:
| 
V
x - required
? - pattern
|
V
+---------- GET request exemples/validation.php rate=3---------------> SERVER






ASSOCIATIVE ARRAY

$_GET [
    'rate' => ...,
    'variable' => ...,
    ....
]