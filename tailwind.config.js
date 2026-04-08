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
    "p-*",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}

