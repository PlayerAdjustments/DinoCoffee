/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {
            colors: {

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
            },
            animation: {
                slide_in: "slide_in 0.5s ease-out foward",
            },
            keyframes: {
                slide_in: {
                    "0%": { transform: "translateX(100%)", opacity: 0 },
                    "100%": { transform: "translateX(0)", opacity: 1 },
                },
            },
        },
        fontFamily: {
            body: [
                "Inter",
                "ui-sans-serif",
                "system-ui",
                "-apple-system",
                "system-ui",
                "Segoe UI",
                "Roboto",
                "Helvetica Neue",
                "Arial",
                "Noto Sans",
                "sans-serif",
                "Apple Color Emoji",
                "Segoe UI Emoji",
                "Segoe UI Symbol",
                "Noto Color Emoji",
            ],
            sans: [
                "Inter",
                "ui-sans-serif",
                "system-ui",
                "-apple-system",
                "system-ui",
                "Segoe UI",
                "Roboto",
                "Helvetica Neue",
                "Arial",
                "Noto Sans",
                "sans-serif",
                "Apple Color Emoji",
                "Segoe UI Emoji",
                "Segoe UI Symbol",
                "Noto Color Emoji",
            ],
        },
    },
    plugins: [
        require("flowbite/plugin")({
            charts: true,
        }),
        require('tailwind-scrollbar')({ nocompatible: true, preferredStrategy: 'pseudoelements' }),
    ],
    safelist: [
        "animate-slide_in",
        {
            pattern:
                /bg-(purple|teal|blue|red|amber|yellow|lime|violet|rose|green|fuchsia|sky|pink|emerald|cyan|orange|indigo|slate|gray)-(50|100|200|300|400|500|600|700|800|900|950)/,
            variants: ["dark"],
        },
        {
            pattern:
                /text-(purple|teal|blue|red|amber|yellow|lime|violet|rose|green|fuchsia|sky|pink|emerald|cyan|orange|indigo|slate|gray)-(100|200|300|400|500|600|700|800|900|950)/,
            variants: ["dark"],
        },
    ],
};
