var gulp = require('gulp'),
    jshint = require('gulp-jshint'),
    uglify = require('gulp-uglify'),
    concat = require('gulp-concat');

var Server = require('karma').Server;

/**
 * Run test once and exit
 */
gulp.task('test', function (done) {
    new Server({
        configFile: '/karma.conf.js',
        singleRun: true
    }, done).start();
});

/**
 * Watch for file changes and re-run tests on each change
 */
gulp.task('tdd', function (done) {
    new Server({
        configFile: '/karma.conf.js'
    }, done).start();
});

gulp.task('js', function () {
    return gulp.src('js/*.js')
        .pipe(jshint())
        .pipe(jshint.reporter('default'))
        .pipe(uglify())
        .pipe(concat('app.js'))
        .pipe(gulp.dest('build'));
});

gulp.task('css', function() {
    gulp.src('css/*.css')
        .pipe(gulp.dest('build/css'));
});

gulp.task('assets', function() {
    gulp.src('assets/*.*')
        .pipe(gulp.dest('build/assets'));
});

gulp.task('build', ['css', 'js', 'assets']);
gulp.task('default', ['tdd']);