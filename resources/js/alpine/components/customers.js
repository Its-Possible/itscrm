'use strict';

export default () => ({
    open: false,

    test() {
        this.open = true;
        console.log(this.open);
    }
});
