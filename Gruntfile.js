module.exports = function (grunt) {
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
        sass: {
            dist: {
                options: {
                    style: 'expanded'
                },
                files: {
                    '<%= pkg.bs.assets.css %>/extra.css': '<%= pkg.bs.assets.sass %>/app.scss'
                }
            },
            production: {
                options: {
                    style: 'compressed'
                },
                files: {
                    '<%= pkg.bs.assets.css %>/extra.min.css': '<%= pkg.bs.assets.sass %>/app.scss'
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
            },
            production: {
                src: 'ss/style.css',
                dest: 'assets/css/style.min.css'
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
                    'js/<%= pkg.name %>.<%= grunt.template.today("yyyy-mm-dd") %>.min.js': ['<%= concat.js.dest %>'],
                    'assets/js/<%= pkg.name %>.min.js': ['<%= concat.js.dest %>']
                }
            }
        },
        ftpush: {
            build: {
                auth: {
                    host: 'bs.durlanvega.com',
                    port: 21,
                    authKey: 'bikestock'
                },
                src: '.',
                dest: '/wp-content/',
                exclusions: ['node_modules', '**/.DS_Store', '.git', '.grunt', '.sass-cache'
                ],
                simple: true
            }
        },
        //watch: {
        //    options: {
        //        livereload: true
        //    },
        //    less: {
        //        files: ['ss/less/*.less', 'ss/*.less'],
        //        tasks: ['less:dist']
        //    },
        //    css: {
        //        files: ['ss/*.css'],
        //        tasks: ['concat:css', 'cssmin:minify', 'cssmin:production']
        //    },
        //    js: {
        //        files: ['js/init.js', 'js/lib/*.js'],
        //        tasks: ['concat:js']//, 'ftp_push']
        //    },
        //    uglify: {
        //        files: ['js/<%= pkg.name %>.js'],
        //        tasks: ['uglify:dist']
        //    },
        //    gruntfile: {
        //        files: 'Gruntfile.js',
        //        tasks: ['less:dist', 'concat:js', 'concat:css', 'cssmin:minify', 'uglify:dist', 'ftp_push',]
        //    }
        //}
        watch: {
            sass: {
                files: ['<%= pkg.bs.assets.sass %>/**/*.scss'],
                tasks: ['sass']
            },
            php: {
                files: ['**/*.js', '**/*.php', '**/*.css', '**/*.scss'],
                tasks: ['ftpush']
            }
        }
    });

    /*grunt.registerTask('build', [
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
        'cssmin:production',
        'uglify:dist',
        //'ftp_push',
        'watch'
    ]);*/

    grunt.registerTask('devel', [
        'sass:dist',
        'ftpush',
        'watch'
    ]);

    grunt.registerTask('default', 'devel');
};
