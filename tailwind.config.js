import colors from 'tailwindcss/colors' 
import daisyUI from 'daisyui'

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

            },
        },
    },


    

    plugins: [
        daisyUI
    ],
    daisyui: {
        theme: false
    }
};
