// const proxy = {
// 	'/': {
// 		target: 'http://laravel-super.loc:8888',
// 		secure: false,
// 		changeOrigin: true
// 	}
// };

// module.exports = {
//   transpileDependencies: [
//     'vuetify'
//   ],
// 	filenameHashing: false,
// 	productionSourceMap: false,
// 	configureWebpack: config => {
// 		return {
// 			devServer: { 
// 				proxy,
// 				//https: true
// 			}
			
// 		}
// 	}
// }


module.exports = {
  transpileDependencies: [
    'vuetify'
  ],
  devServer: {
      proxy: 'http://laravel-super.loc:8888/',
      // proxy: 'http://laravel-super.loc/',
      disableHostCheck: true
    }
}

