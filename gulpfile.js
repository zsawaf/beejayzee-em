/**
 *
 * Gulpfile setup
 *
 * @since 1.0.0
 * @authors Ahmad Awais, @digisavvy, @desaiuditd, @jb510, @dmassiani and @Maxlopez
 * @package neat
 */


// Project configuration
var project 		= 'neat', // Project name, used for build zip.
	url 		= 'neat.dev', // Local Development URL for BrowserSync. Change as-needed.
	bower 		= './assets/bower_components/'; // Not truly using this yet, more or less playing right now. TO-DO Place in Dev branch
	build 		= './buildtheme/', // Files that you want to package into a zip go here
	buildInclude 	= [
				// include common file types
				'**/*.php',
				'**/*.html',
				'**/*.css',
				'**/*.js',
				'**/*.svg',
				'**/*.ttf',
				'**/*.otf',
				'**/*.eot',
				'**/*.woff',
				'**/*.woff2',

				// include specific files and folders
				'screenshot.png',

				// exclude files and folders
				'!node_modules/**/*',
				'!assets/bower_components/**/*',
				'!style.css.map',
				'!assets/js/custom/*',
				'!assets/css/partials/*'

			];

// Load plugins
	var async 		 = require('async'),
		gulp     	 = require('gulp'),
		babel		 = require('gulp-babel'),
		browserSync  = require('browser-sync'), // Asynchronous browser loading on .scss file changes
		reload       = browserSync.reload,
		autoprefixer = require('gulp-autoprefixer'), // Autoprefixing magic
		minifycss    = require('gulp-uglifycss'),
		filter       = require('gulp-filter'),
		uglify       = require('gulp-uglify'),
		imagemin     = require('gulp-imagemin'),
		newer        = require('gulp-newer'),
		rename       = require('gulp-rename'),
		concat       = require('gulp-concat'),
		notify       = require('gulp-notify'),
		runSequence  = require('gulp-run-sequence'),
		sass         = require('gulp-sass'),
		plugins      = require('gulp-load-plugins')({ camelize: true }),
		ignore       = require('gulp-ignore'), // Helps with ignoring files and directories in our run tasks
		rimraf       = require('gulp-rimraf'), // Helps with removing files and directories in our run tasks
		zip          = require('gulp-zip'), // Using to zip up our packaged theme into a tasty zip file that can be installed in WordPress!
		plumber      = require('gulp-plumber'), // Helps prevent stream crashing on errors
		cache        = require('gulp-cache'),
		sourcemaps   = require('gulp-sourcemaps'),
		modernizr 	 = require('gulp-modernizr'),
		iconfont 	 = require('gulp-iconfont'),
		runTimestamp = Math.round(Date.now()/1000);


/**
 * Browser Sync
 *
 * Asynchronous browser syncing of assets across multiple devices!! Watches for changes to js, image and php files
 * Although, I think this is redundant, since we have a watch task that does this already.
*/
gulp.task('browser-sync', function() {
	var files = [
					'**/*.php',
					'**/*.{png,jpg,gif}'
				];
	browserSync.init(files, {

		// Read here http://www.browsersync.io/docs/options/
		proxy: url,

		// port: 8080,

		// Tunnel the Browsersync server through a random Public URL
		// tunnel: true,

		// Attempt to use the URL "http://my-private-site.localtunnel.me"
		// tunnel: "ppress",

		// Inject CSS changes
		injectChanges: true

	});
});

/**
 * Icon Font
 *	
 * Convert svg icons to a font family. 	
*/
gulp.task('Iconfont', function(done){
  var iconStream = gulp.src(['./assets/icons/*.svg'])
    .pipe(iconfont({ fontName: 'icons' }));

  async.parallel([
    function handleGlyphs (cb) {
      iconStream.on('glyphs', function(glyphs, options) {
        gulp.src('templates/myfont.css')
          .pipe(consolidate('icons', {
            glyphs: glyphs,
            fontName: 'icons',
            fontPath: '../fonts/',
            className: 's'
          }))
          .pipe(gulp.dest('www/css/'))
          .on('finish', cb);
      });
    },
    function handleFonts (cb) {
      iconStream
        .pipe(gulp.dest('./assets/fonts/'))
        .on('finish', cb);
    }
  ], done);
});

