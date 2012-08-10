Update site (mobile)
====================
Show a list of files in descending order of their timestamp in a
mobile-friendly format.

This can be useful as an "update site" of a piece of software.
Every time you release a new package of the software, you can
simply drop the new package file in the web directory, and a
simple php script will list the files in descending order of their
timestamp, highlighting the latest version at the top.


Features
--------
- List files in descending order by timestamp
- Highlight latest version
- Ultra light-weight: a single PHP script
- Ultra portable: all you need is a PHP enabled web server
- Valid HTML5: courtesy of http://html5boilerplate.com/
- Pretty: courtesy of http://twitter.github.com/bootstrap/
- Skinnable: copy `index.php.html.sample` to `index.php.html` and customize
- Configurable:

        - filename patterns to match
        - maximum number of files to show


