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
        'Overpass-Mono': ['"Overpass Mono"', 'monospace'],
        'Fredoka': ['Fredoka', 'sans-serif'],
      },
      blur: {
        xs: '1px',
      }
    },
  },
  plugins: [],
}

