first i create a folder at root directory (hello package) also create src folder in hello folder.
then open that folder and open terminal at that folder.
run - composer init  ,
then fill required details ,
in composer.json of hello package folder
"autoload": {
        "psr-4": {
                "Test\\Calculator\\": "PackageTesting/Test/Calculator/src"

            "hello\\": "src/"  
             #(hello is a folder name and src is used to connect that folder)
        }
    },
define in composer.json

create service provider for routes and controller use

in app.php /providers  
    define
        Test\Calculator\CalculatorServiceProvider::class,


