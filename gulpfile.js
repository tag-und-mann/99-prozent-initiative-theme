let gulp = require('gulp');
let autoprefixer = require('gulp-autoprefixer');
let browserSync = require('browser-sync').create();
let concat = require('gulp-concat');
let sass = require('gulp-sass');
let autoprefixBrowsers = ['> 1%', 'last 2 versions', 'firefox >= 4', 'safari 7', 'safari 8', 'IE 11'];
let csso = require('gulp-csso');
let sourcemaps = require('gulp-sourcemaps');


// compile SASS
gulp.task('scss', gulp.series([], function () {
    return gulp.src(['src/scss/app.scss'])
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(concat('app.css'))
        .pipe(autoprefixer({ browsers: autoprefixBrowsers }))
        .pipe(csso())
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('assets/css'))
        .pipe(browserSync.stream());
}));

gulp.task('scss-editor', gulp.series([], function () {
    return gulp.src(['src/scss/editor.scss'])
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(concat('editor.css'))
        .pipe(autoprefixer({ browsers: autoprefixBrowsers }))
        .pipe(csso())
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('assets/css'))
        .pipe(browserSync.stream());
}));


// move js to dist
gulp.task('js', gulp.series([], function () {
    return gulp.src('src/js/*')
        .pipe(gulp.dest('assets/js'))
}));


// move css to dist
gulp.task('css', gulp.series([], function () {
    return gulp.src('src/css/*')
        .pipe(gulp.dest('assets/css'))
}));




// watch sass & serve
gulp.task('serve', gulp.series(['scss', 'scss-editor', 'js'], function() {
    browserSync.init({
        // server: "./",
        proxy: "http://localhost:8888/economiesuisse99/"
    });

    gulp.watch(['src/js/*'], gulp.series(['js']));
    gulp.watch(['src/scss/**/*.scss'], gulp.series(['scss']));
    gulp.watch('*.php').on('change', browserSync.reload);
}));



gulp.task('default', gulp.series(['scss', 'serve', 'js', 'css', 'scss-editor']));


