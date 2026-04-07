/** @type {import('tailwindcss').Config} */
module.exports = {
  presets: [
    require('decanter')
  ],
  content: ["template.php", "./templates/*", "./examples/*"],
  safelist: [
    "type-*",
    "text-*",
    "basefont-*",
    "indent-*",
    "-indent-*",
    "m-*",
    "p-0",
    "p-*",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}

