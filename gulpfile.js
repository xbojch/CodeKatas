var gulp = require('gulp');
var phpspec = require('gulp-phpspec');
var run = require('gulp-run');

gulp.task('default', function() {
    // place code for your default task here
});




gulp.task('phpspec', function() {
    var options = {debug: false};
    gulp.src('phpspec.yml')
        .pipe(run('clear'))
        .pipe(phpspec('./vendor/bin/phpspec run',options));
});

gulp.task('watch', function() {
    gulp.watch(['spec/**/*.php', 'classes/**/*.php'], ['phpspec']);
});

gulp.task('default', ['phpspec', 'watch']);
