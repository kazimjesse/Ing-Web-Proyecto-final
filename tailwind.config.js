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
                sans: ['Inter', 'system-ui', ...defaultTheme.fontFamily.sans],
                serif: ['Merriweather', 'Georgia', ...defaultTheme.fontFamily.serif],
            },
            colors: {
                'university': {
                    50: '#fdf2f4',
                    100: '#fce7eb',
                    200: '#f9d0da',
                    300: '#f4a8ba',
                    400: '#ec7694',
                    500: '#df4871',
                    600: '#cb2d5b',
                    700: '#A41034', // Harvard Crimson
                    800: '#8f1844',
                    900: '#7a1840',
                },
                'accent': {
                    50: '#fefce8',
                    100: '#fef9c3',
                    200: '#fef08a',
                    300: '#fde047',
                    400: '#facc15',
                    500: '#B8860B', // Dark Goldenrod
                    600: '#a67c0a',
                    700: '#896509',
                    800: '#6d5007',
                    900: '#584006',
                },
                'slate': {
                    850: '#1a202e',
                    950: '#0f1419',
                }
            },
        },
    },

    plugins: [forms],
};