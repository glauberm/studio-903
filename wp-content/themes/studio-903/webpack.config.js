const path = require('path');
const MiniCssExtractPlugin = require('mini-css-extract-plugin');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');

const isProduction = process.env.NODE_ENV === 'production';

module.exports = {
    mode: isProduction ? 'production' : 'development',
    devtool: isProduction ? false : 'source-map',
    entry: {
        main: './scripts/main.jsx',
        'page-initial-page': './page-initial-page.jsx',
        'page-studio-rental': './page-studio-rental.jsx',
        'page-locacao-de-estudio': './page-locacao-de-estudio.jsx',
    },
    output: {
        path: path.resolve(__dirname, 'dist'),
        filename: '[name].js',
    },
    plugins: [new MiniCssExtractPlugin({ filename: '[name].css' })],
    module: {
        rules: [
            {
                test: /\.jsx$/,
                exclude: /node_modules/,
                resolve: {
                    extensions: ['.js', '.jsx'],
                },
                use: {
                    loader: 'babel-loader',
                    options: {
                        presets: [['@babel/preset-env', { targets: 'defaults' }], '@babel/preset-react'],
                    },
                },
            },
            {
                test: /\.scss$/,
                use: [
                    MiniCssExtractPlugin.loader,
                    {
                        loader: 'css-loader',
                        options: {
                            modules: false,
                            sourceMap: !isProduction,
                        },
                    },
                    {
                        loader: 'postcss-loader',
                        options: {
                            sourceMap: !isProduction,
                            postcssOptions: {
                                plugins: [autoprefixer, cssnano],
                            },
                        },
                    },
                    {
                        loader: 'sass-loader',
                        options: { sourceMap: !isProduction },
                    },
                ],
            },
        ],
    },
};
