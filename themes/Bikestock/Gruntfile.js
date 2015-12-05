module.exports = function(grunt) {
	require('matchdep').filterDev('grunt-*').forEach(grunt.loadNpmTasks);

	grunt.initConfig({
		pkg: grunt.file.readJSON('package.json'),
		banner: '/*\n<%= pkg.name %> - v<%= pkg.version %> - ' + '<%= grunt.template.today("yyyy-mm-dd") %>\n<%= pkg.description %>\nLovingly coded by <%= pkg.author.name %>  - <%= pkg.author.url %> \n*/\n',
		less: {
			dist: {
				options: {
					paths: ['ss/less']
				},
				files: {
					'ss/main.css': 'ss/main.less'
				}
			}
		},
		cssmin: {
			combine: {
				options: {
					banner: '/*\nTheme Name: <%= pkg.name %>\nTheme URI: http://www.<%= pkg.name %>.com\nDescription: \nAuthor: Barrel\nAuthor URI: http://barrelny.com/\nVersion: 1.0\nTags: responsive\n*/\n',
				},
				files: {
					'style.css': ['ss/reset.css', 'ss/bootstrap.min.css', 'ss/main.css']
				}
			},
			minify: {
				src: 'ss/style.css',
				dest: 'ss/style.<%= grunt.template.today("yyyy-mm-dd") %>.min.css'
			}
		},
		concat: {
			options: {
				separator: '',
				stripBanners: {
					block: true,
					line: true
				},
				banner: '<%= banner %>'
			},
			js: {
				src: ['bower_components/jquery.stellar/jquery.stellar.min.js',
				'js/jquery.flexslider.js',
				 'js/jquery.scrollTo.min.js',
				  'js/jquery.backstretch.min.js', 
				  'js/instafeed.min.js', 
				  'js/init.js'],
				dest: 'js/<%= pkg.name %>.js'
			},
			css: {
				src: ['ss/normalize.css', 'ss/reset.css', 'ss/bootstrap.min.css', 'ss/webfonts/ss-social.css', 'ss/main.css'],
				dest: 'ss/style.css'
			}
		},
		uglify: {
			options: {
				banner: '<%= banner %>'
			},
			dist: {
				files: {
					'js/<%= pkg.name %>.<%= grunt.template.today("yyyy-mm-dd") %>.min.js': ['<%= concat.js.dest %>']
				}
			}
		},
		watch: {
			options: {
				livereload: true
			},
			less: {
				files: ['ss/less/*.less','ss/*.less'],
				tasks: ['less:dist']
			},
			cssmin: {
				files: ['ss/*.css'],
				tasks: ['cssmin']
			},
			concat: {
				files: ['js/init.js', 'js/lib/*.js', 'css/*.css'],
				tasks: ['concat:js', 'concat:css']
			},
			uglify: {
				files: ['js/<%= pkg.name %>.js'],
				tasks: ['uglify:dist']
			},
			php: {
				files: '**/*.php'
			}
		}
	});

	grunt.registerTask('build', [
		'less:dist',
		'cssmin',
		'concat:js',
		'uglify:dist',
		'watch'
	]);
        
        grunt.registerTask('build_js', [
                'concat:js',
                'uglify:dist'
        ]);
        
        grunt.registerTask('build_css', [
		'concat:css',
		'cssmin:minify'
        ]);

	grunt.registerTask('server', [
		'less:dist',
		'concat:js',
		'concat:css',
		'cssmin:minify',
		'uglify:dist',
		'watch'
	]);

	grunt.registerTask('default', 'build');
};
