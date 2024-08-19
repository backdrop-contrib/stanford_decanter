Decanter v7 for Backdrop CMS
=======

A base theme for Stanford sites using Decanter 7 and tailwind. Decanter is a web design and development system for Stanford University. It includes a responsive layout system and a browsable collection of design patterns that can be used in any Stanford project.  https://decanter.stanford.edu/

Installation
------------

- Install this theme using the official Backdrop CMS instructions at
  https://docs.backdropcms.org/documentation/skin-with-themes.

- **Optional** Install the [Theme Hooks module](https://github.com/ronan/theme_hooks) to allow the theme to expose some global identity blocks that can be added to the site's header and footer.

Developing
----------

This theme requires Yarn package manager for development. Every time a css or template file changes
the css file in dist/ must be recompiled using tailwind. If you have yarn or npm installed you can
use it to trigger the compile step:

- From within the theme directory run:

  ```sh
  yarn install && yarn build;
  ```

- You can recompile automatically while developing by running:

  ```sh
  yarn watch
  ```

Issues
------
<!--
Link to the repo's issue queue.
-->

Bugs and Feature Requests should be reported in the Issue Queue:
https://github.com/backdrop-contrib/stanford_decanter/issues.


Current Maintainers
-------------------

- [Ronan Dowling](https://github.com/ronan)
- [Irina Zaks](https://github.com/irinaz)


Credits
-------

https://decanter.stanford.edu/


License
-------
This project is GPL v2 software.
See the LICENSE.txt file in this directory for complete text.
