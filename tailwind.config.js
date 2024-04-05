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
      colors:{
        "Bg": "#F4F4F4",
        "Secondary":"#0D0D0D",
        "Button":"#0080BF",
        "Second":"#109CDE",
      },
      blur: {
        xs: '1px',
      },
    },
  },
  plugins: [require("daisyui")],
  // daisyUI config (optional - here are the default values)
  daisyui: {
      themes: false, // false: only light + dark | true: all themes | array: specific themes like this ["light", "dark", "cupcake"]
      darkTheme: "light", // name of one of the included themes for dark mode
      base: true, // applies background color and foreground color for root element by default
      styled: true, // include daisyUI colors and design decisions for all components
      utils: true, // adds responsive and modifier utility classes
      prefix: "", // prefix for daisyUI classnames (components, modifiers and responsive class names. Not colors)
      logs: true, // Shows info about daisyUI version and used config in the console when building your CSS
      themeRoot: ":root", // The element that receives theme color CSS variables
  },
}

