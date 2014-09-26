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
          'assets/css/restful.css': 'assets/less/restful.less',
        }
      }
    },

    autoprefixer: {
      build: {
        src: 'assets/css/restful.css',
        dest: 'assets/css/restful-prefixed.css'
      }
    }

  } );

  grunt.registerTask( 'default', [ 'watch' ] );

};