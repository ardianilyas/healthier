import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        'node_modules/preline/dist/*.js',
    ],
    theme: {
        container: {
            padding: {
              DEFAULT: '1rem',
              sm: '2rem',
              lg: '3rem',
            //   xl: '5rem',
              '2xl': '6rem',
            },
        },
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    plugins: [
        require('preline/plugin'),
        require('@tailwindcss/forms'),
    ],
};
