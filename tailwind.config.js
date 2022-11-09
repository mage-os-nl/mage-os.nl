/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./templates/**/*.{php,phtml}"],
  theme: {
    extend: {
      fontFamily: {
        'sans': ['Montserrat', 'sans-serif'],
      },
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
  ],
}
