const { src, dest, watch, series } = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
const sourcemaps = require('gulp-sourcemaps');
const cleanCSS = require('gulp-clean-css');

const paths = {
  scss: 'src/scss/**/*.scss',
  cssDest: 'assets/css'
};

function styles() {
  return src('src/scss/style.scss')
    .pipe(sourcemaps.init())
    .pipe(sass().on('error', sass.logError))
    .pipe(postcss([autoprefixer()]))
    .pipe(cleanCSS())
    .pipe(sourcemaps.write('.'))
    .pipe(dest(paths.cssDest));
}

function watcher() {
  watch(paths.scss, styles);
}

exports.styles = styles;
exports.watch = series(styles, watcher);
exports.default = styles;

