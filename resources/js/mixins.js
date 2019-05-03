export const Lazyload = {
    methods: {
        lazyloadStart() {
            window.bLazy = new Blazy({
                selector: '._lz',
                errorClass: '_l0',
                successClass: '_l1',
                offset: 100,
                breakpoints: [{
                    width: 480,
                    src: 'data-src-mobile'
                }],
                error: function (ele, msg) {
                    console.table([ele, msg]);
                }
            })
        }
    },
    mounted: function () {
        this.lazyloadStart();
    }
}
