# Example of using HTML purifier

If you are not using a templating system that handles XSS for you, like [Blade](https://laravel.com/docs/5.6/blade) or [Twig](https://twig.symfony.com/), for example then you should consider using a library to properly manage escaping your HTML output. [HTML purifier](http://htmlpurifier.org) is a good example of a flexible filtering library.

This project demonstrates using HTML purifier to escape the portion of our page that could contain user supplied input.  Any place where we are including user input needs to be properly escaped.  This includes inline CSS, HTML attributes, and JavaScript.  Using a library makes it more convenient to consistently apply the correct rules for the encoding context.

## Running the project

To run the project use this command:

    php -S localhost:8000

## Injecting script

Edit the file "database-content.txt" and include your stored XSS code.  The contents of this file will be read and placed into the target-site page in the section under stored XSS.

Use the GET parameter "error" to simulate reflected XSS.  This is intended to simulate a situation where the vulnerable site uses the GET parameter "error" to communicate a message back to the user.  This could, for example, happen if they fill in a form incorrectly.

The contents of the "error" parameter will be displayed without escaping in the section of the target-site labeled "Reflected XSS demonstration".  For example visit the site with the url "http://localhost:8000/?error=Hello"

## Theme of the target-site

The frontend theme is taken from https://startbootstrap.com/themes/stylish-portfolio/ and is licensed under the MIT license.
