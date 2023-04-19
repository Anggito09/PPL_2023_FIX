/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            dropShadow: {
                'body': '8px 2px 3px rgba(0,0,0,0.15)'
            },
            colors: {
                'primary': '#498C63',
                'secondary': '#B0D392',
                'white': '#EFF6E9'
            },
            fontFamily: {
                'poppins': ['Poppins']
            },
        },
    },
    plugins: [],
}