/**
 * Modernizr
 *
 * A Gulp wrapper for modernizr
*/
gulp.task('modernizr', function() {
  gulp.src('./js/*.js')
    .pipe(modernizr())
    .pipe(gulp.dest("build/"))
});

/**
 * Styles
 *
 * Looking at src/sass and compiling the files into Expanded format, Autoprefixing and sending the files to the build folder
 *
 * Sass output styles: https://web-design-weekly.com/2014/06/15/different-sass-output-styles/
*/
gulp.task('styles', function () {
	 	gulp.src('./assets/css/*.scss')
				.pipe(plumber())
				.pipe(sourcemaps.init())
				.pipe(sass({
					errLogToConsole: true,

					//outputStyle: 'compressed',
					outputStyle: 'compact',
					// outputStyle: 'nested',
					// outputStyle: 'expanded',
					precision: 10
				}))
				.pipe(sourcemaps.write({includeContent: false}))
				.pipe(sourcemaps.init({loadMaps: true}))
				.pipe(autoprefixer({ browsers: ['last 2 versions', '> 1%', 'iOS 7', 'ie 9', 'ie 10', 'ie 11'], cascade: false, flexbox: true }))
				.pipe(sourcemaps.write('.'))
				.pipe(plumber.stop())
				.pipe(gulp.dest('./'))
				.pipe(filter('**/*.css')) // Filtering stream to only css files
				.pipe(reload({stream:true})) // Inject Styles when style file is created
				.pipe(rename({ suffix: '.min' }))
				.pipe(minifycss({
					maxLineLen: 80
				}))
				.pipe(gulp.dest('./'))
				.pipe(reload({stream:true})) // Inject Styles when min style file is created
				.pipe(notify({ message: 'Styles task complete', onLast: true }))
});


/**
 * Scripts: Vendors
 *
 * Look at src/js and concatenate those files, send them to assets/js where we then minimize the concatenated file.
*/
gulp.task('vendorsJs', function() {
	return 	gulp.src([
				'./assets/js/vendor/bootstrap.js',
				//'./assets/js/vendor/jquery.matchHeight.js',
				//'./assets/js/vendor/flexibility.js',
				//'./assets/js/vendor/jquery.fancybox.js'
				/**
				 * Uncomment the following to use in your project
				 */
				//'./assets/js/vendor/slider.min.js',
				//'./assets/js/vendor/animsition.min.js',
			])
				.pipe(concat('bjzm-vendors.js'))
				.pipe(gulp.dest('./assets/js'))
				.pipe(rename( {
					basename: "bjzm-vendors",
					suffix: '.min'
				}))
				.pipe(uglify())
				.pipe(gulp.dest('./assets/js/'))
				.pipe(notify({ message: 'Vendor scripts task complete', onLast: true }));
});


/**
 * Scripts: Custom
 *
 * Look at src/js and concatenate those files, send them to assets/js where we then minimize the concatenated file.
*/
gulp.task('scriptsJs', function() {
	return 	gulp.src([	// manually add all scripts in here so as to be able to control the order
				'./assets/js/custom/single-page-updown.js', 
				'./assets/js/custom/scripts.js',
			])
				.pipe(concat('custom.js'))
				.pipe(babel({ presets: ['es2015'] }))
				.pipe(gulp.dest('./assets/js'))
				.pipe(rename( {
					basename: "custom",
					suffix: '.min'
				}))
				.pipe(uglify())
				.pipe(gulp.dest('./assets/js/'))
				.pipe(notify({ message: 'Custom scripts task complete', onLast: true }));
});


