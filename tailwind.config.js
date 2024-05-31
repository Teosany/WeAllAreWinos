/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.js",
    "./templates/**/*.{ts,tsx,html,js,html.twig}",
    // './node_modules/preline/*.js',
    './assets/vendor/preline/*.js',
  ],
  theme: {
    extend: {},
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
    require('./assets/vendor/preline/plugin'),
  ],
}

