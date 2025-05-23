import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],
    purge: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
      ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors:{
                "black" : "#060606"
            },
            fontSize:{
                "2xs" : "0.226rem"
            }
        },
    },

    plugins: [forms],
};

// /** @type {import('tailwindcss').Config} */
// export default {
//     content: [
//       "./resources/**/*.blade.php",
//       "./resources/**/*.js",
//       "./resources/**/*.vue",
//     ],
//     theme: {
//       extend: {},
//     },
//     plugins: [],
//   };


