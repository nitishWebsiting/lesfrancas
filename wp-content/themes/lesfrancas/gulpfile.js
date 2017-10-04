'use strict';

var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat');

var _pathSrc = 'src/';
var _pathDist = 'dist/';

gulp.task('sass', function () {
    return gulp.src( _pathSrc + 'scss/**/*.scss' )
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest( _pathDist + 'css' ));
});

gulp.task('concat', function() {
    return gulp.src( _pathSrc + 'js/**/*.js' )
        .pipe(concat('scripts.js'))
        .pipe(gulp.dest( _pathDist + 'js'));
});

gulp.task('watch', function () {
    gulp.watch( [ _pathSrc + 'scss/**/*.scss', _pathSrc + 'js/**/*.js' ], [ 'sass', 'concat' ]);
});