# Developing the Stanford Decanter (v7) theme

This theme requires [npm](https://www.npmjs.com) (or similar) package manager for development. Every time a css or template file changes, the main.css file in css/ must be recompiled using tailwind. If you have yarn or npm installed you can use it to trigger the compile step:

- From within the stanford_decanter theme directory run:

  ```sh
  npm install && npm run build;
  ```

- You can recompile automatically while developing by running:

  ```sh
  npm run watch
  ```

## Compiling without installing Node/npm/Yarn

If you have docker or a compatible container engine installed, you can compile the theme using the official Node docker image.

- From within the stanford_decanter theme directory run:

  ```sh
  docker run -it --rm -v "$(pwd)":/usr/src/app -w /usr/src/app node:alpine npm install && \
  docker run -it --rm -v "$(pwd)":/usr/src/app -w /usr/src/app node:alpine npm run build;
  ```


## Compiled output

The following files are compiled automatically and should not be directly edited:

- `dist/main.compiled.css` (Edit [`src/main.css`](../src/main.css) instead)

## Colors

This theme supports custom colors using the Color module. To keep this support please make sure to update [`css/skin.css`](../css/skin.css), [`theme-settings.php`](../theme-settings.php) and [`color/color.inc`](../color/color.inc) files.

## Pushing code changes

Github actions will build and commit the output upon push.

## Pull requests

Please submit any suggested changes as a [github pull request.](https://github.com/backdrop-contrib/stanford_decanter/compare)

You can also use github to file [bug reports and support requests.](https://github.com/backdrop-contrib/stanford_decanter/issues)

[Edit this page on Github](https://github.com/backdrop-contrib/stanford_decanter/edit/main/docs/development.md)

## Running Visual Regression Tests

To take a reference capture of the test site run:

    docker compose run backstop reference --config=/config.js