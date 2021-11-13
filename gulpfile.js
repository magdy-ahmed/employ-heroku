const { src, dest } = require('gulp');
var gulp = require("gulp")
const pug = require('gulp-pug');
gulp.task('watch', function () {
    return src('./src/*.pug')
    .pipe(
      pug({
        doctype: 'php',
        pretty: true
    })
    )
    .pipe(dest('./dist'));
    });
