module.exports = function (grunt) {

	grunt.initConfig({
		sass: {
			dist: {
				options: {
					style: 'expanded',
					sourcemap: 'none'
				},
				files: {
					'css/style.css': 'scss/style.scss'
				}
			}
		},
		postcss: {
			options: {
				processors: [
					require('autoprefixer')(),
					require('postcss-combine-duplicated-selectors')(),
					require('cssnano')(),
				]
			},
			dist: {
				src: 'css/*.css'
			}
		},
		uglify: {
			dist: {
				files: {
					'js/script.min.js': ['js/script.js']
				}
			}
		},
		watch: {
			js: {
				files: [
					'js/*.js',
				],
				tasks: ['uglify']
			},
			css: {
				files: ['scss/**/*.scss'],
				tasks: ['sass', 'postcss']
			},
		}
	});

	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-postcss');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-watch');

	grunt.registerTask('css', ['sass', 'postcss']);
	grunt.registerTask('js', ['uglify']);
	grunt.registerTask('build', ['css', 'js']);
	grunt.registerTask('default', ['build']);
}
