module.exports = {
    content: [
      './resources/views/**/*.blade.php',
      './resources/js/**/*.vue',
      // other paths
    ],
    theme: {
      extend: {},
    },
    plugins: [
      require('@tailwindcss/forms'),
    ],
  }
  