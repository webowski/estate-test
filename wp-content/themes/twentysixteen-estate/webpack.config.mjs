import path, { resolve }      from 'path'
import MiniCssExtractPlugin   from 'mini-css-extract-plugin'
import FileManagerPlugin      from 'filemanager-webpack-plugin'

let mode = 'development'
let target = 'web'

if (process.env.NODE_ENV === 'production') {
	mode = 'production'
	target = 'browserslist'
}

export default {
	mode: mode,
	target: target,

	entry: {
		styles: './styles/index.scss',
		bundle: {
			import: resolve('./scripts/index.js'),
			filename: './scripts/[name].min.js'
		}
	},

	output: {
		path: resolve(),
		// filename: '[name].min.js',
	},

	module: {
		rules: [

			// Styles
			{
				test: /\.(scss|css)$/i,
				use: [
					{
						loader: MiniCssExtractPlugin.loader,
						options: {
							publicPath: '../'
						}
					},
					'css-loader',
					{
						loader: 'postcss-loader',
						options: {
							postcssOptions: {
								plugins: [
									['postcss-preset-env']
								]
							}
						}
					},
					'sass-loader'
				]
			},

			// Scripts
			{
				test: /\.jsx?$/,
				exclude: /node_modules/,
				use: {
					loader: 'babel-loader',
					options: {
						presets: [
							'@babel/preset-env',
						],
						// cacheDirectory: true
					}
				}
			},

		]
	},

	plugins: [

		new MiniCssExtractPlugin({
			filename: 'style.css',
		}),

		new FileManagerPlugin({
			events: {
				onEnd: { delete: ['styles.js'] }
			},
		}),

	]

}
