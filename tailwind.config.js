/** @type {import('tailwindcss').Config} */
module.exports = {
  presets: [
    require('decanter')
  ],
  content: ["template.php", "./templates/*", "./examples/*"],
  safelist: [
    "type-*",
    "basefont-*"
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}

