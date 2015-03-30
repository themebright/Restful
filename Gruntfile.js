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
      options: {
        compress: true
      },
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

    aws: grunt.file.readJSON( 'aws.json' ),

    s3: {
      release: {
        options: {
          accessKeyId: '<%= aws.accessKeyId %>',
          secretAccessKey: '<%= aws.secretAccessKey %>',
          bucket: 'themebright-downloads',
          overwrite: false
        },
        files: [ {
          src: [ '<%= pkg.name %>-<%= pkg.version %>.zip' ]
        } ]
      }
    },

    clean: {
      release: [ '<%= pkg.name %>/', '<%= pkg.name %>-<%= pkg.version %>.zip' ]
    }

  } );

  grunt.registerTask( 'default', [ 'watch' ] );
  grunt.registerTask( 'build',   [ 'less:build', 'autoprefixer:build' ] );
  grunt.registerTask( 'release', [ 'copy:release', 'compress:release', 's3:release', 'clean:release' ] );

};
