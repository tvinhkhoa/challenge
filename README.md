# Challenge

## Setup

- Product is developing on PHP.7.3

- Setup php coverage:
```js
Download phar for unit test
curl -o phpunit.phar https://phar.phpunit.de/phpunit-8.phar

In Linux
sudo cp phpunit.phar /usr/bin/phpunit or /usr/local/bin/phpunit

In Window
copy file phpunit.phar into php source xampp\php\
change line of file phpunit.bat "%PHPBIN%" "\xampp\php\phpunit" %* to "%PHPBIN%" "\xampp\php\phpunit.phar" %*

```

## Running

### Run source by command line

```js
php index.php
```

### Run test coverage

Run the following command to run test coverage.

```js
phpunit testcase.php
```