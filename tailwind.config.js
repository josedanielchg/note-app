module.exports = (isProd) => ({
  purge: {
    enabled: isProd,
    content: [
       "./app/**/*.php",
       "./resources/**/*.html",
       "./resources/**/*.php",
     ],
     options: {
            defaultExtractor: (content) =>
                content.match(/[\w-/.:]+(?<!:)/g) || [],
            whitelistPatterns: [/-active$/, /-enter$/, /-leave-to$/, /show$/],
        },
  },
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {},
  },
  variants: {
    extend: {},
  },
  plugins: [],
 })