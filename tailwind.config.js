/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  content: [
      "./content/**/*.{php,phtml,md}",
      "./templates/**/*.{php,phtml}",
      "./resources/svg/*.svg",
  ],
  theme: {
    extend: {
      fontFamily: {
        'sans': ['Montserrat', 'sans-serif'],
        'obviously-variable': ['obviously-variable', ...defaultTheme.fontFamily.sans],
        'obviously-super': ['obviously-super', ...defaultTheme.fontFamily.sans],
        'obviously-condensed': ['obviously-condensed', ...defaultTheme.fontFamily.sans],
        'obviously-narrow': ['obviously-narrow', ...defaultTheme.fontFamily.sans],
      },
      typography: {
        DEFAULT: {
          css: {
            maxWidth: '100ch',
          }
        }
      }
    },
  },
  plugins: [
    require('@tailwindcss/typography'),
  ],
}
