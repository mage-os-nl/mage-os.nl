/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
      "./content/**/*.{php,phtml,md}",
      "./templates/**/*.{php,phtml}",
  ],
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
