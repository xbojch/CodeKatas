var gulp = require('gulp');
var phpspec = require('gulp-phpspec');
var phpunit = require('gulp-phpunit');

gulp.task('default', function() {
    // place code for your default task here
});




gulp.task('phpspec', function() {
    var options = {debug: false, clear: true};
    gulp.src('phpspec.yml')
        .pipe(phpspec('./vendor/bin/phpspec run',options));
});

gulp.task('phpunit', function() {
    var options = {debug: false, clear: true};
    gulp.src('phpunit.xml').pipe(phpunit('./vendor/bin/phpunit',options));
});

gulp.task('watch', function() {
    gulp.watch(['spec/**/*.php', 'classes/**/*.php'], ['phpspec']);
});

gulp.task('watch-phpunit', function () {
    gulp.watch(['tests/**/*.php', 'classes/**/*.php'], ['phpunit']);
});

gulp.task('default', ['phpspec', 'watch']);
gulp.task('dev-phpunit', ['phpunit', 'watch-phpunit']);
