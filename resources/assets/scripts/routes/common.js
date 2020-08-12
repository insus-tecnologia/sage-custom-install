import 'slick-carousel/slick/slick';
import LazyLoad from 'vanilla-lazyload';

export default {
  init() {
    // JavaScript to be fired on all pages

    var myLazyLoad = new LazyLoad();
    // After your content has changed...
    myLazyLoad.update();
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};
