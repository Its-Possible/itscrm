'use strict';

import Croppie from 'croppie';

export default () => ({
    croppie: {
        visible: false,
        image: {},
        result: ''
    },
    image: {
        has: false,
        src: {
            origin: null
        }
    },

    initialize: function () {
        this.croppie.image = new Croppie(this.$refs.croppie, {
            viewport: {
                width: 180, height: 180, type: "circle"
            },
            boundary: {
                width: 180, height: 180
            },
            showZoomer: true,
            enableOrientation: false,
            mouseWheelZoom: 'ctrl',
        });
    },

    setCroppieStatus: function () {
        this.croppie.visible = !this.croppie.visible;
    },

    croppieUpdateEventHandler: function () {
        let reader, files = this.$refs.input.files;

        reader = new FileReader();

        reader.onload = (e) => {
            this.image.src.origin = e.target.result;
            this.croppieBindEventHandler(e.target.result);
        }

        reader.readAsDataURL(files[0]);
    },

    croppieBindEventHandler: function (source) {
        setTimeout(() => {
            this.croppie.image.bind({
                url: source
            });
            this.croppie.visible = true;
        }, 200);
    },

    croppieSwapEventHandler: function () {
        this.$refs.input.value = null;
        this.$refs.result.src = null;
        this.croppie.visible = false;
        this.image.has = false;
    },

    croppieClearEventHandler: function () {
        this.$refs.input.value = null;
        this.croppie.visible = false;
    },

    croppieSaveEventHandler: function () {
        this.croppie.image.result({
            type: 'base64',
            size: 'original',
            circle: true
        }).then((croppedImage) => {
            this.$refs.result.src = croppedImage;
            this.croppie.visible = false;
            this.image.has = true;
            this.result = croppedImage;

            axios.get('/')
                .then((response) => {
                    console.log(response);
                }).catch((err) => {
                console.error(err);
            }).finally(() => {
                console.log('Finally')
            })
        });
    },

    setAvatarClickEventHandler: function () {
        document.getElementById('customer-avatar-upload-input').click();
    }
});
