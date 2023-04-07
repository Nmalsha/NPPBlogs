/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./NPP-Blogs/templates/blog/home.html.twig",
    "./assets/script/main.js",
    "./node_modules/tw-elements/dist/js/**/*.js",
    "./assets/react/*.jsx",
  ],
  theme: {
    extend: {},
  },
  plugins: [require("tw-elements/dist/plugin")],
};
