module.exports = function( grunt ) {

  require( 'jit-grunt' )( grunt );

  grunt.initConfig( {

    pkg: grunt.file.readJSON( 'package.json' ),

    watch: {
      php: {
        files: [ '*.php' ],
        options: {
          livereload: true
        }
      },
      less: {
        files: [ 'assets/less/**/*.less' ],
        tasks: [ 'less' ]
      },
      css: {
        files: [ 'assets/css/restful.css' ],
        tasks: [ 'autoprefixer' ],
        options: {
          livereload: true
        }
      }
    },

    less: {
      build: {
        // options: {
        //   'compress': true
        // },
        files: {
          'assets/css/restful-light.css': 'assets/less/restful-light.less',
          'assets/css/restful-dark.css': 'assets/less/restful-dark.less',
        }
      }
    },

    autoprefixer: {
      build: {
        expand: true,
        flatten: true,
        src: 'assets/css/*.css',
        dest: 'assets/css/'
      }
    }

  } );

  grunt.registerTask( 'default', [ 'watch' ] );

};