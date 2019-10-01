# Please Framework

**Please** is a PHP framework based on symfony library for dealing with world scalable website using php progamming language.

## Installation

Use the package manager [composer](https://getcomposer.org) to install **Please**.

```bash
git clone https://github.com/pleaseframe/please.git
cd Please-Framework/
composer install
```

## Usage

```bash
php please -V             # check version of symfony

php please                # enter
```
you will see lots of command console from this to *cache, config, debug, doctrine, make, router and server*. This is how to start your program on local server with port **8000** :

```bash
php please server:run     # [OK] Server listening on http://127.0.0.1:8000
php -S localhost:[anythingPort] -t public   # Listening on http://localhost:1234
``` 

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
Symfony code is released under [the MIT license](https://en.wikipedia.org/wiki/MIT_License):

Copyright (c) 2004-2019 Fabien Potencier

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.
