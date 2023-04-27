module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],
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
    plugins: [
        require('flowbite/plugin')
    ],
}
