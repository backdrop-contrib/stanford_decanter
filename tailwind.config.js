/** @type {import('tailwindcss').Config} */
module.exports = {
  presets: [
    require('decanter')
  ],
  content: ["template.php", "./templates/*", "./examples/*"],
  safelist: [
    "type-*",
    "basefont-*",
    "m-*",
    "p-*"
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}

