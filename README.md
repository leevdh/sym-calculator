# symfony-calculator

## Running App
To run the application, you can run the ./run_app.sh from command line, if you cannot see it you may need to update the file permission
`chmod 777 ./run_app.sh`
If you get errors, you can run stop php and nginx
`docker stop php`
`docker rm php`
`docker stop nginx`
`docker rm nginx`

## Running Tests
To run the test, you can run the ./run_test.sh from command line, if you cannot see it you may need to update the file permission
`chmod 777 ./run_test.sh`

## Accessing UI
To access calculator the path is
`http://localhost:8080/calculator`

## Accessing API
To access calculator API the path is
`http://localhost:8080/api/calculator?value_one=1&value_two=3&operand=add`
Operands are add/subtract/divide/multiply
