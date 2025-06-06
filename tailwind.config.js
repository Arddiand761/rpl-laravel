// tailwind.config.js
import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                // Definisikan font kustommu di sini
                'instrument-sans': ['"Instrument Sans"', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                // Definisikan warna-warna kustommu
                primary: {
                    DEFAULT: '#FF6900', // Warna utama
                    dark: '#E65C00',    // Varian lebih gelap untuk hover
                },
                secondary: {
                    DEFAULT: '#CC5200',
                    dark: '#B34700',
                },
            },
        },
    },

    plugins: [forms],
};
