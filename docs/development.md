# Developing the Stanford Decanter (v7) theme

This theme requires [Yarn](https://yarnpkg.com) (or similar) package manager for development. Every time a css or template file changes, the main.css file in css/ must be recompiled using tailwind. If you have yarn or npm installed you can use it to trigger the compile step:

- From within the theme directory run:

  ```sh
  yarn install && yarn build;
  ```

- You can recompile automatically while developing by running:

  ```sh
  yarn watch
  ```

## Compiled output

The following files are compiled automatically and should not be directly edited:

- `css/main.css` (Edit [`src/main.css`](../src/main.css) instead)

## Colors

This theme supports custom colors using the Color module. To keep this support please make sure to update [`css/skin.css`](../css/skin.css), [`theme-settings.php`](../theme-settings.php) and [`color/color.inc`](../color/color.inc) files.

## Pushing code changes

Github actions will build and commit the output upon push.

## Pull requests

Please submit any suggested changes as a [github pull request.](https://github.com/backdrop-contrib/stanford_decanter/compare)

You can also use github to file [bug reports and support requests.](https://github.com/backdrop-contrib/stanford_decanter/issues)

[Edit this page on Github](https://github.com/backdrop-contrib/stanford_decanter/edit/main/docs/development.md)