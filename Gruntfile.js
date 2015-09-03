module.exports = function( grunt ) {

  require( 'load-grunt-tasks' )( grunt );

  grunt.initConfig( {

    pkg: grunt.file.readJSON( 'package.json' ),

    // DEVELOPMENT-RELATED TASKS

    watch: {
      options: {
        livereload: true
      },
      php: {
        files: [ '*.php' ],
      },
      less: {
        files: [ 'assets/less/**/*.less' ],
        tasks: [ 'less', 'autoprefixer' ]
      }
    },

    less: {
      build: {
        files: {
          'assets/css/restful-light.css': 'assets/less/restful-light.less',
          'assets/css/restful-dark.css': 'assets/less/restful-dark.less',
        }
      }
    },

    autoprefixer: {
      build: {
        expand: true,
        cwd: 'assets/css/',
        src: '*.css',
        dest: 'assets/css/'
      }
    },

    makepot: {
      build: {
        options: {
          domainPath: 'languages/',
          type: 'wp-theme'
        }
      }
    },


    // RELEASE-RELATED TASKS

    copy: {
      release: {
        files: [ {
          expand: true,
          src: [ '**', '!**/node_modules/**' ],
          dest: '<%= pkg.name %>/'
        } ]
      }
    },

    compress: {
      release: {
        options: {
          archive: '<%= pkg.name %>-<%= pkg.version %>.zip'
        },
        expand: true,
        src: [ '<%= pkg.name %>/**' ],
        dest: '/'
      }
    },

    shell: {
      release: {
        command: 'mv <%= pkg.name %>-<%= pkg.version %>.zip ~/Desktop/'
      }
    },

    clean: {
      release: [ '<%= pkg.name %>/', '<%= pkg.name %>-<%= pkg.version %>.zip' ]
    }

  } );

  grunt.registerTask( 'default', [ 'watch' ] );
  grunt.registerTask( 'build',   [ 'less:build', 'autoprefixer:build', 'makepot:build' ] );
  grunt.registerTask( 'release', [ 'copy:release', 'compress:release', 'shell:release', 'clean:release' ] );

};
