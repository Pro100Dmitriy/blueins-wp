var gulp         = require('gulp'),
    sass         = require('gulp-sass'),
    cssnano      = require('gulp-cssnano'),
    autoprefixer = require('gulp-autoprefixer'),
    concat       = require('gulp-concat');

sass.compiler = require('node-sass');

gulp.task('sass', function(){
    return gulp.src('assets/sass/**/*.sass')
        .pipe( sass() )
        .pipe( autoprefixer({
            grid: true,
            overrideBrowserslist: ['last 10 versions']
        }) )
        .pipe( concat('style.min.css') )
        .pipe( cssnano() )
        .pipe( gulp.dest( 'assets/css' ) );
});



gulp.task('watch', function(){
    gulp.watch( ['assets/sass/**/*.sass', 'app/sass/**/*.scss'], gulp.parallel('sass') );
});


gulp.task('default', gulp.parallel('sass', 'watch') );