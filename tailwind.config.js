import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {

            colors: {
                primary: {
                    DEFAULT: '#d4a017',
                    light: '#facc15',
                    dark: '#a16207',
                },

                dark: {
                    DEFAULT: '#020617',
                    soft: '#0f172a',
                    card: '#111827',
                },

                silver: '#d1d5db',
            },

            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms],
};