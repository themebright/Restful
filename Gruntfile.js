module.exports = function( grunt ) {

  require( 'jit-grunt' )( grunt );

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
        tasks: [ 'less', 'autoprefixer', 'cssmin' ]
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
        dest: 'assets/css'
      }
    },

    cssmin: {
      build: {
        expand: true,
        cwd: 'assets/css/',
        src: '*.css',
        dest: 'assets/css/'
      }
    }

  } );

  grunt.registerTask( 'default', [ 'watch' ] );

};
