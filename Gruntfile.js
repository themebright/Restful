module.exports = function( grunt ) {

  require( 'load-grunt-tasks' )( grunt );

  grunt.initConfig( {

    pkg: grunt.file.readJSON( 'package.json' ),

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
    }

  } );

  grunt.registerTask( 'default', [ 'watch' ] );
  grunt.registerTask( 'build',   [ 'less:build', 'autoprefixer:build' ] );

};
