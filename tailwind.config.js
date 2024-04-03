/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily:{
        'Overpass': ['"Overpass"', 'sans-serif'],
        'Fredoka': ['Fredoka', 'sans-serif'],
      },
    },
  },
  plugins: [],
}

