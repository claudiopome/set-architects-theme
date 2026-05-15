// General
const gulp = require('gulp');
const browsersync = require('browser-sync').create();
const gnf = require('gulp-npm-files');
const replace = require('gulp-replace');

// SCSS / PostCSS / CSS
const postcss = require('gulp-postcss');
const sass = require('gulp-dart-sass');
const pxtorem = require('postcss-pxtorem');
const autoprefixer = require('autoprefixer');
const cssnano = require('cssnano');

// JS
const plumber = require("gulp-plumber");
const jsconcat = require('gulp-concat');
const uglify = require('gulp-uglify-es').default;
const eslint = require("gulp-eslint");

/* BrowserSync */

function bs(done) {
    browsersync.init({
        proxy: 'http://www.davidegiorgetta.com/nemesis',
        port: 3000
    });
    done();
}

/* BrowserSync Reload */

function bs_reload(done) {
    browsersync.reload();
    done();
}

/* Packages */

function pkg() {
    return gulp.src(gnf(), {base:'./'})
    .pipe(gulp.dest('./assets/build/'));
}

exports.pkg = pkg;

/* Cache CSS */

function css_cache(done) {
    return gulp.series(
        css, 
        done => {
            css_cache_break("./header.php", "./");
            done();
        }
    )(done);
}

const css_src = './assets/src/sass/**/*.scss';
const css_dest = 'assets/build/css/';

function css_cache_break(css_src, css_dest) {
    var css_cache_string = new Date().getTime();
    return gulp.src(css_src)
        .pipe(replace(/cache_bust=\d+/g, function() {
            return "cache_bust=" + css_cache_string;
        }))
        .pipe(gulp.dest(css_dest)
    );
}

/* Cache JS */

function js_cache(done) {
    return gulp.series(
        js,
        done => {
            js_cache_break("./footer.php", "./");
            done();
        }
    )(done);
}

const js_src = 'assets/src/js/*.js';
const js_dest = 'assets/build/js/';

function js_cache_break(js_src, js_dest) {
    var js_cache_string = new Date().getTime();
    return gulp.src(js_src)
        .pipe(replace(/cache_bust=\d+/g, function() {
            return "cache_bust=" + js_cache_string;
        }))
        .pipe(gulp.dest(js_dest)
    );
}

/* SCSS / CSS */

function css() {
    var plugins = [
        autoprefixer(),
        pxtorem({
            rootValue: 16,
            unitPrecision: 5,
            propList: ['font', 'font-size', 'line-height', 'letter-spacing', 'margin-top', 'margin-bottom', 'margin-left', 'margin-right', 'margin', 'padding-top', 'padding-bottom', 'padding-left', 'padding-right', 'padding'],
            replace: false
        }),
        cssnano({
            preset: ['default', {
                discardComments: {
                    removeAll: true,
                },
            }]
        })
    ];
    return gulp.src('./assets/src/sass/**/*.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(postcss(plugins)) 
    .pipe(gulp.dest('assets/build/css/'))
    .pipe(browsersync.stream());
}

exports.css = css;

/* JS */

function js() {
    return gulp.src('assets/src/js/*.js')
    .pipe(jsconcat('app.js'))
    .pipe(uglify())
    .pipe(gulp.dest('assets/build/js/'));
}

exports.js = js;

/* JS Linting */

function js_lint() {
  return gulp
    .src(['./assets/src/js/**/*"', './gulpfile.js'])
    .pipe(plumber())
    // .pipe(jshint())
    // .pipe(jshint.reporter('fail'))
    .pipe(eslint())
    .pipe(eslint.format())
    .pipe(eslint.failAfterError());
}

exports.js_lint = js_lint;

/* Watch */

function watch_files(){
    gulp.watch('./**/*.php', bs_reload);
    gulp.watch('assets/src/sass/**/*.scss', css);
    gulp.watch('assets/src/js/*.js', js);
    gulp.watch('assets/src/sass/**/*.scss', bs_reload);
    gulp.watch('assets/src/js/*.js', bs_reload);
    // gulp.watch('assets/src/sass/**/*.scss', css_cache);
    // gulp.watch('assets/src/js/*.js', js_cache);
}

const watch = gulp.parallel(watch_files, bs);

/* DEV */

exports.dev = watch;


