const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    theme: {
        extend: {
            fontFamily: {
                sans: ['sky','sky-bold', ...defaultTheme.fontFamily.sans],
            },
        },
    },
    variants: {
        opacity: ['responsive', 'hover', 'group-hover'],
        borderRadius: ['responsive', 'first', 'last'],
        margin: ['responsive', 'first', 'last'],
        backgroundColor: ['responsive', 'hover', 'focus', 'group-hover'],
        display: ['responsive', 'hover', 'group-hover'],
        opacity: ['responsive', 'hover', 'focus', 'disabled'],
    },
    purge: {
        content: [
            './app/**/*.php',
            './resources/**/*.html',
            './resources/**/*.js',
            './resources/**/*.jsx',
            './resources/**/*.ts',
            './resources/**/*.tsx',
            './resources/**/*.php',
            './resources/**/*.vue',
            './resources/**/*.twig',
            './webapp/**/*.vue',
        ],
        options: {
            defaultExtractor: (content) => content.match(/[\w-/.:]+(?<!:)/g) || [],
            whitelistPatterns: [/-active$/, /-enter$/, /-leave-to$/, /show$/],
        },
    },
    plugins: [
        require('@tailwindcss/custom-forms'),
        require('@tailwindcss/ui'),
        require('tailwindcss-rtl'),
    ],
};