/**
 * Images
 *
 * Look at src/images, optimize the images and send them to the appropriate place
*/
gulp.task('images', function() {

// Add the newer pipe to pass through newer images only
	return 	gulp.src(['./assets/img/raw/**/*.{png,jpg,gif}'])
				.pipe(newer('./assets/img/'))
				.pipe(rimraf({ force: true }))
				.pipe(imagemin({ optimizationLevel: 7, progressive: true, interlaced: true }))
				.pipe(gulp.dest('./assets/img/'))
				.pipe( notify( { message: 'Images task complete', onLast: true } ) );
});


/**
 * Clean gulp cache
 */
 gulp.task('clear', function () {
   cache.clearAll();
 });


 /**
  * Clean tasks for zip
  *
  * Being a little overzealous, but we're cleaning out the build folder, codekit-cache directory and annoying DS_Store files and Also
  * clearing out unoptimized image files in zip as those will have been moved and optimized
 */

 gulp.task('cleanup', function() {
 	return 	gulp.src(['./assets/bower_components', '**/.sass-cache','**/.DS_Store'], { read: false }) // much faster
		 		.pipe(ignore('node_modules/**')) //Example of a directory to ignore
		 		.pipe(rimraf({ force: true }))
		 		// .pipe(notify({ message: 'Clean task complete', onLast: true }));
 });
 gulp.task('cleanupFinal', function() {
 	return 	gulp.src(['./assets/bower_components','**/.sass-cache','**/.DS_Store'], { read: false }) // much faster
		 		.pipe(ignore('node_modules/**')) //Example of a directory to ignore
		 		.pipe(rimraf({ force: true }))
		 		// .pipe(notify({ message: 'Clean task complete', onLast: true }));
 });

 /**
  * Build task that moves essential theme files for production-ready sites
  *
  * buildFiles copies all the files in buildInclude to build folder - check variable values at the top
  * buildImages copies all the images from img folder in assets while ignoring images inside raw folder if any
  */

  gulp.task('buildFiles', function() {
  	return 	gulp.src(buildInclude)
 		 		.pipe(gulp.dest(build))
 		 		.pipe(notify({ message: 'Copy from buildFiles complete', onLast: true }));
  });


/**
* Images
*
* Look at src/images, optimize the images and send them to the appropriate place
*/
gulp.task('buildImages', function() {
	return 	gulp.src(['assets/img/**/*', '!assets/images/raw/**'])
		 		.pipe(gulp.dest(build+'assets/img/'))
		 		.pipe(plugins.notify({ message: 'Images copied to buildTheme folder', onLast: true }));
});

 /**
  * Zipping build directory for distribution
  *
  * Taking the build folder, which has been cleaned, containing optimized files and zipping it up to send out as an installable theme
 */
 gulp.task('buildZip', function () {
 	// return 	gulp.src([build+'/**/', './.jshintrc','./.bowerrc','./.gitignore' ])
 	return 	gulp.src(build+'/**/')
		 		.pipe(zip(project+'.zip'))
		 		.pipe(gulp.dest('./'))
		 		.pipe(notify({ message: 'Zip task complete', onLast: true }));
 });


 // ==== TASKS ==== //
 /**
  * Gulp Default Task
  *
  * Compiles styles, fires-up browser sync, watches js and php files. Note browser sync task watches php files
  *
 */

 // Package Distributable Theme
 gulp.task('build', function(cb) {
 	runSequence('styles', 'cleanup', 'vendorsJs', 'scriptsJs',  'buildFiles', 'buildImages', 'buildZip','cleanupFinal', cb);
 });


 // Watch Task
 gulp.task('default', ['styles', 'vendorsJs', 'scriptsJs', 'images'], function () {
 	gulp.watch('./assets/js/**/*.js', ['scriptsJs']);
 	gulp.watch('./assets/css/**/*.scss', ['styles']);
 });
