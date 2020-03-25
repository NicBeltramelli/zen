const pkg = require('./package.json');
const StylelintPlugin = require('stylelint-webpack-plugin');

module.exports = {
	// Project Identity
	appName: 'zen', // Unique name of your project
	type: 'theme', // Plugin or theme
	slug: 'zen', // Plugin or Theme slug, basically the directory name under `wp-content/<themes|plugins>`
	// Used to generate banners on top of compiled stuff
	bannerConfig: {
		name: 'zen',
		author: 'Nic Beltramelli',
		license: 'GPL-2.0-or-later',
		link: 'https://github.com/NicBeltramelli/zen',
		version: pkg.version,
		copyrightText:
			'This software is released under the GPL-2.0-or-later License\nhttps://spdx.org/licenses/GPL-2.0-or-later.html',
		credit: true,
	},
	// Files we need to compile, and where to put
	files: [
		// If this has length === 1, then single compiler
		{
			name: 'theme',
			entry: {
				main: ['./src/scripts/main.js'],
				blocks: ['./src/scripts/blocks.js'],
				floatingHeader: ['./src/scripts/floating-header.js'],
				blocksanimation: ['./src/scripts/blocksanimation.js'],
			},
			// Extra webpack config to be passed directly
			webpackConfig: {
				module: {
					rules: [
						{
							enforce: 'pre',
							test: /\.js$/,
							exclude: /node_modules/,
							loader: 'eslint-loader',
						},
					],
				},
				plugins: [
					new StylelintPlugin(),
				],
			},
		},
		// If has more length, then multi-compiler
		{
			name: 'woocommerce',
			entry: {
				main: ['./src/scripts/woocommerce.js'],
				notice: ['./src/scripts/woocommerce-notice-update.js'],
			},
		},
	],
	// Output path relative to the context directory
	// We need relative path here, else, we can not map to publicPath
	outputPath: 'dist',
	// Project specific config
	// Needs react(jsx)?
	hasReact: true,
	// Needs sass?
	hasSass: true,
	// Needs less?
	hasLess: false,
	// Needs flowtype?
	hasFlow: false,
	// Externals
	// <https://webpack.js.org/configuration/externals/>
	externals: {
		jquery: 'jQuery',
	},
	// Webpack Aliases
	// <https://webpack.js.org/configuration/resolve/#resolve-alias>
	alias: undefined,
	// Show overlay on development
	errorOverlay: true,
	// Auto optimization by webpack
	// Split all common chunks with default config
	// <https://webpack.js.org/plugins/split-chunks-plugin/#optimization-splitchunks>
	// Won't hurt because we use PHP to automate loading
	optimizeSplitChunks: true,
	// Usually PHP and other files to watch and reload when changed
	watch: './lib/**/*.php',
	// Files that you want to copy to your ultimate theme/plugin package
	// Supports glob matching from minimatch
	// @link <https://github.com/isaacs/minimatch#usage>
	packageFiles: [
		'config/**',
		'languages/**',
		'lib/**',
		'page-templates/**',
		'woocommerce/**',
		'dist/**/*.js',
		'dist/**/*.css',
		'dist/**/*.json',
		'vendor/composer/**',
		'vendor/wpackio/**',
		'vendor/autoload.php',
		'*.php',
		'*.png',
		'*.md',
		'*.css',
	],
	// Path to package directory, relative to the root
	packageDirPath: 'package',
};
