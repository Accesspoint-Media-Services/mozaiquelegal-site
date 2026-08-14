const theme = require('./theme.json');
const apwp = require("@jeffreyvr/tailwindcss-tailpress");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './*.php',
        './**/*.php',
        './src/css/*.css',
        './src/js/*.js',
        './safelist.txt'
    ],
    theme: {
        container: {
            center: true,
            padding: {
                DEFAULT: '1rem',
                sm: '2rem',
                lg: '3rem',
                xl: '4rem',
            },
        },
        extend: {
            colors: apwp.colorMapper(apwp.theme('settings.color.palette', theme)),
            fontSize: apwp.fontSizeMapper(apwp.theme('settings.typography.fontSizes', theme)),  
            textColor: {
                DEFAULT: '#130668',  
            },
        },
        screens: {
            'xs': '480px',
            'sm': '600px',
            'md': '782px',
            'lg': apwp.theme('settings.layout.contentSize', theme), // 960px
            'xl': apwp.theme('settings.layout.wideSize', theme),    // 1280px
            '2xl': '1440px' 
        }
    },
    plugins: [
        apwp.tailwind
    ]
};
