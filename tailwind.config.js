/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./resources/**/*.blade.php"],
  theme: {
    extend: {
        colors: {
            "primary": "#CFE3BE",
            "secondary": "#EEF3DC",
            "green": "#498B5F",
            "dark-green": "#025A28"
        },
        backgroundImage: {
            'bg1': "url(/images/bg1.png)"
        }
    },
  },
  plugins: [],
}

