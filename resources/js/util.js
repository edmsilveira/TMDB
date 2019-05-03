Vue.prototype.revalidate = function() {
    setTimeout(()=>{
        bLazy.revalidate();
    }, 100);
};

Vue.prototype.addClass = function(el, className) {
    el.classList.add(className);
};

Vue.prototype.removeClass = function(el, className) {
    el.classList.remove(className);
};
