const gulp = require('gulp');
const minifyCss = require('gulp-minify-css');
const browserSync = require('browser-sync').create();

const paths = {
    styles: {
        src: 'web/src/styles/style.css',
        all: 'web/src/styles/**/*.css',
        build: 'web/css'
    },
    php: {
        src: 'web/index.php',
        all: 'views/**/*.php'
    }
};

function style() {
    return gulp.src(paths.styles.src)
        .pipe(minifyCss())
        .pipe(gulp.dest(paths.styles.build))
        .pipe(browserSync.stream());

}

function php() {
    return gulp.src(paths.php.src)
        .pipe(browserSync.stream());
}


function watcher() {
    browserSync.init({
        proxy: 'shop',
    });
    gulp.watch(paths.styles.all, style);
    gulp.watch(paths.php.all, php);
}

gulp.task("default", gulp.series(watcher));
