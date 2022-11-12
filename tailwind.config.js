/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ["./resources/views/**/*.php", "./resources/css/**/*.css", "./resources/js/**/*.js"],

    theme: {
        screens: {
            sm: "540px",
            // => @media (min-width: 576px) { ... }

            md: "720px",
            // => @media (min-width: 768px) { ... }

            lg: "960px",
            // => @media (min-width: 992px) { ... }

            xl: "1140px",
            // => @media (min-width: 1200px) { ... }

            "2xl": "1320px",
            // => @media (min-width: 1400px) { ... }
        },
        container: {
            center: true,
            padding: "16px",
        },
        extend: {
            colors: {
                black: "#352b21",
                dark: "#332609",
                "dark-700": "#3a2a0a",
                primary: "#F49B38",
                secondary: "#793BF2",
                "body-color": "#7F7462",
                warning: "#26F93A",
            },
            boxShadow: {
                input: "0px 7px 20px rgba(198, 140, 8, 0.03)",
                pricing: "0px 39px 23px -27px rgba(198, 140, 8, 0.04)",
                "switch-1": "0px 0px 5px rgba(198, 140, 8, 0.15)",
                testimonial: "0px 60px 120px -20px #FCF3EB",
            },
        },
    },
    variants: {
        extend: {},
    },
    plugins: [],
};
