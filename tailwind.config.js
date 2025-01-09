import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './node_modules/flowbite/**/*.js'
    ],
    theme: {
        extend: {
            fontFamily: {
                
            },
            colors: {
                transparent: "transparent",
                current: "currentColor",
                white: "#FFF",
                black: "#000",
                
                primary: {
                    50: "#F0FDFB",
                    100: "#CCFBF3",
                    200: "#9AF5E8",
                    300: "#5FE9DA",
                    400: "#2FD2C6",
                    500: "#16B6AD",
                    600: "#0E938E",
                    700: "#107572",
                    800: "#125D5C",
                    900: "#144D4C",
                    950: "#04292A",
                },
                secondary: {
                    50: "#EDFFFD",
                    100: "#C2FFFE",
                    200: "#86FFFD",
                    300: "#41FFFD",
                    400: "#0AF7F3",
                    500: "#00DAD9",
                    600: "#00ADB0",
                    700: "#00878B",
                    800: "#01696E",
                    900: "#07565A",
                    950: "#003338",
                },

            }
        },
    },
    plugins: [
        require('flowbite/plugin')
    ],
    darkMode: 'media',
};
